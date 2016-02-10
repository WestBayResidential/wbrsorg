<?php
/*********************************************************************************************************************
 * Campaigns Frontend
 *********************************************************************************************************************/
vc_map( array(
    "name" => __("WPO Event Frontend",TEXTDOMAIN),
    "base" => "wpo_event_frontend",
    'icon' => 'icon-wpb-application-icon-large',
    'description'=>'Display Event Frontend',
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
				__('Featured Events', TEXTDOMAIN) => 'featured',
				__('Lastest Events', TEXTDOMAIN) => 'most_recent',
				__('Randown Events', TEXTDOMAIN) => 'random'
			)
	    ),
		 array(
		 	"type" => "dropdown",
			'heading' => __( 'Order by', TEXTDOMAIN ),
			"param_name" => "order",
			"value" => array(
				__('Date', TEXTDOMAIN) => 'date',
				__('Name', TEXTDOMAIN) => 'name',
			)
		),
		 array(
		 	"type" => "dropdown",
			'heading' => __( 'Order', TEXTDOMAIN ),
			"param_name" => "order",
			"value" => array(
				__('ESC', TEXTDOMAIN) => 'ESC',
				__('DESC', TEXTDOMAIN) => 'DESC'
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
	    array(
			"type" => "textfield",
			"heading" => __("Extra class name", TEXTDOMAIN),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
		)
   	)
));
add_shortcode( 'wpo_event_frontend', ('wpo_vc_shortcode_render') );


/*********************************************************************************************************************
 * Event List Accordion
 *********************************************************************************************************************/
vc_map( array(
    "name" => __("WPO Event Accordion",TEXTDOMAIN),
    "base" => "wpo_event_accordion",
    'icon' => 'icon-wpb-application-icon-large',
    'description'=>'Display Event Accordion',
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
				__('Featured Events', TEXTDOMAIN) => 'featured',
				__('Lastest Events', TEXTDOMAIN) => 'most_recent',
				__('Randown Events', TEXTDOMAIN) => 'random'
			)
	    ),
		 array(
		 	"type" => "dropdown",
			'heading' => __( 'Order by', TEXTDOMAIN ),
			"param_name" => "order",
			"value" => array(
				__('Date', TEXTDOMAIN) => 'date',
				__('Name', TEXTDOMAIN) => 'name',
			)
		),
		 array(
		 	"type" => "dropdown",
			'heading' => __( 'Order', TEXTDOMAIN ),
			"param_name" => "order",
			"value" => array(
				__('ESC', TEXTDOMAIN) => 'ESC',
				__('DESC', TEXTDOMAIN) => 'DESC'
			)
		),
		array(
			"type" => "textfield",
			'heading' => __( 'Number', TEXTDOMAIN ),
			"param_name" => "number",
			"value" => ''
	    ),
	    array(
			"type" => "textfield",
			"heading" => __("Extra class name", TEXTDOMAIN),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
		)
   	)
));
add_shortcode( 'wpo_event_accordion', ('wpo_vc_shortcode_render') );

/********************************************************************************************************************
 * Event Frontend
*********************************************************************************************************************/
require_once(ABSPATH . 'wp-admin/includes/screen.php');
$query = get_posts( array('post_type'=> 'tribe_events', 'orderby' => 'id', 'posts_per_page' => -1 ));
$posts = array();

foreach ( $query as $post ) {
	if($post->ID){
   		$posts[$post->post_title] = $post->ID;
   }
}
wp_reset_postdata();

vc_map( array(
    "name" => __("WPO Event Countdown",TEXTDOMAIN),
    "base" => "wpo_event_countdown",
    'icon' => 'icon-wpb-application-icon-large',
    'description'=>'Display Event Single',
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
			'heading' => __( 'Event Single', TEXTDOMAIN ),
			"param_name" => "event_id",
			"value" => $posts
	    ),
		
	    array(
			"type" => "dropdown",
			'heading' => __( 'Layout', TEXTDOMAIN ),
			"param_name" => "layout",
			"value" => array(
				'Layout 1' => 'layout-1',
				'Layout 2' => 'layout-2',
				'Layout 3' => 'layout-3'
			)
	    ),
	    array(
			"type" => "textfield",
			"heading" => __("Extra class name", TEXTDOMAIN),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", TEXTDOMAIN)
		)
   	)
));
add_shortcode( 'wpo_event_countdown', ('wpo_vc_shortcode_render') );

