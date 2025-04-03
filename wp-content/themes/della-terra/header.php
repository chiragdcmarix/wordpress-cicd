<!DOCTYPE html>
<html lang="en">

    <head>
        <?php wp_head(); ?>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Della Terra</title>
        <meta content="" name="description">
        <meta content="" name="keywords">


    </head>

    <body>
        <?php 

            $args = array(
                'name' => 'options',
                'post_type' => 'page'
            );

            $headerQuery = new WP_Query($args);

            while($headerQuery->have_posts()) {
                $headerQuery->the_post();
                $headerLogo = get_field('header_logo');
            }

            wp_reset_query();
        ?>
        <div class="page-wp">
            <div class="wp-global-navbar">
                <div class="container-max-width global-navbar-container-box"><a href="<?php echo home_url(); ?>" aria-current="page"
                        class="link-global-navbar-logo w-inline-block w--current"><img loading="lazy"
                            src="<?php echo $headerLogo; ?>" alt="" class="logo-global-navbar"></a><a
                        data-w-id="811833c8-9f81-2b6f-8fce-bcc0f2bb2a9f" href="#"
                        class="menu-button-global-navbar w-inline-block">
                        <div class="lottie-global-menu-hamburger">

                        </div>
                    </a></div>
            </div>
            <div class="box-global-nav-menu hide-globa-content-navbar">
                <div class="wp-global-nav-menu">
                    <div class="grid-global-navbar">
                        <div id="w-node-box" class="wp-bar-global-navbar-indicator">
                            <div class="div-line-divider-menu-navbar"></div>
                        </div>
                        <div id="w-node-wrap" class="wp-items-nav-global-navbar hide-globa-content-navbar">
                            <?php

                                $menuItems = wp_get_nav_menu_items('Main Menu');

                                foreach($menuItems as $key => $value) {
                                    ?>
                                        <div class="wp-item-text-and-icon-navbar">
                                            <svg class="icon-item-navbar-indicator" width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M52.4945 24.6705H39.3817L48.6522 15.4046C50.4112 13.6466 50.4112 10.7861 48.6522 9.02806C46.886 7.2628 44.0314 7.2628 42.2796 9.02806L33.1533 18.1498V4.51043C33.1533 2.02465 31.142 0 28.6478 0C26.1535 0 24.1423 2.02465 24.1423 4.51043V18.3011L14.8646 9.02806C13.1056 7.27 10.2437 7.27 8.49197 9.02806C6.72581 10.7861 6.72581 13.6394 8.49197 15.4046L17.7625 24.6705H4.51271C2.00405 24.6705 0 26.6879 0 29.1737C0 31.6595 2.00405 33.6841 4.51271 33.6841H17.6183L8.34058 42.9499C6.57443 44.708 6.57443 47.5684 8.34058 49.3193C9.22006 50.2055 10.3807 50.6451 11.5341 50.6451C12.6875 50.6451 13.8337 50.2055 14.7204 49.3193L24.1351 39.9094V52.4896C24.1351 54.9898 26.1391 57 28.6406 57C31.142 57 33.1461 54.9898 33.1461 52.4896V40.0607L42.4166 49.3193C43.2889 50.2055 44.4423 50.6451 45.5957 50.6451C46.7491 50.6451 47.9169 50.2055 48.7964 49.3193C50.5553 47.5612 50.5553 44.708 48.7964 42.9499L39.5187 33.6841H52.4945C54.9815 33.6841 57 31.6667 57 29.1737C57 26.6879 54.9815 24.6705 52.4945 24.6705Z" fill="#EF8253" />
                                            </svg>
                                            <?php
                                                if($value->title == 'Featured Links') {
                                                    ?>
                                                        <a href="<?php echo $value->url; ?>" class="item-link-global-navbar link-direct" target="_blank"><?php echo $value->title; ?></a>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <a href="<?php echo $value->url; ?>" class="item-link-global-navbar link-direct"><?php echo $value->title; ?></a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    <?php
                                }
                            
                            ?>
                      
                        </div>
                    </div>
                </div>
            </div>