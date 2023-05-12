<?php
/*
 * Plugin Name:       Custom-plugin
 * Description:       My very first custom plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author: Nontobeko
 */
function donate_shortcode( $atts, $content = null) {
    global $post;extract(shortcode_atts(array(
    'account' => 'your-paypal-email-address',
    'for' => $post->post_title,
    'onHover' => '',
    ), $atts));
    if(empty($content)) $content='Make A Donation';
    return '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business='.$account.'&item_name=Donation for '.$for.'" title="'.$onHover.'">'.$content.'</a>';
    }
    add_shortcode('donate', 'donate_shortcode');

    add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'Treasure Hunters',
        'Treasure Hunters Options',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/view.php',
        null
        'dashicons-admin-site-alt3',
        20
    );
}