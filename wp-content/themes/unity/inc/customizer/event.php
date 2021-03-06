<?php
add_action( 'customize_register', 'wpo_ct_event_setting' );
function wpo_ct_event_setting( $wp_customize ){
    
    $wp_customize->add_panel( 'panel_event', array(
        'priority' => 81,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Event', TEXTDOMAIN ),
        'description' =>__( 'Make default setting for page, general', TEXTDOMAIN ),
    ) );

    /**
     * Layout Setting
     */
    $wp_customize->add_section( 'event_layout_settings', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Layout Setting', TEXTDOMAIN ),
        'description' => '',
        'panel' => 'panel_event',
    ) );

    $wp_customize->add_setting( 'wpo_theme_options[event-archive-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '0-1-1',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[event-archive-layout]', array(
        'settings'  => 'wpo_theme_options[event-archive-layout]',
        'label'     => __('Archive Layout', TEXTDOMAIN),
        'section'   => 'event_layout_settings',
        'priority' => 1

    ) ) );
   
    $wp_customize->add_setting( 'wpo_theme_options[event-archive-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    
    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[event-archive-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[event-archive-left-sidebar]',
        'label'     => __('Archive Left Sidebar', TEXTDOMAIN),
        'section'   => 'event_layout_settings' ,
         'priority' => 2
    ) ) );

     /// 
    $wp_customize->add_setting( 'wpo_theme_options[event-archive-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[event-archive-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[event-archive-right-sidebar]',
        'label'     => __('Archive Right Sidebar', TEXTDOMAIN),
        'section'   => 'event_layout_settings',
         'priority' => 2 
    ) ) );

     ///  single layout setting
    $wp_customize->add_setting( 'wpo_theme_options[event-single-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '0-1-1',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[event-single-layout]', array(
        'settings'  => 'wpo_theme_options[event-single-layout]',
        'label'     => __('Single Blog Layout', TEXTDOMAIN),
        'section'   => 'event_layout_settings' 
    ) ) );

   
    $wp_customize->add_setting( 'wpo_theme_options[event-single-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[event-single-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[event-single-left-sidebar]',
        'label'     => __('Single Event Left Sidebar', TEXTDOMAIN),
        'section'   => 'event_layout_settings' 
    ) ) );

     $wp_customize->add_setting( 'wpo_theme_options[event-single-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[event-single-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[event-single-right-sidebar]',
        'label'     => __('Single event Right Sidebar', TEXTDOMAIN),
        'section'   => 'event_layout_settings' 
    ) ) );

    $wp_customize->add_setting('wpo_theme_options[event_show-title]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[event_show-title]', array(
        'settings'  => 'wpo_theme_options[gallery_show-title]',
        'label'     => __('Show title', TEXTDOMAIN),
        'section'   => 'event_layout_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[event_show-breadcrumb]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[event_show-breadcrumb]', array(
        'settings'  => 'wpo_theme_options[gallery_show-breadcrumb]',
        'label'     => __('Show breadcrumb', TEXTDOMAIN),
        'section'   => 'event_layout_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    /**
     * Archive Setting
     */
    $wp_customize->add_section( 'event_archive_general_settings', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Archive Setting', TEXTDOMAIN ),
        'description' => '',
        'panel' => 'panel_event',
    ) );

     $wp_customize->add_setting('wpo_theme_options[event-archive-column]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 3,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[event-archive-column]', array(
        'label'      => __( 'Select column', TEXTDOMAIN ),
        'section'    => 'event_archive_general_settings',
        'type'       => 'select',
        'choices'     => array(
            '2' => __('2 column', TEXTDOMAIN ),
            '3' => __('3 column', TEXTDOMAIN ),
            '4' => __('4 column', TEXTDOMAIN )
        )
    ) );
    $wp_customize->add_setting('wpo_theme_options[event-archive-items]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 9,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[event-archive-items]', array(
        'label'      => __( 'Post per page', TEXTDOMAIN ),
        'section'    => 'event_archive_general_settings',
        'settings'  => 'wpo_theme_options[event-archive-items]',
    ) );  
}
