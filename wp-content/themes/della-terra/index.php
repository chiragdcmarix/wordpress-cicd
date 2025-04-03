<?php

/*
 * Template Name: Home
 */

get_header();

?>
<div class="section hero-home-section wf-section">
    <div class="gradient-hero-mask-navbar"></div>
    <div class="container-max-width base-elevation">
        <div class="grid">
            <div id="w-node-home" class="wp-hero-content anim-slide-in-bottom">
                <h1 id="w-node-dffedd76-6edf-7d23-1085-78c11e413c83-102d57bc"
                    class="label-main-headline txt-color-white x3 static-home-text"><?= get_field('banner_text'); ?>
                </h1>

                <a href="<?= home_url('/about-us'); ?>" class="button-outline w-inline-block">
                    <div>
                        <?= get_field('banner_button_text'); ?>
                    </div><svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7.00272L1 13" stroke="#E4C55F" stroke-miterlimit="10" stroke-linecap="round" />
                    </svg>

                </a>
            </div>
        </div>
    </div>
    <div class="mask-gradient-hero"></div>
    <div class="mask-img-hero home-item-bg" style="background-image: url(<?= get_field('home_banner_image'); ?>); ">
    </div>
</div>
<div class="section home-after-hero-section wf-section">
    <div class="container-max-width base-elevation">
        <div class="grid">
            <div id="after-hero" class="wp-scroll-home-anim">
                <div class="div-line-scroll-after-home"></div><svg width="112" height="111" viewBox="0 0 112 111"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M64.9435 111L64.9435 80.6633L86.5702 102.111L101.453 87.3643L80.1557 66.2429L112 66.243L112 45.3857L79.8008 45.3857L101.44 23.9249L86.5576 9.17773L64.9308 30.6259L64.9308 -2.05746e-06L43.9 -2.97675e-06L43.9 30.3116L22.2606 8.85084L7.4033 23.598L29.3596 45.3857L5.64552e-06 45.3857L4.73382e-06 66.2429L29.0173 66.2429L7.4033 87.6911L22.2606 102.438L43.9 80.9776L43.9 111L64.9308 111L64.9435 111Z"
                        fill="#E4C55F" />
                </svg>

                <div class="w-embed"></div>
            </div>
            <div id="w-node-_4cc1fafb-8388-b676-df9a-ec205707b29f-102d57bc" class="wp-title-after-hero-home">
                <h2 id="w-node-ad530bb8-103a-3a69-f38e-262b02f0bc82-102d57bc" class="anim-slide-in-bottom">
                    <?= get_field('first_section_heading'); ?>
                </h2>
            </div>
            <div id="w-node-_5f5710be-1b75-1abb-513e-1032aca74f4a-102d57bc" class="wp-content-after-hero-home">
                <p class="typo-content x8 anim-slide-in-bottom">
                    <?= get_field('first_section_text'); ?>
                </p><a href="<?= home_url('/about-us'); ?>" class="button-link-box w-inline-block">
                    <div>
                        <?= get_field('first_section_link_text'); ?>
                    </div>
                    <div data-w-id="5beefa9a-102c-acf8-3fdf-906559b0649f" data-is-ix2-target="1"
                        class="icon-button-link" data-animation-type="lottie"
                        data-src="<?php echo get_template_directory_uri(); ?>/assets/js/arrow.json" data-loop="0"
                        data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="1"
                        data-duration="0" data-ix2-initial-state="0"></div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="section meet-bob-section wf-section">
    <div class="container-max-width">
        <div class="grid">
            <div id="w-node-meet-section" class="wp-content-side-content anim-slide-in-bottom">
                <div class="typo-paragraph-title txt-color-green x1">
                    <?= get_field('second_section_tagline'); ?><br>
                </div>
                <h2 class="x4">
                    <?= get_field('second_section_heading'); ?>
                </h2>
                <p class="typo-content x8">
                    <?= get_field('second_section_text'); ?>
                </p><a href="<?= home_url('/about-us'); ?>" class="button-link-box green-button w-inline-block">
                    <div>
                        <?= get_field('second_section_link_text'); ?>
                    </div>
                    <div data-is-ix2-target="1" class="icon-button-link"
                        data-w-id="56daf2cd-b769-1aff-0773-905c814f856b" data-animation-type="lottie"
                        data-src="<?php echo get_template_directory_uri(); ?>/assets/js/arrow.json" data-loop="0"
                        data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="1"
                        data-duration="0" data-ix2-initial-state="0"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="wp-img-mask-side-left top-overlap-100px"><img src="<?= get_field('second_section_image'); ?>"
            loading="lazy" alt="" class="img-item-mask-side"></div>
