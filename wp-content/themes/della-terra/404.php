<?php get_header(); ?>

<div class="section hero-banner-section wf-section">
    <div class="gradient-hero-mask-navbar"></div>
    <div class="container base-elevation">
        <div class="row">
            <div class="col-md-12">
                <h2 class="label-main-headline text-white anim-slide-in-bottom">Page Not found</h2>
            </div>
        </div>


    </div>
    <div class="mask-gradient-hero"></div>
    <div class="mask-img-hero home-item-bg"
        style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/hero-bg.jpeg)"></div>
</div>

<section class="about_us">
    <div class="container">
        <div class="row padding-main justify-content-center">

            <div class="col-md-12 text-center">


                <h1 class="label-main-headline">404</h1>
                <h2>Oops!</h2>
                <h5>We're sorry,
                    The page you were looking for doesn't exist anymore.</h5>

                <div class="contact-btn w-100">
                    <a href="index.php" class="theme-btn button-outline mt-4 mx-auto">Back to home</a>
                </div>

            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>