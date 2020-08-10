<?php 


function alrdadi_scripts(){

    // Font 
    wp_enqueue_style( "alrdadi_font",  '//fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap');
    // CSS Style
    wp_enqueue_style( "alrdadi_style", get_theme_file_uri( '/css/style.css' ) );
    // JS 
    wp_enqueue_script( 'alrdadi_js', get_theme_file_uri( 'js/dist/main.js' ), array('jquery'), '1.0', true);
    // Sending Data to JS File
    wp_localize_script( 'alrdadi_js', 'alrdadiUri', array(
        'root_uri' => get_site_url()
    ) );



}


add_action('wp_enqueue_scripts', 'alrdadi_scripts');