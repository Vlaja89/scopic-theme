<?php
/*
Plugin Name: Posts News Plugin
Description: Custom plugin for displaying popular News posts.
Version: 1.0
Author: Vladimir Mladenovic
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 'News' custom post type registration.
function posts_news_register_news_post_type() {
    register_post_type('news', array(
        'supports' => array(
            'title', 
            'editor', 
            'comments',
            'thumbnail',
            'excerpt'
        ),
        'rewrite' => array(
            'slug' => 'news'
        ),
        'taxonomies'  => array( 'category', 'post_tag' ), // Add categories and tags
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'News',
            'add_new_item' => 'Add New News',
            'edit_item' => 'Edit News',
            'all_items' => 'All News',
            'singular_name' => 'News'
        ),
        'menu_icon' => 'dashicons-admin-post'
    ));
}
add_action( 'init', 'posts_news_register_news_post_type' );

// Track post views using cookies
function track_post_views_cookie($post_id) {
    if (!is_single()) {
        return;
    }

    $viewed_posts = json_decode($_COOKIE['viewed_posts'] ?? '[]', true);
    if (!$viewed_posts) {
        $viewed_posts = [];
    }

    if (!in_array($post_id, $viewed_posts)) {
        $viewed_posts[] = $post_id;
        setcookie('viewed_posts', json_encode($viewed_posts), time() + 3600 * 24, '/');
        // Increment post views count
        $count = get_post_meta($post_id, 'post_views_count', true);
        $count = (empty($count)) ? 1 : (int)$count + 1;
        update_post_meta($post_id, 'post_views_count', $count);
    }
}
add_action('wp', 'track_post_views_cookie');

// Display popular news posts using shortcode.
function display_popular_news_posts($atts) {
    $atts = shortcode_atts(array(
        'limit' => 5,
    ), $atts);

    $popular_news = new WP_Query(array(
        'post_type'      => 'news',
        'posts_per_page' => $atts['limit'],
        'order'          => 'ASC',
        'orderby'        => 'meta_value_num',
        'meta_key'       => 'post_views_count',
    ));

    if ($popular_news->have_posts()) { ?>
        <div class="news-list">
            <?php while ($popular_news->have_posts()) {
                $popular_news->the_post(); ?>

                <div class="single-news">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>

            <?php } ?>
        </div>
        <?php
        wp_reset_postdata();
        return;
    }

    return 'No popular news found.';
}
add_shortcode('scopic_news', 'display_popular_news_posts');

// Activation plugin
function posts_news_activate_plugin() {
    // Add post meta key for tracking post views to all existing posts
    $args = array(
        'post_type'      => 'news',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    );
    $posts = get_posts($args);
    foreach ($posts as $post_id) {
        add_post_meta($post_id, 'post_views_count', 0, true);
    }
}
register_activation_hook( __FILE__, 'posts_news_activate_plugin' );

// Deactivation plugin
function posts_news_deactivate_plugin() {
    // Remove post meta key for tracking post views from all posts
    $args = array(
        'post_type'      => 'news',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    );
    $posts = get_posts($args);
    foreach ($posts as $post_id) {
        delete_post_meta($post_id, 'post_views_count');
    }
}
register_deactivation_hook( __FILE__, 'posts_news_deactivate_plugin' );

