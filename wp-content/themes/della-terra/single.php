<?php 
    get_header(); 

    if(!empty(get_the_post_thumbnail_url(get_the_ID(),'full'))) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    } else {
        $featured_img_url = get_template_directory_uri()."/assets/img/dummy-gallery.jpg";
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
        <div class=" mask-img-hero home-item-bg" style="background-image: url(<?=$featured_img_url; ?>"></div>
    </div>
    <div id="blog" class="padding-main wf-section">
        <div class="container ">

            <div class="blog-details-wrap">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <!-- Blog Details Post Start -->
                        <div class="blog-details-post">
                            <!-- Single Blog Start -->
                            <div class="single-blog-post single-blog">
                                <div class="blog-image">
                                    <a href="blog-detail.html"><img src="<?=$featured_img_url;?>" alt=""></a>
                                    <div class="top-meta">
                                        <span class="date"><?php echo get_the_date('d') ?><span><?php echo get_the_date('M') ?></span></span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="tag"><i class="far fa-bookmark"></i> <?=get_the_category()[0]->name; ?></span>
                                        <span><i class="fas fa-user"></i> <?php echo ucwords(get_the_author()); ?></span>
                                    </div>
                                    <h3 class="title"><?php the_title(); ?></h3>
                                    <p class="text"><?php the_content(); ?></p>
                                </div>
                            </div>
                            <!-- Single Blog End -->
                        </div>
                        <!-- Blog Details Post End -->
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Blog Sidebar Start -->
                        <div class="blog-sidebar sticky-sidebar">
                            <!-- Sidebar Widget Start -->
                            <div class="sidebar-widget">
                                <!-- Widget Title Start -->
                                <div class="widget-title">
                                    <h3 class="title">Recent Posts</h3>
                                </div>
                                <!-- Widget Title End -->
                                <!-- Widget Recent Post Start -->
                                <div class="recent-posts">
                                    <ul>
                                        <?php
                                        
                                        $blogPosts = new WP_Query(array(
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => '3',
                                            'orderby' => 'ID',
                                            'order' => 'DESC',
                                        ));

                                        if($blogPosts->have_posts()) {
                                            while($blogPosts->have_posts()) {
                                                $blogPosts->the_post();
                                                if(!empty(get_the_post_thumbnail_url(get_the_ID(),'full'))) {
                                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                                } else {
                                                    $featured_img_url = get_template_directory_uri()."/assets/img/dummy-gallery.jpg";
                                                }
                                                ?>
                                                    <li>
                                                        <a class="post-link" href="<?php the_permalink(); ?>">
                                                            <div class="post-thumb">
                                                                <img src="<?=$featured_img_url;?>" alt="">
                                                            </div>
                                                            <div class="post-text">
                                                                <h4 class="title"><?php the_title(); ?></h4>
                                                                <span class="post-meta"><i class="far fa-calendar-alt"></i> <?php echo get_the_date('M j, Y') ?></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                <?php
                                            }
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

<?php 
    get_footer(); 
?>