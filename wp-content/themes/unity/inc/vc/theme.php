<?php
	/*********************************************************************************************************************
	 *  Vertical menu
	 *********************************************************************************************************************/
	$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
    $option_menu = array('---Select Menu---'=>'');
    foreach ($menus as $menu) {
    	$option_menu[$menu->name]=$menu->term_id;
    }
	vc_map( array(
	    "name" => __("WPO Vertical Menu",TEXTDOMAIN),
	    "base" => "wpo_verticalmenu",
	    "class" => "",
	    "category" => $this->l('WPO Elements'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => 'Vertical Menu'
			),
	    	array(
				"type" => "dropdown",
				"heading" => __("Menu", TEXTDOMAIN),
				"param_name" => "menu",
				"value" => $option_menu,
				"admin_label" => true,
				"description" => __("Select menu.", TEXTDOMAIN)
			),
			array(
				"type" => "dropdown",
				"heading" => __("Position", TEXTDOMAIN),
				"param_name" => "postion",
				"value" => array(
						'left'=>'left',
						'right'=>'right'
					),
				"admin_label" => true,
				"description" => __("Postion Menu Vertical.", TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_verticalmenu', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  Portfolio
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Portfolio",TEXTDOMAIN),
	    "base" => "wpo_portfolio",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Portfolio',
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),

	    	array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),

			array(
				"type" => "textarea",
				'heading' => __( 'Description', TEXTDOMAIN ),
				"param_name" => "descript",
				"value" => ''
		    ),

			array(
				"type" => "textfield",
				"heading" => __("Number of portfolio to show", TEXTDOMAIN),
				"param_name" => "number",
				"value" => '6'
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Columns count', TEXTDOMAIN ),
				'param_name' => 'columns_count',
				'value' => array( 6, 4, 3, 2, 1 ),
				'std' => 3,
				'admin_label' => true,
				'description' => __( 'Select columns count.', TEXTDOMAIN )
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Style display', TEXTDOMAIN ),
				'param_name' => 'style',
				'value' => array( 'Style 1'=>'square effect2', 'Style 2'=>'effect3 bottom_to_top', 'Style 3'=>'effect5 left_to_right', 'Style 4'=>'effect6 bottom_to_top', 'Style 5'=>'effect7', 'Style 6'=>'effect8 scale_up', 'Style 7'=>'effect10 left_to_right', 'Style 8'=>'effect12 left_to_right', 'Style 9'=>'effect14 left_to_right', 'Style 10'=>'effect15 left_to_right'),
				'std' => 'style-1',
				'admin_label' => true,
				'description' => __( 'Select style display.', TEXTDOMAIN )
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_portfolio', ('wpo_vc_shortcode_render') );


	/**********************************************************************************************************************
	 * Testimonials
	 **********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Testimonials",TEXTDOMAIN),
	    "base" => "wpo_testimonials",
	    'description'=> __('Play Testimonials In Carousel', TEXTDOMAIN),
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"admin_label" => true,
				"value" => '',
					"admin_label" => true
			),

	    	array(
                'type' => 'dropdown',
                'heading' => __( 'Title font size', TEXTDOMAIN ),
                'param_name' => 'size',
                'value' => array(
                    __( 'Large', TEXTDOMAIN ) => 'font-size-lg',
                    __( 'Medium', TEXTDOMAIN ) => 'font-size-md',
                    __( 'Small', TEXTDOMAIN ) => 'font-size-sm',
                    __( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
                )
            ),

            array(
                'type' => 'dropdown',
                'heading' => __( 'Title Alignment', TEXTDOMAIN ),
                'param_name' => 'alignment',
                'value' => array(
                    __( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
                    __( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
                    __( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
                )
            ),
            array(
				"type" => "textfield",
				"heading" => __("Number", TEXTDOMAIN),
				"param_name" => "number",
				"value" => '6',
			),
			array(
				"type" => "dropdown",
				"heading" => __("Skin", TEXTDOMAIN),
				"param_name" => "skin",
				"value" => array('Skin 1'=>'skin-1','Skin 2'=>'skin-2'),
				"admin_label" => true,
				"description" => __("Select Skin layout.", TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_testimonials', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  Brands Carousel
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Brands Carousel",TEXTDOMAIN),
	    "base" => "wpo_brands",
	    'description'=>'Show Brand Logos, Manufacture Logos',
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

	    	array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),

			array(
				"type" => "textarea",
				"heading" => __('Description', TEXTDOMAIN),
				"param_name" => "descript",
				"value" => ''
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),

			array(
				"type" => "textfield",
				"heading" => __("Number of brands to show", TEXTDOMAIN),
				"param_name" => "number",
				"value" => '6'
			),
			array(
				"type" => "textfield",
				"heading" => __("Icon", TEXTDOMAIN),
				"param_name" => "icon"
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_brands', ('wpo_vc_shortcode_render') );


	/*********************************************************************************************************************
	 * Pricing Table
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Pricing",TEXTDOMAIN),
	    "base" => "wpo_pricing",
	    "description" => __('Make Plan for membership', TEXTDOMAIN ),
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __("Price", TEXTDOMAIN),
				"param_name" => "price",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Currency", TEXTDOMAIN),
				"param_name" => "currency",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Period", TEXTDOMAIN),
				"param_name" => "period",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Subtitle", TEXTDOMAIN),
				"param_name" => "subtitle",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "dropdown",
				"heading" => __("Is Featured", TEXTDOMAIN),
				"param_name" => "featured",
				'value' 	=> array(  __('No', TEXTDOMAIN) => 0,  __('Yes', TEXTDOMAIN) => 1 ),
			),

			array(
				"type" => "dropdown",
				"heading" => __("Box Style", TEXTDOMAIN),
				"param_name" => "style",
				'value' 	=> array( 'boxed' => __('Boxed', TEXTDOMAIN), 'label' => __('Label', TEXTDOMAIN) , 'table' => __('Table', TEXTDOMAIN) ),
			),

			array(
				"type" => "textarea_html",
				"heading" => __("Content", TEXTDOMAIN),
				"param_name" => "content",
				"value" => '',
				'description'	=> __('Allow  put html tags', TEXTDOMAIN)
			),

			array(
				"type" => "textfield",
				"heading" => __("Link Title", TEXTDOMAIN),
				"param_name" => "linktitle",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Link", TEXTDOMAIN),
				"param_name" => "link",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_pricing', ('wpo_vc_shortcode_render') );

	/******************************
	 * Our Team
	 ******************************/
	vc_map( array(
	    "name" => __("WPO Our Team Grid Style",TEXTDOMAIN),
	    "base" => "wpo_team",
	    "class" => "",
	    "description" => 'Show Personal Profile Info',
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "attach_image",
				"heading" => __("Photo", TEXTDOMAIN),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Job", TEXTDOMAIN),
				"param_name" => "job",
				"value" => 'CEO',
				'description'	=>  ''
			),

			array(
				"type" => "textarea",
				"heading" => __("information", TEXTDOMAIN),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', TEXTDOMAIN)
			),
			array(
				"type" => "textfield",
				"heading" => __("Phone", TEXTDOMAIN),
				"param_name" => "phone",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Google Plus", TEXTDOMAIN),
				"param_name" => "google",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Facebook", TEXTDOMAIN),
				"param_name" => "facebook",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Twitter", TEXTDOMAIN),
				"param_name" => "twitter",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Pinterest", TEXTDOMAIN),
				"param_name" => "pinterest",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Linked In", TEXTDOMAIN),
				"param_name" => "linkedin",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", TEXTDOMAIN),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', TEXTDOMAIN), 'vertical' => __('vertical', TEXTDOMAIN) , 'horizontal' => __('horizontal', TEXTDOMAIN) ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_team', ('wpo_vc_shortcode_render') );

	/******************************
	 * Our Team
	 ******************************/
	vc_map( array(
		"name" => __("WPO Our Team List Style",TEXTDOMAIN),
		"base" => "wpo_team_list",
		"class" => "",
		"description" => __('Show Info In List Style', TEXTDOMAIN),
		"category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "attach_image",
				"heading" => __("Photo", TEXTDOMAIN),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Phone", TEXTDOMAIN),
				"param_name" => "phone",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textarea",
				"heading" => __("information", TEXTDOMAIN),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', TEXTDOMAIN)
			),
			array(
				"type" => "textarea",
				"heading" => __("blockquote", TEXTDOMAIN),
				"param_name" => "blockquote",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Email", TEXTDOMAIN),
				"param_name" => "email",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Facebook", TEXTDOMAIN),
				"param_name" => "facebook",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Twitter", TEXTDOMAIN),
				"param_name" => "twitter",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Linked In", TEXTDOMAIN),
				"param_name" => "linkedin",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", TEXTDOMAIN),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', TEXTDOMAIN), 'vertical' => __('vertical', TEXTDOMAIN) , 'horizontal' => __('horizontal', TEXTDOMAIN) ),
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)

	   	)
	));
	add_shortcode( 'wpo_team_list', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  Info Box
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Info Box",TEXTDOMAIN),
	    "base" => "wpo_inforbox",
	    "class" => "",
	    "description"=> __( 'Show header, text in special style', TEXTDOMAIN),
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value'      => array(
					__( 'Large', TEXTDOMAIN )       => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN )      => 'font-size-md',
					__( 'Small', TEXTDOMAIN )       => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'title_align',
				'value'      => array(
				__( 'Align left', TEXTDOMAIN )   => 'separator_align_left',
				__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
				__( 'Align right', TEXTDOMAIN )  => 'separator_align_right'
				)
			),

			array(
				"type" => "textarea",
				"heading" => __("information", TEXTDOMAIN),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', TEXTDOMAIN)
			),
			array(
				"type" => "attach_image",
				"heading" => __("Backgroup Image", TEXTDOMAIN),
				"param_name" => "imagebg",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "colorpicker",
				"heading" => __("Background Color", TEXTDOMAIN),
				"param_name" => "colorbg",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_inforbox', ('wpo_vc_shortcode_render') );



	/*********************************************************************************************************************
	 *  Our Service
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Our Service",TEXTDOMAIN),
	    "base" => "wpo_service",
	    "description"=> __('Decreale Service Info', TEXTDOMAIN),
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name'                     => 'title_align',
				'value'                          => array(
				__( 'Align left', TEXTDOMAIN )   => 'separator_align_left',
				__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
				__( 'Align right', TEXTDOMAIN )  => 'separator_align_right'
				)
			),

		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", TEXTDOMAIN),
				"param_name" => "icon",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', TEXTDOMAIN )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
								. __( 'here to see the list', TEXTDOMAIN ) . '</a>'
			),

			array(
				"type" => "attach_image",
				"heading" => __("Photo", TEXTDOMAIN),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textarea",
				"heading" => __("information", TEXTDOMAIN),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', TEXTDOMAIN )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style", TEXTDOMAIN),
				"param_name" => "style",
				'value' 	=> array(
					__('Default', TEXTDOMAIN) => 'default', 
					__('Text center', TEXTDOMAIN) => 'text-center', 
					__('Quote', TEXTDOMAIN )=> 'quote',
					__('Icon Radius', TEXTDOMAIN) => 'icon-radius' 
				),
			),	
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_service', ('wpo_vc_shortcode_render') );



	/*********************************************************************************************************************
	 *  WPO Counter
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Counter",TEXTDOMAIN),
	    "base" => "wpo_counter",
	    "class" => "",
	    "description"=> __('Counting number with your term', TEXTDOMAIN),
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				"type" => "textfield",
				"heading" => __("Number", TEXTDOMAIN),
				"param_name" => "number",
				"value" => ''
			),

		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", TEXTDOMAIN),
				"param_name" => "icon",
				"value" => 'fa-desktop',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', TEXTDOMAIN )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
								. __( 'here to see the list', TEXTDOMAIN ) . '</a>'
			),


			array(
				"type" => "attach_image",
				"description" => __("If you upload an image, icon will not show.", TEXTDOMAIN),
				"param_name" => "image",
				"value" => '',
				'heading'	=> __('Image', TEXTDOMAIN )
			),

			array(
				"type" => "colorpicker",
				"heading" => __("Icon Color", TEXTDOMAIN),
				"param_name" => "color",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", TEXTDOMAIN),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', TEXTDOMAIN), 'vertical' => __('vertical', TEXTDOMAIN) , 'horizontal' => __('horizontal', TEXTDOMAIN) ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	 



	/*********************************************************************************************************************
	 *  Mega Posts
	 *********************************************************************************************************************/

	function parramMegaLayout($settings,$value){
		$dependency = vc_generate_dependencies_attributes($settings);
		ob_start();
		?>
			<div class="layout_images">
				<?php foreach ($settings['layout_images'] as $key => $image) {
					echo '<img src="'.esc_url( $image ).'" data-layout="'.esc_attr( $key ).'" class="'.esc_attr( $key ).' '.(($key==$value)?'active':'').'">';
				} ?>
			</div>
			<input 	type="hidden"
					name="<?php echo esc_attr( $settings['param_name'] ); ?>"
					class="layout_image_field wpb_vc_param_value wpb-textinput <?php echo esc_attr( $settings['param_name'] ).' '.esc_attr( $settings['type'] ).'_field'; ?>"
					value="<?php echo esc_attr( $value ); ?>" <?php echo trim( $dependency ); ?>>
		<?php
		return ob_get_clean();
	}
	 

 
	$layout_image = array(
		__('Grid', TEXTDOMAIN)             => 'grid-1',
		__('List', TEXTDOMAIN)             => 'list-1',
		__('List not image', TEXTDOMAIN)   => 'list-2',
	);


	vc_map( array(
		'name' => __( 'WPO Grid Posts', TEXTDOMAIN ),
		'base' => 'wpo_gridposts',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal Widgets', TEXTDOMAIN),
		'description' => __( 'Post having news,managzine style', TEXTDOMAIN ),
	 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', TEXTDOMAIN )   => 'separator_align_left',
				__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
				__( 'Align right', TEXTDOMAIN )  => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Layout Type", 'js_composer'),
				"param_name" => "layout",
				"layout_images" => $layout_image,
				"value" => $layout_image,
				"admin_label" => true,
				"description" => __("Select Skin layout.", 'js_composer')
			),
			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'js_composer'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );


	/**********************************************************************************
	 * Front Page Posts
	 **********************************************************************************/

	$layout = array(
		__('List', TEXTDOMAIN) 	=> 'frontpage-1',
		__('Inline', TEXTDOMAIN) 	=> 'frontpage-2',
		__('Slide thumbnail', TEXTDOMAIN) 	=> 'frontpage-3',
	);


	vc_map( array(
		'name' => __( 'WPO FrontPage Posts', TEXTDOMAIN ),
		'base' => 'wpo_frontpageposts',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal Widgets', TEXTDOMAIN),
		'description' => __( 'Create Post having blog styles', TEXTDOMAIN ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', TEXTDOMAIN )   => 'separator_align_left',
				__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
				__( 'Align right', TEXTDOMAIN )  => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),

			array(
				"type" => "dropdown",
				"heading" => __("Layout", TEXTDOMAIN ),
				"param_name" => "layout",
				"value" => $layout,
				"std" => 'frontpage-1'
			),

			array(
				"type" => "dropdown",
				"heading" => __("Number Main Posts", 'js_composer'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
	/**********************************************************************************
	 * Mega Blogs
	 **********************************************************************************/
	vc_map( array(
		'name' => __( 'WPO Mega Blogs', TEXTDOMAIN ),
		'base' => 'wpo_megablogs',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal Widgets', TEXTDOMAIN),
		'description' => __( 'Create Post having blog styles', TEXTDOMAIN ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),

			array(
				'type' => 'textarea',
				'heading' => __( 'Description', TEXTDOMAIN ),
				'param_name' => 'descript',
				"value" => ''
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 10 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),

			array(
				"type" => "dropdown",
				"heading" => __("Layout", TEXTDOMAIN ),
				"param_name" => "layout",
				"value" => array( __('Default Style', TEXTDOMAIN ) => 'blog'  ,  __('Special Style 1', TEXTDOMAIN ) => 'style1' ,  __('Special Style 2', TEXTDOMAIN ) => 'style2' ),
				"std" => 3
			),

			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'js_composer'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),


			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );

	/* Heading Text Block
	---------------------------------------------------------- */
	vc_map( array(
		'name'        => __( 'WPO Title Heading',TEXTDOMAIN),
		'base'        => 'wpo_title_heading',
		"class"       => "",
		"category"    => __('Opal Widgets', TEXTDOMAIN),
		'description' => __( 'Create title for one block', TEXTDOMAIN ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', TEXTDOMAIN ),
				'param_name' => 'title',
				'value'       => __( 'Title', TEXTDOMAIN ),
				'description' => __( 'Enter heading title.', TEXTDOMAIN ),
				"admin_label" => true
			),
			array(
			    'type' => 'colorpicker',
			    'heading' => __( 'Title Color', TEXTDOMAIN ),
			    'param_name' => 'font_color',
			    'description' => __( 'Select font color', TEXTDOMAIN )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				),
				'description' => __( 'Select title font size.', TEXTDOMAIN )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Align', TEXTDOMAIN ),
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align right', TEXTDOMAIN ) => "separator_align_right"
				),
				'description' => __( 'Select title align.', TEXTDOMAIN )
			),
			array(
				"type" => "textarea",
				'heading' => __( 'Description', TEXTDOMAIN ),
				"param_name" => "descript",
				"value" => '',
				'description' => __( 'Enter description for title.', TEXTDOMAIN )
		    ),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', TEXTDOMAIN ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', TEXTDOMAIN )
			)
		),
	));
	add_shortcode( 'wpo_title_heading', ('wpo_vc_shortcode_render') );


	/*********************************************************************************************************************
	*  Reassuarence
	*********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Reassuarence",TEXTDOMAIN),
	    "base" => "wpo_reassuarence",
	    "class" => "",
	    "description"=> __('Counting number with your term', TEXTDOMAIN),
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),


		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", TEXTDOMAIN),
				"param_name" => "icon",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', TEXTDOMAIN )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank"> '
								. __( 'here to see the list', TEXTDOMAIN ) . '</a>'
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon Color", TEXTDOMAIN),
				"param_name" => "color",
				"value" => 'black'
			),


			array(
				"type" => "attach_image",
				"description" => __("If you upload an image, icon will not show.", TEXTDOMAIN),
				"param_name" => "image",
				"value" => '',
				'heading'	=> __('Image', TEXTDOMAIN )
			),

		 	array(
				"type" => "textarea",
				"heading" => __("Short Information", TEXTDOMAIN),
				"param_name" => "description",
				"value" => '',
				'description'	=> __('Allow  put html tags', TEXTDOMAIN)
			),


		 	array(
				"type" => "textarea_html",
				"heading" => __("Detail Information", TEXTDOMAIN),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', TEXTDOMAIN)
			),


			array(
				"type" => "dropdown",
				"heading" => __("Style", TEXTDOMAIN),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', TEXTDOMAIN), 'vertical' => __('vertical', TEXTDOMAIN) , 'horizontal' => __('horizontal', TEXTDOMAIN) ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
			)
	   	)
	));
	add_shortcode( 'wpo_reassuarence', ('wpo_vc_shortcode_render') );
	


	/*********************************************************************************************************************
	 *  Facebook Like Box
	 *********************************************************************************************************************/
	vc_map( array(
		'name'        => __( 'WPO Facebook Like Box',TEXTDOMAIN),
		'base'        => 'wpo_facebook_like_box',
		"class"       => "",
		"category"    => __('Opal Widgets', TEXTDOMAIN),
		'description' => __( 'Create title for one block', TEXTDOMAIN ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget', TEXTDOMAIN ),
				'param_name' => 'title',
				'value'       => __( 'Find us on Facebook', TEXTDOMAIN ),
				'description' => __( 'Enter heading title.', TEXTDOMAIN ),
				"admin_label" => true
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),
			array(
				"type" => "textfield",
				"heading" => __("Facebook Page URL", TEXTDOMAIN),
				"param_name" => "page_url",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => __("Width", TEXTDOMAIN),
				"param_name" => "width",
				"value" => 268
			),		
			array(
				'type' => 'dropdown',
				'heading' => __( 'Color Scheme', TEXTDOMAIN ),
				'param_name' => 'color_scheme',
				'value' => array(
					__( 'Light', TEXTDOMAIN ) => 'light',
					__( 'Dark', TEXTDOMAIN ) => 'dark'
				),
				'description' => __( 'Select Color Scheme.', TEXTDOMAIN )
			),
			array(
                "type" => "checkbox",
                "heading" => $this->l("Show faces"),
                "param_name" => "show_faces",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => $this->l("Show stream"),
                "param_name" => "show_stream",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => $this->l("Show facebook header"),
                "param_name" => "show_header",
                "value" => array(
                    'Yes, please' => true
                )
			),	
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", TEXTDOMAIN),
				"param_name" => "el_class",
				"value" => ''
			),									
		),
	));
	
	add_shortcode( 'wpo_facebook_like_box', ('wpo_vc_shortcode_render') );	

	/*********************************************************************************************************************
	 *  Gallery grid
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Gallery Grid",TEXTDOMAIN),
	    "base" => "wpo_gallery_grid",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Display Gallery Grid',
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),
	    	array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),
			array(
				"type" => "textfield",
				'heading' => __( 'Number gallery', TEXTDOMAIN ),
				"param_name" => "number",
				"value" => '6'
		    ),
		    array(
				"type" => "dropdown",
				'heading' => __( 'Columns', TEXTDOMAIN ),
				"param_name" => "column",
				"value" => array('2'=>'2', '3'=>'3', '4'=>'4')
		    ),
		    array(
				"type" => "dropdown",
				'heading' => __( 'Remove Padding', TEXTDOMAIN ),
				"param_name" => "padding",
				"value" => array(__('No', TEXTDOMAIN) => '', __('Yes', TEXTDOMAIN) => '1')
		    ),
		    array(
				"type" => "textfield",
				'heading' => __( 'Extra class name', TEXTDOMAIN ),
				"param_name" => "class",
				"value" => ''
		    )
	   	)
	));
	add_shortcode( 'wpo_gallery_grid', ('wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  Gallery portfolio
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Gallery Filter",TEXTDOMAIN),
	    "base" => "wpo_gallery_filter",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Display Gallery Filter',
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true
			),
	    	array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Number gallery', TEXTDOMAIN ),
				'param_name' => 'number',
				'value' => '9'
		    ),
		    array(
				"type" => "dropdown",
				'heading' => __( 'Columns', TEXTDOMAIN ),
				'param_name' => 'column',
				"value" => array('2' => '2', '3' => '3', '4' => '4'),
		    ),
		    array(
		    	'type' => 'dropdown',
		    	'heading' => __('Show Pagination', TEXTDOMAIN),
		    	'param_name' => 'pagination',
		    	'value' => array(__('Yes', TEXTDOMAIN) => '1', __('No', TEXTDOMAIN) => '0' )
		    )
	   	)
	));
	add_shortcode( 'wpo_gallery_filter', ('wpo_vc_shortcode_render') );

	
	/*********************************************************************************************************************
	 *  Social counter
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Social Counter",TEXTDOMAIN),
	    "base" => "wpo_social_counter",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Display Social Counter',
	    "class" => "",
	    "category" => __('Opal Widgets', TEXTDOMAIN),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", TEXTDOMAIN),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true,
				"std" => 'Social Counter'
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', TEXTDOMAIN ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', TEXTDOMAIN ) => 'font-size-lg',
					__( 'Medium', TEXTDOMAIN ) => 'font-size-md',
					__( 'Small', TEXTDOMAIN ) => 'font-size-sm',
					__( 'Extra small', TEXTDOMAIN ) => 'font-size-xs'
				)
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title Alignment', TEXTDOMAIN ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Align left', TEXTDOMAIN ) => 'separator_align_left',
					__( 'Align center', TEXTDOMAIN ) => 'separator_align_center',
					__( 'Align right', TEXTDOMAIN ) => 'separator_align_right'
				)
			),
		    array(
                "type" => "checkbox",
                "heading" => $this->l("Display Twitter counter"),
                "param_name" => "twitter_show",
                "value" => array(
                    'Yes, please' => true
                ),
                'std' => true
			),	
		     array(
		    	"type" => "textfield",
		    	"heading" => __('Twitter Username', TEXTDOMAIN),
		    	"param_name" => 'twitter_user',
		    	"value" => '',
		    	'std' => 'opalwordpress',
		    	'description'	=> __('Insert the Twitter username. Example: https://twitter.com/opalwordpress', TEXTDOMAIN)
		    ),
		    array(
		    	"type" => "checkbox",
		    	"heading" => __('Display Facebook counter', TEXTDOMAIN),
		    	"param_name" => 'show_facebook',
		    	"value" => array(
                    'Yes, please' => true
                ),
                'std' => true
		    ), 
		    array(
		    	"type" => "textfield",
		    	"heading" => __('Facebook Page Url', TEXTDOMAIN),
		    	"param_name" => 'facebook_id',
		    	"value" => '',
		    	'std' => 'opalwordpress',
		    	'description' => __('Facebook page url. Example: https://www.facebook.com/opalwordpress', TEXTDOMAIN)
		    ),
		    array(
		    	"type" => "checkbox",
		    	"heading" => __('Display YouTube counter', TEXTDOMAIN),
		    	"param_name" => 'show_youtube',
		    	"value" => array(
                    'Yes, please' => true
                ),
                'std' => true
		    ),
		    array(
		    	"type" => "textfield",
		    	"heading" => __('YouTube username', TEXTDOMAIN),
		    	"param_name" => 'youtube_usename',
		    	"value" => '',
		    	'std' => 'WPOpalTheme',
		    	'description' => __('Insert the YouTube username. Example: https://www.youtube.com/user/WPOpalTheme', TEXTDOMAIN)
		    ),
		    array(
		    	"type" => "checkbox",
		    	"heading" => __('Display Google+ counter', TEXTDOMAIN),
		    	"param_name" => 'show_google',
		    	"value" => array(
                    'Yes, please' => true
                ),
                'std' => true
		    ),
		    array(
		    	"type" => "textfield",
		    	"heading" => __('Google+ ID', TEXTDOMAIN),
		    	"param_name" => 'google_id',
		    	"value" => '',
		    	'std' => '118034858850902691620',
		    	'description' => __('Google+ page or profile ID. Example:
					https://plus.google.com/118034858850902691620', TEXTDOMAIN)
		    ),
		     array(
		    	"type" => "textfield",
		    	"heading" => __('Google API Key', TEXTDOMAIN),
		    	"param_name" => 'google_key',
		    	"value" => '',
		    	'std' => 'AIzaSyBON-9t7IclDRgQZfW0Umnkj6dLnkELTFM',
		    	'description' => __('Get your API key creating a project/app in https://console.developers.google.com/project, 
		    					then inside your project go to "APIs & auth > APIs" and turn on the "Google+ API", 
		    					finally go to "APIs & auth > APIs > Credentials > Public API access" and click in the "CREATE A NEW KEY" button, 
		    					select the "Browser key" option and click in the "CREATE" button, now just copy your API key and paste here.', TEXTDOMAIN)
		    ),
		    array(
				"type" => "textfield",
				'heading' => __( 'Extra class name', TEXTDOMAIN ),
				"param_name" => "class",
				"value" => ''
		    )		    
	   	)
	));
	add_shortcode( 'wpo_social_counter', ('wpo_vc_shortcode_render') );
