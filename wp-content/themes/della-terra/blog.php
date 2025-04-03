<?php

    /**
     * Template Name: Blog
     */

    get_header();

    if(!empty(get_the_post_thumbnail_url(get_the_ID(),'full'))) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    } else {
        $featured_img_url = get_template_directory_uri()."/assets/img/hero-bg.jpeg";
    }
?>

<div class="section hero-banner-section wf-section">
    <div class="gradient-hero-mask-navbar"></div>
    <div class="container base-elevation">
        <div class="row">
            <div class="col-md-12">
                <h2 class="label-main-headline text-white anim-slide-in-bottom"><?php the_title(); ?></h2>
            </div>
        </div>


    </div>
    <div class="mask-gradient-hero"></div>
    <div class=" mask-img-hero home-item-bg" style="background-image: url(<?=$featured_img_url; ?>)"></div>
</div>
<div id="blog" class="padding-main wf-section">
    <div class="container ">

        <div class="mb-4">
            <h2 class="title">
                Our Latest Blogs</h2>
        </div>

        <div class="blog-wrap">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    
                        <?php

                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                            $catId = !empty($_GET['cat_id']) ? $_GET['cat_id'] : '' ;

                            $blogPosts = new WP_Query(array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => '6',
                                'orderby' => 'ID',
                                'order' => 'DESC',
                                'paged' => $paged,
                                'cat'   => $catId
                            ));

                            if($blogPosts->have_posts()) {
                                ?>
                                    <div class="row">
                                        <?php
                                        while($blogPosts->have_posts()) {
                                            $blogPosts->the_post();
                                            if(!empty(get_the_post_thumbnail_url(get_the_ID(),'full'))) {
                                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                            } else {
                                                $featured_img_url = get_template_directory_uri()."/assets/img/dummy-gallery.jpg";
                                            }
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                            $author_id = $post->post_author;
                                            $authorName = strval(get_the_author_meta( 'display_name' , $author_id ));
                                            $avatar = get_avatar_url(get_the_author_meta('ID'));
                                            ?>
                                                <div class="col-md-6 anim-slide-in-bottom">
                                                    <div class="blog-card box-shadow">
                                                        <a href="<?php the_permalink(); ?>" class="img">
                                                            <img src="<?=$featured_img_url;?>" alt="Blog">
                                                        </a>
                                                        <div class="content">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa fa-user"></i>
                                                                    <a><?php echo ucwords($authorName); ?></a>
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-clock"></i>
                                                                    <?php echo get_the_date('M j, Y') ?>
                                                                </li>
                                                            </ul>
                                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                            <p class="blog-desc"><?php echo get_the_excerpt(); ?></p>
                                                            <a href="<?php the_permalink(); ?>" class="button-outline w-inline-block">
                                                                <div>Read More</div><i class="fa fa-long-arrow-right"></i>
                                                            </a>


                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex justify-content-center mt-5">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                            <?php
                                                $total_pages = $blogPosts->max_num_pages;

                                                if ($total_pages > 1) {
                                                    $current_page = max(1, get_query_var('paged'));
                                                ?>

                                                <ul class="pagination">
                                                    <?php if ($current_page > 1) { ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo get_pagenum_link($current_page - 1); ?>"><i class="fa fa-arrow-left"></i></a></li>
                                                    <?php } ?>

                                                    <?php
                                                    for ($i = 1; $i <= $total_pages; $i++) {
                                                        $active_class = ($current_page === $i) ? 'active' : '';
                                                    ?>
                                                        <li class="page-item <?php echo $active_class; ?>"><a class="page-link" href="<?php echo get_pagenum_link($i); ?>"><?php echo $i; ?></a></li>
                                                    <?php } ?>

                                                    <?php if ($current_page < $total_pages) { ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo get_pagenum_link($current_page + 1); ?>"><i class="fa fa-long-arrow-right"></i></a></li>
                                                    <?php } ?>
                                                </ul>

                                            <?php } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                <?php
                            } else {
                                ?>
                                    <div>
                                        No Blog Post Found
                                    </div>
                                <?php
                            }
                        ?>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <!-- Blog Sidebar Start -->
                    <div class="blog-sidebar">


                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">
                            <!-- Widget Title Start -->
                            <div class="widget-title">
                                <h3 class="title">Categories</h3>
                            </div>
                            <!-- Widget Title End -->
                            <!-- Widget Recent Post Start -->
                            <div class="recent-posts">
                                <ul>
                                <?php
                                        
                                        $categories = get_terms(array(
                                            'taxonomy' => 'category',
                                            'hide_empty' => false, // Set this to false to show all categories
                                        ));
        
                                        // Sort categories by name
                                        usort($categories, function ($a, $b) {
                                            return strnatcasecmp($a->name, $b->name);
                                        });
        
                                        function getPath() {
                                            // Get the current page path
                                            $currentPagePath = $_SERVER['REQUEST_URI'];
        
                                            // Parse the query parameters
                                            parse_str(parse_url($currentPagePath, PHP_URL_QUERY), $queryParams);
        
                                            // Check if the 'cat_id' parameter exists
                                            if (isset($queryParams['cat_id'])) {
                                                // Remove only the 'cat_id' parameter
                                                unset($queryParams['cat_id']);
        
                                                // Build the new query string
                                                $newQueryString = http_build_query($queryParams);
        
                                                // Build the new URL without the 'cat_id' parameter
                                                $newUrl = strtok($currentPagePath, '?') . '?' . $newQueryString;
        
                                                return $newUrl;
                                            }
                                        }
                                        
                                        foreach ($categories as $category) {
                                            ?>
                                                <li>
                                                    <a class="post-link" href="<?= getPath()."?cat_id=".$category->term_id;?>" id="term-<?= $category->term_id; ?>">
                                                        <div class="post-text">
                                                            <h4 class="title"><i class="fa fa-angle-double-right"></i>
                                                                <?= $category->name; ?>
                                                            </h4>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                            <!-- Widget Recent Post End -->
                        </div>
                        <!-- Sidebar Widget End -->


                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget End -->
                    </div>
                    <!-- Blog Sidebar End -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Extract the cat_id parameter value from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const catId = urlParams.get('cat_id');

    // If cat_id is found in the URL, highlight the corresponding link
    if (catId) {
        const link = document.querySelector(`#term-${catId} .title`);
        console.log(link);
        if (link) {
            link.classList.add('highlighted-terms');
        }
    }
</script>

<?php

    get_footer();

?>