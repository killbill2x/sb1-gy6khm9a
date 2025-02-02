<?php
/**
 * Theme functions
 */

function theme_setup() {
    // Add theme support
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'textdomain'),
        'footer-1' => __('Footer Quick Links', 'textdomain'),
        'footer-2' => __('Footer Sports Menu', 'textdomain'),
    ));
}
add_action('after_setup_theme', 'theme_setup');

// Enqueue scripts and styles
function theme_scripts() {
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'theme_scripts');

// Newsletter Form Processing
function process_newsletter_subscription() {
    if (isset($_POST['email']) && is_email($_POST['email'])) {
        // Add your newsletter subscription logic here
        // This is where you'd typically integrate with your email service provider
        
        wp_send_json_success('Thank you for subscribing!');
    } else {
        wp_send_json_error('Please enter a valid email address.');
    }
}
add_action('wp_ajax_newsletter_subscribe', 'process_newsletter_subscription');
add_action('wp_ajax_nopriv_newsletter_subscribe', 'process_newsletter_subscription');