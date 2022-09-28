<?php

/*
    Plugin Name: Reviews
    Description: A plugin that shows toplist reviews on the front-page of your theme.
    Version: 1.0
    Author: Shkurte Azemi
    Text Domain: reviews-app
    License: GPL v2 or later
    License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

require_once plugin_dir_path(__FILE__) . 'inc/generateReviewsHTML.php';

class Reviews
{

    function __construct()
    {
        //register hooks and filters that are needed for the plugin
        add_action('admin_menu', array($this, 'adminPage'));
        add_action('admin_init', array($this, 'settings'));
        add_action('wp_enqueue_scripts', array($this, 'pluginAssets'));
        add_action('admin_enqueue_scripts', array($this, 'pluginSettingPageColorPicker'));
        add_filter('the_content', array($this, 'showReviewsHtml'), 1);
        remove_filter('the_content', 'wpautop');
    }

    //add setting options fields
    function settings()
    {
        //add two sections
        add_settings_section('labels_first_section', 'Table Header Settings', null, 'toplist-reviews-page');
        add_settings_section('labels_second_section', 'Other Labels', null, 'toplist-reviews-page');

        //register Table Header Label fields
        add_settings_field('casino_label', 'Casino Label', array($this, 'casinoLabel'), 'toplist-reviews-page', 'labels_first_section');
        register_setting('toplistreviewsplugin', 'casino_label', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));

        add_settings_field('bonus_label', 'Bonus Label', array($this, 'bonusLabel'), 'toplist-reviews-page', 'labels_first_section');
        register_setting('toplistreviewsplugin', 'bonus_label', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));

        add_settings_field('features_label', 'Features Label', array($this, 'featuresLabel'), 'toplist-reviews-page', 'labels_first_section');
        register_setting('toplistreviewsplugin', 'features_label', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));

        add_settings_field('play_label', 'Play Label', array($this, 'playLabel'), 'toplist-reviews-page', 'labels_first_section');
        register_setting('toplistreviewsplugin', 'play_label', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));

        //register Color Picker field to dynamically choose the table header background color
        add_settings_field('table_header_bg_color', 'Table Header Background Color', array($this, 'thBgColor'), 'toplist-reviews-page', 'labels_first_section');
        register_setting('toplistreviewsplugin', 'table_header_bg_color', array('sanitize_callback' => 'sanitize_text_field', 'default' => '#d29f36'));

        //register other label fields
        add_settings_field('review_label', 'Review Label', array($this, 'reviewLabel'), 'toplist-reviews-page', 'labels_second_section');
        register_setting('toplistreviewsplugin', 'review_label', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));

        add_settings_field('play_button_label', 'Play Button Label', array($this, 'playButtonLabel'), 'toplist-reviews-page', 'labels_second_section');
        register_setting('toplistreviewsplugin', 'play_button_label', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));
    }

    //show the input for Casino Table Header
    function casinoLabel()
    {
        ?>
        <input type="text" name="casino_label" value="<?php echo esc_attr(get_option('casino_label')) ?>"
               style="width:600px">
        <?php
    }

    //show the input field for Bonus Table Header
    function bonusLabel()
    {
        ?>
        <input type="text" name="bonus_label" value="<?php echo esc_attr(get_option('bonus_label')) ?>"
               style="width:600px">
        <?php
    }

    //show the input field for Features Table Header
    function featuresLabel()
    {
        ?>
        <input type="text" name="features_label" value="<?php echo esc_attr(get_option('features_label')) ?>"
               style="width:600px">
        <?php
    }

    //show the input field for Play Table Header
    function playLabel()
    {
        ?>
        <input type="text" name="play_label" value="<?php echo esc_attr(get_option('play_label')) ?>"
               style="width:600px">
        <?php
    }

    //show the input field for the Play Button label
    function playButtonLabel()
    {
        ?>
        <input type="text" name="play_button_label" value="<?php echo esc_attr(get_option('play_button_label')) ?>"
               style="width:600px">
        <?php
    }

    //show input field for the review label
    function reviewLabel()
    {
        ?>
        <input type="text" name="review_label" value="<?php echo esc_attr(get_option('review_label')) ?>"
               style="width:600px">
        <?php
    }

    //show the Color Picker field
    function thBgColor()
    {
        ?>
        <input class="my-color-field" name="table_header_bg_color" type="text"
               value="<?php echo esc_attr(get_option('table_header_bg_color')) ?>" data-default-color="#d29f36"/>
        <?php
    }

    //register admin page in the dashboard menu
    function adminPage()
    {
        add_options_page('Toplist Reviews App Labels', 'Toplist Reviews App', 'manage_options', 'toplist-reviews-page', array($this, 'ourHtml'));
    }

    //render settings fields HTML
    function ourHtml()
    {
        //check if current logged in user has administrator privileges
        if (!current_user_can('manage_options')) {
            return;
        }

        ?>
        <div class="wrap">
            <h1> <?php _e('Plugin Settings', 'reviews-app') ?></h1>
            <div class="tab-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('toplistreviewsplugin');
                    do_settings_sections('toplist-reviews-page');
                    submit_button();
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    //enqueue js scripts and styles
    function pluginAssets()
    {
        wp_enqueue_style('bootstrap-file', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css');
        wp_enqueue_style('main-style', plugin_dir_url(__FILE__) . 'assets/css/main.css');
        wp_enqueue_style('responsive-style', plugin_dir_url(__FILE__) . 'assets/css/responsive.css');

    }

    //include wp-color-picker jquery script and style
    function pluginSettingPageColorPicker()
    {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('main-script', plugins_url('assets/js/main.js', __FILE__), array('wp-color-picker'), false, true);
    }

    //callback function for the content filter hook that will render the table
    function showReviewsHtml($content)
    {
        return generateReviewsHTML();
    }

}

$reviews = new Reviews();