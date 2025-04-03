<?php


add_action('after_setup_theme', 'blankslate_setup');

function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form',
        'navigation-widgets'
    ));
    add_theme_support('woocommerce');
    global $content_width;
    if (! isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'blankslate')
    ));
}
add_action('admin_notices', 'blankslate_notice');

function blankslate_notice()
{
    $user_id = get_current_user_id();
    $admin_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $param = (count($_GET)) ? '&' : '?';
    if (! get_user_meta($user_id, 'blankslate_notice_dismissed_8') && current_user_can('manage_options'))
        echo '<div class="notice notice-info"><p><a href="' . esc_url($admin_url), esc_html($param) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__('Ⓧ', 'blankslate') . '</big></a>' . wp_kses_post(__('<big><strong>📝 Thank you for using BlankSlate!</strong></big>', 'blankslate')) . '<br /><br /><a href="https://wordpress.org/support/theme/blankslate/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__('Review', 'blankslate') . '</a> <a href="https://github.com/tidythemes/blankslate/issues" class="button-primary" target="_blank">' . esc_html__('Feature Requests & Support', 'blankslate') . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__('Donate', 'blankslate') . '</a></p></div>';
}
add_action('admin_init', 'blankslate_notice_dismissed');

function blankslate_notice_dismissed()
{
    $user_id = get_current_user_id();
    if (isset($_GET['dismiss']))
        add_user_meta($user_id, 'blankslate_notice_dismissed_8', 'true', true);
}

add_action('wp_enqueue_scripts', 'blankslate_enqueue');

function blankslate_enqueue()
{
    wp_enqueue_style('blankslate-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');

    // Include main css
    wp_enqueue_style('blankslate-main-stylesheet', get_template_directory_uri() . '/assets/css/style.css');

    // Include bootstrap css
    wp_enqueue_style('blankslate-main-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');

    // Include fancybox css
    wp_enqueue_style('blankslate-main-fancybox', get_template_directory_uri() . '/assets/css/fancybox.css');

    // Include fontawesome css
    wp_enqueue_style('blankslate-main-fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css');

    // Include Jquery
    wp_enqueue_script('blankslet-jquery-file', get_template_directory_uri() . '/assets/js/jquery.min.js');

    // Include main js
    wp_enqueue_script('blankslate-main-js', get_template_directory_uri() . '/assets/js/main.js');

    // Include bootrstrap bundle js
    wp_enqueue_script('blankslate-main-bootsrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js');

    // Include fancybox umd js
    wp_enqueue_script('blankslate-main-fancybox-js', get_template_directory_uri() . '/assets/js/fancybox.umd.js');
}

add_action('wp_footer', 'blankslate_footer');

function blankslate_footer()
{
    ?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (deviceAgent.match(/(Android)/)) {
$("html").addClass("android");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter('document_title_separator', 'blankslate_document_title_separator');

function blankslate_document_title_separator($sep)
{
    $sep = esc_html('|');
    return $sep;
}
add_filter('the_title', 'blankslate_title');

function blankslate_title($title)
{
    if ($title == '') {
        return esc_html('...');
    } else {
        return wp_kses_post($title);
    }
}

function blankslate_schema_type()
{
    $schema = 'https://schema.org/';
    if (is_single()) {
        $type = "Article";
    } elseif (is_author()) {
        $type = 'ProfilePage';
    } elseif (is_search()) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }
    echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}
add_filter('nav_menu_link_attributes', 'blankslate_schema_url', 10);

function blankslate_schema_url($atts)
{
    $atts['itemprop'] = 'url';
    return $atts;
}
if (! function_exists('blankslate_wp_body_open')) {

    function blankslate_wp_body_open()
    {
        do_action('wp_body_open');
    }
}
add_action('wp_body_open', 'blankslate_skip_link', 5);

function blankslate_skip_link()
{
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'blankslate') . '</a>';
}
add_filter('the_content_more_link', 'blankslate_read_more_link');

