<?php

/**
 * Template Name: Reviews
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
        <div class="mask-img-hero home-item-bg" style="background-image: url(<?=$featured_img_url; ?>)"></div>
    </div>
    <div id="reviews" class="padding-main wf-section">
        <div class="container ">

            <div class="row review-wrap">
                <div class="col-12">
                    <div class="mb-4">
                        <h2 class="title">
                            All Reviews</h2>
                    </div>
                </div>

                <?php
                
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    $reviewPosts = new WP_Query(array(
                        'post_type' => 'reviews',
                        'post_status' => 'publish',
                        'posts_per_page' => '3',
                        'orderby' => 'ID',
                        'order' => 'DESC',
                        'paged' => $paged
                    ));

                    if($reviewPosts->have_posts()) {
                        while($reviewPosts->have_posts()) {
                            $reviewPosts->the_post();
                            if(!empty(get_the_post_thumbnail_url(get_the_ID(),'full'))) {
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                            } else {
                                $featured_img_url = get_template_directory_uri()."/assets/img/dummy-user.jpg";
                            }
                            ?>
                                <div class="col-md-12 anim-slide-in-bottom">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="top-wrap ">
                                                <div class="review">
                                                    <h2><?php the_title(); ?></h2>
                                                    <p class="desc"><?php the_excerpt(); ?></p>
                                                    <span class="date"><?php echo get_the_date('M j, Y') ?></span>
                                                </div>
                                                <div class="img-wrap">
                                                    <img src="<?=$featured_img_url; ?>" alt="user">
                                                </div>

                                            </div>

                                            <h3 class="overall-rating">
                                                Overall rating <span class="rating-over">
                                                <?php
                                                    if(get_field('review_rating') > 5) {
                                                        echo 5;
                                                    } elseif(get_field('review_rating') < 0) {
                                                        echo 0;
                                                    } elseif(get_field('review_rating') == "") {
                                                        echo 0;
                                                    } else {
                                                        echo get_field('review_rating');
                                                    }
                                                ?> 
                                                <i class="fa fa-star"></i></span>
                                            </h3>
                                            <hr>
                                            <div id="review-bottom">

                                                <h4>Public review</h4>

                                                <p class="desc">
                                                    <?php the_content(); ?>
                                                </p>
                                            </div>
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
                        $total_pages = $reviewPosts->max_num_pages;

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
                wp_reset_postdata();
                } else {
                    ?>
                        <div>
                            <p>No Blogs Found</p>
                        </div>
                    <?php
                }
            
            ?>
        </div>
    </div>

<?php

    get_footer();

?>