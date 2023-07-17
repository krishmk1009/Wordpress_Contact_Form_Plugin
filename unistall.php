<?php

if(!defined('WP_UNINSTALL_PLUGIN')){
    header("Location: /firstproject");
    die("");
}


global $wpdb , $table_prefix;
    $wp_contact = $table_prefix."contact";

    $q ="DROP TABLE `$wp_contact`";
    $wpdb->query($q);