function blankslate_read_more_link()
{
    if (! is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}
add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');

function blankslate_excerpt_read_more_link($more)
{
    if (! is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}
add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');

function blankslate_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}
add_action('widgets_init', 'blankslate_widgets_init');

function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
add_action('wp_head', 'blankslate_pingback_header');

function blankslate_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');

function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function blankslate_custom_pings($comment)
{
    ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter('get_comments_number', 'blankslate_comment_count', 0);

function blankslate_comment_count($count)
{
    if (! is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

// add option page
add_action('admin_menu', 'option_page_integrate');

function option_page_integrate()
{
    add_menu_page('Option Page', 'Options', 'read', 'post.php?post=20&action=edit', '', 'dashicons-admin-generic', 90);
}

// hide option page from list
add_filter('parse_query', 'exclude_pages_from_admin');

function exclude_pages_from_admin($query)
{
    global $pagenow, $post_type;
    if (is_admin() && $pagenow == 'edit.php' && $post_type == 'page') {
        $settings_page = get_page_by_path("options", NULL, "page")->ID;
        $query->query_vars['post__not_in'] = array(
            $settings_page
        );
    }
}

// custom post for the faq
function della_reviews_post()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats' // post formats
    );

    $labels = array(
        'name' => _x('reviews', 'plural'),
        'singular_name' => _x('review', 'singular'),
        'menu_name' => _x('Reviews', 'admin menu'),
        'name_admin_bar' => _x('review', 'admin bar'),
        'add_new' => _x('Add New Review', 'add new'),
        'add_new_item' => __('Add New Review'),
        'new_item' => __('New Review'),
        'edit_item' => __('Edit Review'),
        'view_item' => __('View Review'),
        'all_items' => __('All Reviews'),
        'search_items' => __('Search Review'),
        'not_found' => __('No Review found.')
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'review'
        ),
        'has_archive' => true,
        'hierarchical' => false
    );

    register_post_type('reviews', $args);
}

add_action('init', 'della_reviews_post');

// custom post for the gallery photos
function della_gallery_post()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats' // post formats
    );

    $labels = array(
        'name' => _x('gallery photos', 'plural'),
        'singular_name' => _x('gallery photo', 'singular'),
        'menu_name' => _x('Gallery Photos', 'admin menu'),
        'name_admin_bar' => _x('gallery photos', 'admin bar'),
        'add_new' => _x('Add New Gallery Photo', 'add new'),
        'add_new_item' => __('Add New Gallery Photo'),
        'new_item' => __('New Gallery Photo'),
        'edit_item' => __('Edit Gallery Photo'),
        'view_item' => __('View Gallery Photo'),
        'all_items' => __('All Gallery Photos'),
        'search_items' => __('Search Gallery Photos'),
        'not_found' => __('No Gallery Photo found.')
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'gallery'
        ),
        'has_archive' => true,
        'hierarchical' => false
    );

    // Register a custom taxonomy for the "gallery" post type
    $taxonomy_labels = array(
        'name' => _x('Gallery Categories', 'taxonomy general name'),
        'singular_name' => _x('Gallery Category', 'taxonomy singular name'),
        'search_items' => __('Search Gallery Categories'),
        'all_items' => __('All Gallery Categories'),
        'edit_item' => __('Edit Gallery Category'),
        'update_item' => __('Update Gallery Category'),
        'add_new_item' => __('Add New Gallery Category'),
        'new_item_name' => __('New Gallery Category Name'),
        'menu_name' => __('Gallery Categories'),
    );

    $taxonomy_args = array(
        'hierarchical' => true,
        'labels' => $taxonomy_labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'gallery-category'), // Change the slug as desired
    );

    register_taxonomy('gallery-category', 'gallery', $taxonomy_args);

    register_post_type('gallery', $args);
}

add_action('init', 'della_gallery_post');


function test_ssl(){
global $wpdb;
$sql= "SELECT option_name, option_value FROM wp_options WHERE option_name IN ('siteurl', 'home')";

//print_r($wpdb->get_results($sql));
//print_r(site_url());


}
add_action('init', 'test_ssl');


