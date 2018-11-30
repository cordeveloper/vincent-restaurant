<?php 

/**
 * @package vincent 
    ==============================
        ADMIN ENQUEUE FUNCTIONS
    ==============================
 */

 function vincent_load_admin_scripts( $hook ){
     
    wp_register_style('vincent_admin', get_template_directory_uri(). '/assets/css/vincent.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('vincent_admin');

    wp_enqueue_media();

    wp_register_script('vincent-admin-script', get_template_directory_uri().'/assets/js/vincent.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('vincent-admin-script');
 }

 add_action('admin_enqueue_scripts', 'vincent_load_admin_scripts');



?>