<?php
add_action( 'customize_register', 'wpo_ct_campaign_setting' );
function wpo_ct_campaign_setting( $wp_customize ){
    
    $wp_customize->add_panel( 'panel_campaign', array(
        'priority' => 81,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Campaign', TEXTDOMAIN ),
        'description' =>__( 'Make default setting for page, general', TEXTDOMAIN ),
    ) );

    /**
     * Setting button campaign
     */
    $wp_customize->add_section( 'campaign_button_settings', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Button Campaign Setting', TEXTDOMAIN ),
        'description' => '',
        'panel' => 'panel_campaign',
    ) );

    //show button create campaign
    $wp_customize->add_setting('wpo_theme_options[enable_button_campaign]', array(
        'capability' => 'manage_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[enable_button_campaign]', array(
        'settings'  => 'wpo_theme_options[enable_button_campaign]',
        'label'     => __('Enable Button Create Campaign', TEXTDOMAIN),
        'section'   => 'campaign_button_settings',
        'type'      => 'checkbox'
    ) );

    //Text button create campaign
    $wp_customize->add_setting('wpo_theme_options[text_button_campaign]', array(
        'capability' => 'manage_options',
        'type'       => 'option',
        'default'   => __('Create a campaign',TEXTDOMAIN),
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[text_button_campaign]', array(
        'settings'  => 'wpo_theme_options[text_button_campaign]',
        'label'     => __('Custom Text for Button', TEXTDOMAIN),
        'section'   => 'campaign_button_settings',
    ) );

    //use link create campaign
    $wp_customize->add_setting('wpo_theme_options[enable_link_campaign]', array(
        'capability' => 'manage_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[enable_link_campaign]', array(
        'settings'  => 'wpo_theme_options[enable_link_campaign]',
        'label'     => __('Enable Link Create Campaign', TEXTDOMAIN),
        'section'   => 'campaign_button_settings',
        'type'      => 'checkbox'
    ) );


    //Link button create campaign
    $wp_customize->add_setting('wpo_theme_options[link_button_campaign]', array(
        'capability' => 'manage_options',
        'type'       => 'option',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[link_button_campaign]', array(
        'settings'  => 'wpo_theme_options[link_button_campaign]',
        'label'     => __('Custom Link for Button', TEXTDOMAIN),
        'section'   => 'campaign_button_settings',
    ) );


    /**
     * Layout Setting
     */
    $wp_customize->add_section( 'campaign_layout_settings', array(
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Layout Setting', TEXTDOMAIN ),
        'description' => '',
        'panel' => 'panel_campaign',
    ) );

    ///  Archive layout setting
    $wp_customize->add_setting('wpo_theme_options[campaign-archive-style]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '4',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[campaign-archive-style]', array(
        'label'      => __( 'Campaign archive style', TEXTDOMAIN ),
        'section'    => 'campaign_archive_general_settings',
        'type'       => 'select',
        'choices'     => array(
            'style-1' => __('Style 1', TEXTDOMAIN ),
            'style-2' => __('Style 2', TEXTDOMAIN ),
            'style-3' => __('Style 3', TEXTDOMAIN ),
        ),
        'default' => 'style-1'
    ) ); 

    $wp_customize->add_setting( 'wpo_theme_options[campaign-archive-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '0-1-1',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize, 'wpo_theme_options[campaign-archive-layout]', array(
        'settings'  => 'wpo_theme_options[campaign-archive-layout]',
        'label'     => __('Archive Layout', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings',
        'priority' => 1

    ) ) );
   
    $wp_customize->add_setting( 'wpo_theme_options[campaign-archive-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    
    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[campaign-archive-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[campaign-archive-left-sidebar]',
        'label'     => __('Archive Left Sidebar', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings' ,
         'priority' => 2
    ) ) );

     /// 
    $wp_customize->add_setting( 'wpo_theme_options[campaign-archive-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize, 'wpo_theme_options[campaign-archive-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[campaign-archive-right-sidebar]',
        'label'     => __('Archive Right Sidebar', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings',
         'priority' => 2 
    ) ) );

     ///  single layout setting
    $wp_customize->add_setting( 'wpo_theme_options[campaign-single-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '0-1-1',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Layout_DropDown( $wp_customize,  'wpo_theme_options[campaign-single-layout]', array(
        'settings'  => 'wpo_theme_options[campaign-single-layout]',
        'label'     => __('Single Blog Layout', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings' 
    ) ) );

   
    $wp_customize->add_setting( 'wpo_theme_options[campaign-single-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[campaign-single-left-sidebar]', array(
        'settings'  => 'wpo_theme_options[campaign-single-left-sidebar]',
        'label'     => __('Single Campaign Left Sidebar', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings' 
    ) ) );

     $wp_customize->add_setting( 'wpo_theme_options[campaign-single-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WPO_Sidebar_DropDown( $wp_customize,  'wpo_theme_options[campaign-single-right-sidebar]', array(
        'settings'  => 'wpo_theme_options[campaign-single-right-sidebar]',
        'label'     => __('Single campaign Right Sidebar', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings' 
    ) ) );

    $wp_customize->add_setting('wpo_theme_options[campaign_show-title]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[campaign_show-title]', array(
        'settings'  => 'wpo_theme_options[campaign_show-title]',
        'label'     => __('Show title', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('wpo_theme_options[campaign_show-breadcrumb]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('wpo_theme_options[campaign_show-breadcrumb]', array(
        'settings'  => 'wpo_theme_options[campaign_show-breadcrumb]',
        'label'     => __('Show breadcrumb', TEXTDOMAIN),
        'section'   => 'campaign_layout_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    /**
     * Archive Setting
     */
    $wp_customize->add_section( 'campaign_archive_general_settings', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Archive Setting', TEXTDOMAIN ),
        'description' => '',
        'panel' => 'panel_campaign',
    ) );

     $wp_customize->add_setting('wpo_theme_options[campaign-archive-column]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '4',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[campaign-archive-column]', array(
        'label'      => __( 'Select column', TEXTDOMAIN ),
        'section'    => 'campaign_archive_general_settings',
        'type'       => 'select',
        'choices'     => array(
            '2' => __('2 column', TEXTDOMAIN ),
            '3' => __('3 column', TEXTDOMAIN ),
            '4' => __('4 column', TEXTDOMAIN )
        )
    ) );
    $wp_customize->add_setting('wpo_theme_options[campaign-archive-items]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'wpo_theme_options[campaign-archive-items]', array(
        'label'      => __( 'Post per page', TEXTDOMAIN ),
        'section'    => 'campaign_archive_general_settings',
        'settings'  => 'wpo_theme_options[campaign-archive-items]',
    ) );   
}
