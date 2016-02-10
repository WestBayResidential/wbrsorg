<?php
/*********************************************************************************************************************
 * Campaigns Tab
 *********************************************************************************************************************/
vc_map( array(
    "name" => __("WPO Campaigns Tab",TEXTDOMAIN),
    "base" => "wpo_campaigns_tab",
    'icon' => 'icon-wpb-application-icon-large',
    'description'=>'Display Campaigns tab',
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
			'type' => 'dropdown',
			'heading' => __('Mode', TEXTDOMAIN),
			'param_name' => 'mode',
			'value' => array(
					__('Featured', TEXTDOMAIN) => 'featured',
					__('Most Recent', TEXTDOMAIN) => 'most_recent',
					__('Random', TEXTDOMAIN) => 'Random'
				)
		),
		array(
			"type" => "textfield",
			'heading' => __( 'Number', TEXTDOMAIN ),
			"param_name" => "number",
			"value" => ''
	    ),
   	)
));
add_shortcode( 'wpo_campaigns_tab', ('wpo_vc_shortcode_render') );


/*********************************************************************************************************************
 * Campaigns Featured
 *********************************************************************************************************************/
vc_map( array(
    "name" => __("WPO Campaigns Featured",TEXTDOMAIN),
    "base" => "wpo_campaigns_featured",
    'icon' => 'icon-wpb-application-icon-large',
    'description'=>'Display Campaigns Featured',
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
			'heading' => __( 'Number', TEXTDOMAIN ),
			"param_name" => "number",
			"value" => ''
	    ),
	    array(
	    	"type" => "dropdown",
			'heading' => __( 'Layout', TEXTDOMAIN ),
			"param_name" => "layout",
			"value" => array(
				__('Layout 1', TEXTDOMAIN) => 'item-1',
				__('Layout 2', TEXTDOMAIN) => 'item-2',
				__('Layout 3', TEXTDOMAIN) => 'item-3'
			)
	    )
   	)
));
add_shortcode( 'wpo_campaigns_featured', ('wpo_vc_shortcode_render') );

/*********************************************************************************************************************
 * Campaigns Frontend
 *********************************************************************************************************************/
vc_map( array(
    "name" => __("WPO Campaigns Frontend",TEXTDOMAIN),
    "base" => "wpo_campaigns_frontend",
    'icon' => 'icon-wpb-application-icon-large',
    'description'=>'Display Campaigns Frontend',
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
			"type" => "dropdown",
			'heading' => __( 'Mode', TEXTDOMAIN ),
			"param_name" => "mode",
			"value" => array(
				__('Featured Campaigns', TEXTDOMAIN) => 'featured',
				__('Lastest Campaigns', TEXTDOMAIN) => 'most_recent',
				__('Randown Campaigns', TEXTDOMAIN) => 'random'
			)
	    ),
		array(
			"type" => "dropdown",
			'heading' => __( 'Style', TEXTDOMAIN ),
			"param_name" => "style",
			"value" => array(
				__('Style 1', TEXTDOMAIN) => 'style-1',
				__('Style 2', TEXTDOMAIN) => 'style-2',
				__('Style 3', TEXTDOMAIN) => 'style-3',
			)
	    ),
		array(
			"type" => "textfield",
			'heading' => __( 'Number', TEXTDOMAIN ),
			"param_name" => "number",
			"value" => ''
	    ),
	    array(
			"type" => "dropdown",
			'heading' => __( 'Column', TEXTDOMAIN ),
			"param_name" => "column",
			"value" => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
	    ),
   	)
));
add_shortcode( 'wpo_campaigns_frontend', ('wpo_vc_shortcode_render') );
