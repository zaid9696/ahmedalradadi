<?php

class Customize_homepage{


    public function __construct(){

        add_action('customize_register', array($this, 'register_customize_register'));
    }

    public function register_customize_register($wp_customize){

        $this->homepage_callout_section($wp_customize);

    }

    private function homepage_callout_section($wp_customize){

            $wp_customize->add_section('basic-homepage-callout-section', array(

                'title' => 'Homepage',
                'priority' => 2,
                'description' => __('Editing The Homepage Section', 'Zaid')
            ));
            
            // Add Text
            $wp_customize->add_setting('basic-homepage-callout-display', array(
                'default' => '',
                'sanitize_callback' => array($this, 'sanitze_custom_text')
            ));


            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-homepage-callout-display', array(

                'label' => 'Homepage Title',
                'section' => 'basic-homepage-callout-section',
                'settings' => 'basic-homepage-callout-display',
                'type' => 'textarea'
            )));


            // Add Text 
            $wp_customize->add_setting('basic-homepage-callout-text', array(

                'default' => '',
                'sanitize_callback' => array($this, 'sanitze_custom_text')
            ));

            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-homepage-control', array(

                'label' => 'Homepage Description',
                'section' => 'basic-homepage-callout-section',
                'settings' => 'basic-homepage-callout-text',
                'type' => 'textarea'

            )));

            $wp_customize->add_setting('basic-homepage-small', array(

                'default' => '',
                'sanitize_callback' => array($this, 'sanitze_custom_text')

            ));

            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-homepage-small-control', array(

                'label' => 'Homepage Edit Tite beginning',
                'section' => 'basic-homepage-callout-section',
                'settings' => 'basic-homepage-small',
                'type' => 'textarea'

            )));

            // Add Image

            $wp_customize->add_setting('basic-homepage-callout-image', array(

                'default' => '',
                'type' => 'theme_mod',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => array($this, 'sanitze_custom_url')

            ));

            $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'basic-homepage-callout-control', array(

                'label' => 'Image',
                'section' => 'basic-homepage-callout-section',
                'settings' => 'basic-homepage-callout-image',
                'width' => '330',
                'height' => '330'


            )));



        
    }

    // public function sanitize_custom_option($input){

    //     return ($input === 'No') ? "No" : "Yes";


    // }
    
    //Sanitze Function
    public function sanitze_custom_text($input){

        return filter_var($input, FILTER_SANITIZE_STRING);


    }
    
    public function sanitze_custom_url($input){

        return filter_var($input, FILTER_SANITIZE_URL);

    }


}