</div>

<!-- start guest setion -->
<section class="guest-section">
    <div class="container">
      <div class="guest-text-section">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-md-6">
                    <a href="<?= home_url('/'.get_field('third_section_first_link')); ?>" class="inner-col first-col" style="background-image: url('<?= get_field('third_section_first_image'); ?>');">
                        <h3><?= get_field('third_section_first_heading'); ?></h3>
                    </a>
                </div>
                <div class="col-xl-5 col-md-6">
                    <a href="<?= home_url('/'.get_field('third_section_second_link')); ?>" class="inner-col second-col" style="background-image: url('<?= get_field('third_section_second_image'); ?>');">
                        <h3><?= get_field('third_section_second_heading'); ?></h3>
                    </a>
                </div>
                <div class="col-xl-5 col-md-6">
                    <a href="<?= home_url('/'.get_field('third_section_third_link')); ?>" class="inner-col thrd-col" style="background-image: url('<?= get_field('third_section_third_image'); ?>');">
                        <h3><?= get_field('third_section_third_heading'); ?></h3>
                    </a>
                </div>
            </div>
      </div>
    </div>
</section>
<!-- end guest setion -->
<div class="section section-double relative-position wf-section">
    <div class="container-max-width base-elevation">
        <div class="grid">
            <div id="w-node-bc2aa253-d5fb-0f5d-94bf-d9509d61da93-102d57bc" class="wp-img-newly-released anim-fade-in">
                <img src="<?= get_field('fourth_section_image'); ?>" loading="lazy" alt=""
                    class="img-book-newly-released">
            </div>
            <div id="w-node-e47ec9ff-03d3-302d-53de-d47592f3a065-102d57bc"
                class="wp-content-newly-released anim-slide-in-bottom">
                <div class="typo-paragraph-title txt-color-dark-blue x1">
                    <?= get_field('fourth_section_tagline'); ?><br>
                </div>
                <h2 class="x4">
                    <?= get_field('fourth_section_heading'); ?>
                </h2>
                <p class="typo-content x8">
                    <?= get_field('fourth_section_text'); ?>
                </p><a href="#" class="button-link-box w-inline-block">
                    <div>
                        <?= get_field('fourth_section_link_text'); ?>
                    </div>
                    <div data-is-ix2-target="1" class="icon-button-link"
                        data-w-id="cd6b9f6e-2691-c296-485f-aa499236f903" data-animation-type="lottie"
                        data-src="<?php echo get_template_directory_uri(); ?>/assets/js/arrow.json" data-loop="0"
                        data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="1"
                        data-duration="0" data-ix2-initial-state="0"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="mask-right-block-new-release"></div>
</div>
<div class="section home-reivew">
    <div class="container-max-width base-elevation">
        <div id="reviews" class="padding-main wf-section">
            <div class="container ">

                <div class="row review-wrap">
                    <div class="col-12 text-center">
                        <div class="mb-4 ">
                            <div class="typo-paragraph-title txt-color-green x1">
                                Reviews
                            </div>
                            <h2 class="x4">
                                Customer and Client Reviews </h2>
                        </div>
                    </div>

                    <?php

                        $reviewPosts = new WP_Query(array(
                            'post_type' => 'reviews',
                            'post_status' => 'publish',
                            'posts_per_page' => '2',
                            'orderby' => 'ID',
                            'order' => 'DESC'
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

                                    <div class="col-lg-6 anim-slide-in-bottom">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="top-wrap ">
                                                    <div class="review">
                                                        <h2 class="title">
                                                        <?php the_title(); ?></h2>
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
                        }

                    ?>

                </div>
                <a href="<?= home_url('/reviews'); ?>" class="button-link-box w-inline-block d-flex justify-content-center">
                    <div>
                       Explore more
                    </div>
                    <div data-is-ix2-target="1" class="icon-button-link"
                        data-w-id="cd6b9f6e-2691-c296-485f-aa499236f903" data-animation-type="lottie"
                        data-src="<?php echo get_template_directory_uri(); ?>/assets/js/arrow.json" data-loop="0"
                        data-direction="1" data-autoplay="0" data-renderer="svg" data-default-duration="1"
                        data-duration="0" data-ix2-initial-state="0"></div>
                </a>

            </div>
        </div>
    </div>
</div>
<?php

get_footer();

?>