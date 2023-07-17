<?php

/**
 * Plugin Name: myContactForm
 * Description: Create a attractive contact form for your website.
 * Author: Krushna
 * Version: 1.0
 */


 if(!defined('ABSPATH')){
    header("Location: /mycontactformplugin");
    die("");
 }

//  echo "hi this is test plguin for contact form";

//this is a function for Activation hook

function my_activation_function(){
    global $wpdb,$table_prefix;

    $wp_contact = $table_prefix."contact";

    $q= "CREATE TABLE IF NOT EXISTS  `$wp_contact` (`name` TEXT NOT NULL , `email` TEXT NOT NULL , `message` TEXT NOT NULL ) ENGINE = InnoDB;";

    $wpdb->query($q);

    $dummy_data = array(
        "name"=>"dummyName",
        "email"=>"dummyEmail@email.com",
        "message"=>"hi this is a test dummy messsage for activation"
    );

    $wpdb->insert($wp_contact, $dummy_data);
}
//Calling the activation hook
register_activation_hook(__FILE__,"my_activation_function");


//this is a function for Deactivate hook
function my_deactivation_function(){
    global $wpdb,$table_prefix;

    $wp_contact = $table_prefix."contact";
    $q= "TRUNCATE TABLE `$wp_contact`";
    $wpdb->query($q);
}

//Calling the deactivation hook
register_deactivation_hook(__FILE__, "my_deactivation_function");


function my_contact_form_shortcode_fun(){
    ob_start();
    include "public/contactform.php";
    return ob_get_clean();
}
add_shortcode("contact_form1" , "my_contact_form_shortcode_fun");



function my_main_menu_fun(){
  
  include "admin/mainmenu.php";

}

function my_custom_menu_fun(){
    add_menu_page("my_contacts" , "My_Contacts","manage_options" , "My_Contacts" , "my_main_menu_fun" ,"dashicons-media-spreadsheet" );
    
}

add_action("admin_menu","my_custom_menu_fun");


function my_style_fun(){
    
$path=plugins_url("/css/contactform.css" , __FILE__);
// $ver = filemtime(plugin_dir_path(__FILE__) . "css/contactform.css");
// $dep = array("css");
    wp_enqueue_style("my_custom_style", $path );
}
add_action("wp_enqueue_scripts","my_style_fun");
?>

