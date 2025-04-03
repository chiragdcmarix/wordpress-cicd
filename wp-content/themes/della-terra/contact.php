<?php

    /*
    * Template Name: Contact
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
    <div id="back-contact" class="padding-main wf-section back-contact-page">
        <div class="container">
            <div class="row contact-wrap" >
                <div class="col-lg-7 back-content-sticky">
                    <!-- Start Form here -->
                    <div class="back-blog-form">
                        <div class="back-title-sec">
                            <h2>Let's get in touch</h2>
                            <p>We will be happy to answer your questions.</p>
                        </div>
                        <div id="blog-form" class="blog-form">
                            <div id="form-messages"></div>
                            <?php
                            
                                echo do_shortcode('[contact-form-7 id="4d60015" title="Contact us"]');

                            ?>
                        </div>
                    </div>
                    <!-- End Form here -->
                </div>
                <div class="col-lg-5 back-sidebar-sticky">
                    <div class="back-sidebar-information">
                        <h3>Information</h3>
                        <div class="widget-information">
                            <ul>
                                <li>
                                    <i class="fa fa-phone-alt">  </i>
                                    <div>
                                        <strong>Phone</strong>
                                        <a href="#"><?=get_field('phone');?></a>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"> </i>

                                    <div>
                                        <strong>Email</strong>
                                        <a href="#"><?=get_field('email');?></a>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker-alt">  </i>
                                    <div>
                                        <strong>Address</strong>
                                        <p><?=get_field('address');?></p>
                                    </div>
                                </li>
                            
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

    get_footer();

?>