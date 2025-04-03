<?php

/**
 * Template Name: Gallery
 */

get_header();

if (!empty(get_the_post_thumbnail_url(get_the_ID(), 'full'))) {
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
} else {
    $featured_img_url = get_template_directory_uri() . "/assets/img/hero-bg.jpeg";
}

?>
<div class="section hero-banner-section wf-section">
    <div class="gradient-hero-mask-navbar"></div>
    <div class="container base-elevation">
        <div class="row">
            <div class="col-md-12">
                <h2 class="label-main-headline text-white anim-slide-in-bottom">
                    <?php the_title(); ?>
                </h2>
            </div>
        </div>


    </div>
    <div class="mask-gradient-hero"></div>
    <div class="mask-img-hero home-item-bg" style="background-image: url(<?= $featured_img_url; ?>)"></div>
</div>
<div id="gallery" class="padding-main wf-section">
    <section class="container">

        <div class="mb-4">
            <h2 class="title">
                Some of Our Places</h2>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8">


                <article class="row row-cols-1 row-cols-sm-2 g-2 d-flex justify-content-start gallery-wrap">

                    <?php

                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        if(isset($_GET['cat_id'])) {
                            $catId = $_GET['cat_id'];
                            $galleryPosts = new WP_Query(
                                array(
                                    'post_type' => 'gallery',
                                    'post_status' => 'publish',
                                    'posts_per_page' => '12',
                                    'orderby' => 'ID',
                                    'order' => 'DESC',
                                    'paged' => $paged,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'gallery-category',
                                            'field' => 'term_id',
                                            'terms' => $catId 
                                        ),
                                    ),
                                )
                            );
                        } else {
                            $galleryPosts = new WP_Query(
                                array(
                                    'post_type' => 'gallery',
                                    'post_status' => 'publish',
                                    'posts_per_page' => '12',
                                    'orderby' => 'ID',
                                    'order' => 'DESC',
                                    'paged' => $paged
                                )
                            );
                        }

                    if ($galleryPosts->have_posts()) {
                        while ($galleryPosts->have_posts()) {
                            $galleryPosts->the_post();
                            if (!empty(get_the_post_thumbnail_url(get_the_ID(), 'full'))) {
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            } else {
                                $featured_img_url = get_template_directory_uri() . "/assets/img/dummy-gallery.jpg";
                            }
                            ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="gallery-box">
                            <div class="gallery-card">
                                <a data-fancybox="gallery" data-src="<?= $featured_img_url; ?>"
                                    data-caption="<?= get_the_excerpt(); ?>">
                                    <img src="<?= $featured_img_url; ?>">
                                </a>
                            </div>
							<a href="<?php echo get_field('gallery_link');?>"> <h5 class=" gallery-desc"><?= get_the_excerpt(); ?></h5></a>

                        </div>
                    </div>
                    <?php
                        }
                        ?>
                </article>
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            $total_pages = $galleryPosts->max_num_pages;
    
                            if ($total_pages > 1) {
                                $current_page = max(1, get_query_var('paged'));
                                ?>
    
                            <ul class="pagination">
                                <?php if ($current_page > 1) { ?>
                                <li class="page-item"><a class="page-link"
                                        href="<?php echo get_pagenum_link($current_page - 1); ?>"><i
                                            class="fa fa-arrow-left"></i></a></li>
                                <?php } ?>
    
                                <?php
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        $active_class = ($current_page === $i) ? 'active' : '';
                                        ?>
                                <li class="page-item <?php echo $active_class; ?>"><a class="page-link"
                                        href="<?php echo get_pagenum_link($i); ?>">
                                        <?php echo $i; ?>
                                    </a></li>
                                <?php } ?>
    
                                <?php if ($current_page < $total_pages) { ?>
                                <li class="page-item"><a class="page-link"
                                        href="<?php echo get_pagenum_link($current_page + 1); ?>"><i
                                            class="fa fa-long-arrow-right"></i></a></li>
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
                    No gallery Photo Found
                </div>
                <?php
                    }

                    wp_reset_postdata();

                    ?>
        </div>
        <div class="col-xl-3 col-lg-4">
                <div class="blog-sidebar sticky-sidebar">


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
                                    'taxonomy' => 'gallery-category',
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
            </div>
        </div>
    </section>

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