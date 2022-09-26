<?php

/*
  Plugin Name: Reviews
  Description: A plugin that shows reviews on the front-page of your theme.
  Version: 1.0
  Author: Shkurte Azemi
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

require_once plugin_dir_path(__FILE__) . 'inc/generateReviewsHTML.php';

class Reviews
{

    function __construct()
    {
        add_action('init', array($this, 'pluginAssets'));
        add_filter('the_content', array($this, 'showReviewsHtml'), 1);
        remove_filter('the_content','wpautop');
    }

    function pluginAssets()
    {
        wp_enqueue_style('bootstrap-file', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css');
        wp_enqueue_style('main-style', plugin_dir_url(__FILE__) . 'assets/css/main.css');
        wp_enqueue_style('responsive-style', plugin_dir_url(__FILE__) . 'assets/css/responsive.css');

    }

    function showReviewsHtml($content)
    {
        return generateReviewsHTML();

    }

}

$reviews = new Reviews();