<?php

/*
 * Template Name: About
 */
get_header();

if (! empty(get_the_post_thumbnail_url(get_the_ID(), 'full'))) {
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
				<h2 class="label-main-headline text-white anim-slide-in-bottom"><?php the_title(); ?></h2>
			</div>
		</div>


	</div>
	<div class="mask-gradient-hero"></div>
	<div class="mask-img-hero home-item-bg"
        style="background-image: url(<?=$featured_img_url; ?>"></div>
</div>

<section class="about_us">
	<div class="container">
		<div class="row padding-main">

			<div class="col-md-12 text-center">
				<div class="typo-paragraph-title txt-color-green x1"><?php the_title(); ?><br>
				</div>

				<h2 class="x4">Della Terra</h2>
                <?php the_content(); ?>
            </div>
		</div>
	</div>
</section>

<?php
get_footer();

?>