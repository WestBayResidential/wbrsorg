<?php
$output = $title = $values = $units = $bgcolor = $custombgcolor = $options = $el_class = '';
extract( shortcode_atts( array(
	'title' => '',
	'values' => '',
	'units' => '',
	'bgcolor' => 'bar_grey',
	'custombgcolor' => '',
	'options' => '',
	'el_class' => ''
), $atts ) );
wp_enqueue_script( 'waypoints' );

$el_class = $this->getExtraClass( $el_class );

$bar_options = '';
$options = explode( ",", $options );
if ( in_array( "animated", $options ) ) $bar_options .= " animated";
if ( in_array( "striped", $options ) ) $bar_options .= " striped";

if ( $bgcolor == "custom" && $custombgcolor != '' ) {
	$custombgcolor = ' style="' . vc_get_css_color( 'background-color', $custombgcolor ) . '"';
	$bgcolor = "";
}
if ( $bgcolor != "" ) $bgcolor = " " . $bgcolor;

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_progress_bar wpo-progress-bar  wpb_content_element' . $el_class, $this->settings['base'], $atts );
$output = '<div class="' . esc_attr( $css_class ) . '">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_progress_bar_heading' ) );

$graph_lines = explode( ",", $values );
$max_value = 0.0;
$graph_lines_data = array();
foreach ( $graph_lines as $line ) {
	$new_line = array();
	$color_index = 2;
	$data = explode( "|", $line );
	$new_line['value'] = isset( $data[0] ) ? $data[0] : 0;
	$new_line['percentage_value'] = isset( $data[1] ) && preg_match( '/^\d{1,2}\%$/', $data[1] ) ? (float)str_replace( '%', '', $data[1] ) : false;
	if ( $new_line['percentage_value'] != false ) {
		$color_index += 1;
		$new_line['label'] = isset( $data[2] ) ? $data[2] : '';
	} else {
		$new_line['label'] = isset( $data[1] ) ? $data[1] : '';
	}
	$new_line['bgcolor'] = ( isset( $data[$color_index] ) ) ? ' style="background-color: ' . $data[$color_index] . ';"' : $custombgcolor;

	if ( $new_line['percentage_value'] === false && $max_value < (float)$new_line['value'] ) {
		$max_value = $new_line['value'];
	}

	$graph_lines_data[] = $new_line;
}

foreach ( $graph_lines_data as $line ) {
	$unit = ( $units != '' ) ? ' <span class="vc_label_units">' . $line['value'] . $units . '</span>' : '';
	$output .= '<div class="vc_single_bar progress' . $bgcolor . '">';
	$output .= '<div class="vc_label">' . $unit . '<h5 class="vc_label_title">' . $line['label'] . '</h5>' . '</div>';
	if ( $line['percentage_value'] !== false ) {
		$percentage_value = $line['percentage_value'];
	} elseif ( $max_value > 100.00 ) {
		$percentage_value = (float)$line['value'] > 0 && $max_value > 100.00 ? round( (float)$line['value'] / $max_value * 100, 4 ) : 0;
	} else {
		$percentage_value = $line['value'];
	}
	$output .= '<div class="vc_bar progress-bar' . esc_attr( $bar_options ) . '" data-percentage-value="' . ( $percentage_value ) . '" data-value="' . $line['value'] . '"' . $line['bgcolor'] . '></div>';
	$output .= '</div>';
}

$output .= '</div>';

echo ( $output ) . $this->endBlockComment( 'progress_bar' ) . "\n";