            <?php 

                $args = array(
                    'name' => 'options',
                    'post_type' => 'page'
                );

                $headerQuery = new WP_Query($args);

                while($headerQuery->have_posts()) {
                    $headerQuery->the_post();
                    $footerImage = get_field('footer_logo');
                    $footerEmail = get_field('footer_email');
                    $footerContact = get_field('contact_text');
                }

                wp_reset_query();
            ?>
            <div class="section bg-color-gold relative-position banner-email wf-section">
                <div class="container-max-width">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div id="w-node-banner-email" class="text-banner-gold">
                                <?= $footerContact; ?>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-md-end justify-content-center">
                        
                            <div class="contact-btn mt-4 mt-md-0">
                                <a href="<?php echo home_url('/contact-us'); ?>" class="theme-btn button-outline ">Contact Us</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>            
            <div class="section footer-section wf-section">
                <div class="container-max-width top-content-footer"><a href="#" aria-current="page"
                        class="link-box-footer-logo ver-mobile w-inline-block w--current"><img
                            src="<?=$footerImage;?>" loading="lazy" alt="" class="img-footer-logo"></a>
                    <div class="left-wp-bar-footer"><a href="#"
                            class="link-footer-email"><?=$footerEmail;?></a>
                    </div>
                    <div class="right-wp-bar-footer">
                        <?php  
                        
                            $menuItems = wp_get_nav_menu_items('Main Menu');

                            foreach($menuItems as $key => $value) {
                                if($value->title == "Featured Links") {
									?>
                                    <a id="w-node-_14f8e297-fa03-3073-b4ab-940d314d22e4-314d22d1" href="<?php echo $value->url; ?>" target="_blank" class="nav-menu-item-footer"><?php echo $value->title; ?></a>
                                <?php
								} else {
									?>
                                    <a id="w-node-_14f8e297-fa03-3073-b4ab-940d314d22e4-314d22d1" href="<?php echo $value->url; ?>" class="nav-menu-item-footer"><?php echo $value->title; ?></a>
                                <?php
								}
                            }
                        
                        ?>
                    </div>
                </div>
                <div class="div-line-divider-footer"></div>
                <div class="container-max-width bottom-content-footer"><a href="<?= home_url(); ?>" aria-current="page"
                        class="link-box-footer-logo w-inline-block w--current"><img src="<?=$footerImage; ?>"
                            loading="lazy" alt="" class="img-footer-logo"></a>
                    <p class="text-bottom-bar-footer"> <a href="<?= home_url(); ?>" class="txt-color-base">Della Terraaaaa</a> | All Rights
                        Reserved. </br> Developed By <a href="#" class="txt-color-base">Developer</a>
                    </p>
                </div>
            </div>
        </div>

        <script src="https://dellaterrapro.com/wp-content/themes/della-terra/assets/js/webflow.js"></script>       
        <script>

            $(document).ready(function(){
                $(".menu-button-global-navbar").click(function () {
                    $(".lottie-global-menu-hamburger").toggleClass("customclass");
                });
            });

        </script>

        <?php  

            wp_footer();
        
        ?>
    </body>

</html>
