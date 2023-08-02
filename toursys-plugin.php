<?php
/*
 * Plugin Name: TourSys Connect
 * Plugin URI: https://www.toursys.asia
 * Description: TourSys plugins to enable shortcodes for booking button and booking forms
 * Version: 1.2.9
 * Author: TourSys
 * Author URI: https://www.toursys.asia
 * License: GPL2
 */

include_once(__DIR__ . "/toursys_plugin_constant.php");
include_once(__DIR__ . "/includes/shortcode.php");


add_action('init', 'TourSysPlugin::init');
add_action('admin_enqueue_scripts','TourSysPlugin::include_css_js');
add_action('wp_enqueue_scripts','TourSysPlugin::include_css_js');


class TourSysPlugin
{

    const VERSION           = '1.2.9';
    const PLUGIN_ID         = 'toursys';
    const CREDENTIAL_ACTION = self::PLUGIN_ID . '-nonce-action';
    const CREDENTIAL_NAME   = self::PLUGIN_ID . '-nonce-key';
    const PLUGIN_DB_PREFIX  = self::PLUGIN_ID . '_';



    static function init()
    {
        $GLOBALS['toursys-api-key'] = "unlicenced";



        return new self();
    }

    function __construct()
    {
        if (is_admin() && is_user_logged_in()) {

            add_action('admin_menu', [
                $this,
                'set_plugin_menu'
            ]);
            add_action('admin_menu', [
                $this,
                'set_plugin_sub_menu'
            ]);

            add_action(
                'admin_init',
                [$this, 'save_config'])
            ;
        }
    }

    function set_plugin_menu()
    {
        add_menu_page(
            'TourSys', // Page Title
            'TourSys', // Menu Title
            'manage_options', // Permissions
            'toursys-slug', // Page URL
            [
                $this,
                'show_about_plugin'
            ], // CallBack on meu
            plugin_dir_url( __FILE__ ) . 'admin/images/logo-toursys-small.png',
            99 // Menu Off Set

        );
    }

    function set_plugin_sub_menu()
    {
        add_submenu_page(
            'toursys-slug', // Root menu slug
            'Settings', // Page Title
            'Settings', // Menu Title
            'manage_options', // Permissions
            'toursys-slug', // Slug
            [
                $this,
                'show_about_plugin'
            ], // CallBack on menu

        );


        add_submenu_page(
            'toursys-slug', // Root menu slug
            'How to Use', // Page Title
            'How to Use ',// Menu Title
            'manage_options', // Permissions
            'toursys-slug-setting', // Slug
            [
                $this,
                'show_how_to_use'
            ], // CallBack on menu

        );

        add_submenu_page(
            'toursys-slug', // Root menu slug
            'FAQ', // Page Title
            'FAQ ',// Menu Title
            'manage_options', // Permissions
            'toursys-slug-faq', // Slug
            [
                $this,
                'show_faq'
            ], // CallBack on menu

        );
    }

    static function include_css_js(){



        if (is_admin()) {
            wp_enqueue_style('toursys-jquery-ui-css', plugin_dir_url(__FILE__) . 'admin/css/jquery-ui.min.css');
            wp_enqueue_style('toursys-jquery-ui-structure-css', plugin_dir_url(__FILE__) . 'admin/css/jquery-ui.structure.min.css');
            wp_enqueue_style('toursys-plugin-css', plugin_dir_url(__FILE__) . 'admin/css/toursys-plugin.css');
            wp_enqueue_style('toursys-huebee-css', plugin_dir_url(__FILE__) . 'admin/css/huebee.min.css');
            wp_enqueue_style('toursys-style-css', plugin_dir_url(__FILE__) . 'admin/css/style.css');

            wp_enqueue_script('jquery');
            wp_enqueue_script( 'jquery-ui-core');
            wp_enqueue_script( 'jquery-ui-datepicker');
            wp_enqueue_script( 'jquery-ui-widget');
            wp_enqueue_script( 'jquery-ui-mouse');
            wp_enqueue_script( 'jquery-ui-accordion' );
            wp_enqueue_script( 'jquery-ui-autocomplete');
            wp_enqueue_script( 'jquery-ui-slider');
            wp_enqueue_script( 'jquery-ui-tabs');

            wp_enqueue_script( 'toursys-huebee', plugin_dir_url(__FILE__) . 'admin/js/huebee.pkgd.min.js', array('jquery') );
            wp_enqueue_script( 'toursys-plugin', plugin_dir_url(__FILE__) . 'admin/js/toursys-plugin.js', array('jquery') );

        }
        else{

            wp_enqueue_style('toursys-jquery-ui-css', plugin_dir_url(__FILE__) . 'public/css/jquery-ui.min.css');
            wp_enqueue_style('toursys-jquery-ui-structure-css', plugin_dir_url(__FILE__) . 'public/css/jquery-ui.structure.min.css');
            wp_enqueue_style('toursys-plugin-css', plugin_dir_url(__FILE__) . 'public/css/toursys-plugin.css');
           // wp_enqueue_style('toursys-style-css', plugin_dir_url(__FILE__) . 'public/css/style.css');
            wp_enqueue_style('toursys-spinner-css', plugin_dir_url(__FILE__) . 'public/css/spinner.css');

            wp_enqueue_script('jquery');
            wp_enqueue_script( 'jquery-ui-core');
            wp_enqueue_script( 'jquery-ui-datepicker');
            wp_enqueue_script( 'jquery-ui-widget');
            wp_enqueue_script( 'jquery-ui-mouse');
            wp_enqueue_script( 'jquery-ui-accordion' );
            wp_enqueue_script( 'jquery-ui-autocomplete');
            wp_enqueue_script( 'jquery-ui-slider');
            wp_enqueue_script( 'jquery-ui-tabs');

            wp_enqueue_script( 'spinner-plugin', plugin_dir_url(__FILE__) . 'public/js/spinner.js', array('jquery'), '', true);
            wp_enqueue_script( 'toursys-plugin', plugin_dir_url(__FILE__) . 'public/js/toursys-plugin.js', array('jquery'), '', true);


        }


    }



    function show_about_plugin()
    {
        include_once("admin/views/setting.php");
    }

    function show_how_to_use(){
        include_once("admin/views/how-to-use.php");
    }

    function show_faq(){
        include_once("admin/views/faq.php");
    }


    function save_config(){


    }


}
?>
