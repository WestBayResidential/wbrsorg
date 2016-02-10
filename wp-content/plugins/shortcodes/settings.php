<?php
require( '../../../wp-load.php' );

$shortcode = array(

    //BUTTON
    'button' => array(
        'params' => array(
            'url' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Button URL', 'tkingdom'),
                'desc' => __('Add the button\'s url eg http://example.com', 'tkingdom'),
                'options' => array(
                    'width' => '98px'
                )
            ),
            'new_tab' => array(
                'type' => 'select',
                'label' => __('Where to open link', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'options' => array(
                    '' => __('Open In Same Window', 'tkingdom'),
                    '_blank' => __('Open In New Tab', 'tkingdom')
                )
            ),
            'button_style' => array(
                'type' => 'select',
                'label' => __('Button\'s Style', 'tkingdom'),
                'desc' => __('Select the button\'s style, ie the buttons colour', 'tkingdom'),
                'options' => array(
                    'default' => 'Grey',
                    'btn-warning' => 'Yellow',
                    'btn-inverse' => 'Black',
                    'btn-primary' => 'Dark Blue',
                    'btn-info' => 'Light Blue',
                    'btn-danger' => 'Red',
                    'btn-success' => 'Green'
                )
            ),
            'button_size' => array(
                'std' => 'last',
                'type' => 'select',
                'label' => __('Button Size', 'tkingdom'),
                'desc' => __('Chose the size of buttons', 'tkingdom'),
                'options' => array(
                    '' => 'Default',
                    'btn-large' => 'Large',
                    'btn-small' => 'Small',
                    'btn-mini' => 'Mini',
                )
            ),
            'content' => array(
                'std' => 'Button Text',
                'type' => 'text',
                'label' => __('Button\'s Text', 'tkingdom'),
                'desc' => __('Add the button\'s text', 'tkingdom'),
                'options' => array(
                    'width' => '98px'
                )
            )
        ),
        'shortcode' => '[button url="{{url}}" new_tab="{{new_tab}}" button_style="{{button_style}}" button_size="{{button_size}}"] {{content}} [/button]',
    ),

    //COLUMNS
    'columns' => array(
        'params' => array(
            'column' => array(
                'type' => 'select',
                'label' => __('Column Type', 'tkingdom'),
                'desc' => __('Select the type of the column.', 'tkingdom'),
                'options' => array(
                    'one_half' => 'One Half',
                    'one_third' => 'One Third',
                    'one_fourth' => 'One Fourth',
                    'one_sixth' => 'One Sixth',
                )
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Column Content', 'tkingdom'),
                'desc' => __('Add the column content.', 'tkingdom'),
                'options' => array(
                    'rows' => '10',
                    'width' => '100%'
                )
            ),
        ),
        'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
    ),
    
    //TOGGLE
    'toggle' => array(
        'params' => array(
            'title' => array(
                'type' => 'text',
                'label' => __('Toggle Title', 'tkingdom'),
                'desc' => '',
                'std' => 'Title',
                'options' => array(
                    'width' => '100%'
                )
            ),
            'content' => array(
                'std' => 'Content',
                'type' => 'textarea',
                'label' => __('Toggle Content', 'tkingdom'),
                'desc' => __('Add the toggle content.', 'tkingdom'),
                'options' => array(
                    'rows' => '10',
                    'width' => '100%'
                )
            ),
            'bgcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Background Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'textcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Text Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'bordercolor' => array(
                'type' => 'colorpicker',
                'label' => __('Border Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'opacity' => array(
                'type' => 'text',
                'label' => __('Toggle Opacity', 'tkingdom'),
                'desc' => __('% (0 - 100)', 'tkingdom'),
                'std' => __('', 'tkingdom'),
                'options' => array(
                    'width' => '20%'
                )
            ),
        ),
        'shortcode' => '[toggle title="{{title}}" bgcolor="{{bgcolor}}" textcolor="{{textcolor}}" bordercolor="{{bordercolor}}" opacity="{{opacity}}"] {{content}} [/toggle]',
        'popup_title' => __('Insert Toggle Content Shortcode', 'tkingdom')
    ),

    //TABBED SHORTCODE
    'tabbed' => array(
        'params' => array(
            'tabs_bgcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Background Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'tabs_textcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Text Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'tabs_bordercolor' => array(
                'type' => 'colorpicker',
                'label' => __('Border Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'tabs_opacity' => array(
                'type' => 'text',
                'label' => __('Toggle Opacity', 'tkingdom'),
                'desc' => __('% (0 - 100)', 'tkingdom'),
                'std' => __('', 'tkingdom'),
                'options' => array(
                    'width' => '20%'
                )
            ),
            'repeatable' => array(
                'type' => 'repeatable',
                'params' => array(
                    'title' => array(
                        'type' => 'text',
                        'label' => __('Tabbed Title', 'tkingdom'),
                        'desc' => '',
                        'std' => 'Title',
                        'options' => array(
                            'width' => '100%'
                        )
                    ),
                    'content' => array(
                        'std' => 'Content',
                        'type' => 'textarea',
                        'label' => __('Tabbed Content', 'tkingdom'),
                        'desc' => __('Add the tabbed content.', 'tkingdom'),
                        'options' => array(
                            'rows' => '10',
                            'width' => '100%'
                        )
                    ),
                ),
                'shortcode' => '[tab title="{{title}}"] {{content}} [/tab]',
            ),
        ),
        'shortcode' => '[tabs tabs="{{tabs}}" tabs_bgcolor="{{tabs_bgcolor}}" tabs_textcolor="{{tabs_textcolor}}" tabs_bordercolor="{{tabs_bordercolor}}" tabs_opacity="{{tabs_opacity}}"] {{child_shortcode}} [/tabs]',
        'popup_title' => __('Insert Tabbed Content Shortcode', 'tkingdom'),
    ),

    //ACCORDION SHORTCODE
    'accordion' => array(
        'params' => array(
            'title' => array(),
            'tabs_bgcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Background Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'tabs_textcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Text Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'tabs_bordercolor' => array(
                'type' => 'colorpicker',
                'label' => __('Border Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'tabs_opacity' => array(
                'type' => 'text',
                'label' => __('Toggle Opacity', 'tkingdom'),
                'desc' => __('% (0 - 100)', 'tkingdom'),
                'std' => __('', 'tkingdom'),
                'options' => array(
                    'width' => '20%'
                )
            ),
            'repeatable' => array(
                'type' => 'repeatable',
                'params' => array(
                    'title' => array(
                        'type' => 'text',
                        'label' => __('Accordion Title', 'tkingdom'),
                        'desc' => '',
                        'std' => 'Title',
                        'options' => array(
                            'width' => '100%'
                        )
                    ),
                    'content' => array(
                        'std' => 'Content',
                        'type' => 'textarea',
                        'label' => __('Accordion Content', 'tkingdom'),
                        'desc' => __('Add the content.', 'tkingdom'),
                        'options' => array(
                            'rows' => '10',
                            'width' => '100%'
                        )
                    ),
                ),
                'shortcode' => '[accordion title="{{title}}"] {{content}} [/accordion]',
            )
        ),
        'shortcode' => '[accordions tabs_bgcolor="{{tabs_bgcolor}}" tabs_textcolor="{{tabs_textcolor}}" tabs_bordercolor="{{tabs_bordercolor}}" tabs_opacity="{{tabs_opacity}}"] {{child_shortcode}} [/accordions]',
        'popup_title' => __('Insert Tabbed Content Shortcode', 'tkingdom'),
    ),

    // DROPCAP
    'dropcap' => array(
        'params' => array(
            'style' => array(
                'type' => 'select',
                'label' => __('Type of dropcap', 'tkingdom'),
                'desc' => __('Select the dropcap type', 'tkingdom'),
                'options' => array(
                    'background' => 'With Background',
                    'no-background' => 'Without Background'
                )
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('', 'tkingdom'),
                'desc' => __('Insert starting letter to use as dropcap.', 'tkingdom'),
                'options' => array(
                    'rows' => '1',
                    'width' => '10%'
                )
            )
        ),
        'shortcode' => '[dropcap style="{{style}}"] {{content}} [/dropcap]',
    ),

    // PROGRESS BAR
    'progressbar' => array(
        'params' => array(
            /*
            'style' => array(
                'type' => 'select',
                'label' => __('Type of progress bar', 'tkingdom'),
                'desc' => __('Select the progress bar type', 'tkingdom'),
                'options' => array(
                    'background' => 'With Background',
                    'no-background' => 'Without Background'
                )
            ),
            */
            'bar_percentage' => array(
                'type' => 'text',
                'label' => __('Progress Bar Percentage', 'tkingdom'),
                'desc' => __('% (0 - 100)', 'tkingdom'),
                'std' => __('', 'tkingdom'),
                'options' => array(
                    'width' => '20%'
                )
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('', 'tkingdom'),
                'desc' => __('Insert text to explain progress bar.', 'tkingdom'),
                'options' => array(
                    'rows' => '10',
                    'width' => '100%'
                )
            )
        ),
        'shortcode' => '[progressbar bar_percentage="{{bar_percentage}}"] {{content}} [/progressbar]',
    ),

    // INFO BOX
    'infobox' => array(
        'params' => array(
            /*
            'bgcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Background Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            'textcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Text Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
                'value' => '',
            ),
            */
            'style' => array(
                'type' => 'select',
                'label' => __('Message Box Style', 'tkingdom'),
                'desc' => __('Select the type of the message box.', 'tkingdom'),
                'options' => array(             
                    'alert-error' => 'Error Message',
                    'alert-success' => 'Success Message',
                    'alert-block' => 'Warning Message',
                    'alert-info' => 'Information Message',
                )
            ),
            'content' => array(
                'std' => 'Insert yor text',
                'type' => 'textarea',
                'label' => __('Insert yor text', 'tkingdom'),
                'desc' => __('Insert starting letter to use as dropcap.', 'tkingdom'),
                'value' => '',
                'options' => array(
                    'rows' => '10',
                    'width' => '100%'
                )
            )
        ),
        'shortcode' => '[infobox bgcolor="{{bgcolor}}" textcolor="{{textcolor}} style="{{style}}"] {{content}} [/infobox]',
    ),

    //PRICETABLE SHORTCODE
    'pricing' => array(
        'params' => array(
            'column' => array(
                'type' => 'select',
                'label' => __('Column Type', 'tkingdom'),
                'desc' => __('Select the type of the column.', 'tkingdom'),
                'options' => array(
                    'full-width' => 'Full Width',
                    'half-width' => 'One Half',
                    'third-width' => 'One Third',
                    'pricing-table-quarter' => 'One Fourth',
                )
            ),
            'position' => array(
                'std' => 'last',
                'type' => 'select',
                'label' => __('Last Column', 'tkingdom'),
                'desc' => __('Pick if column is last.', 'tkingdom'),
                'options' => array(
                    '' => 'Regular Column',
                    'last' => 'Last Column',
                )
            ),
            'title' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Table Title', 'tkingdom'),
                'desc' => __('Price table title.', 'tkingdom'),
                'options' => array(
                    'width' => '100%'
                )
            ),
            'subtitle' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Table Subtitle', 'tkingdom'),
                'desc' => __('Price table subtitle.', 'tkingdom'),
                'options' => array(
                    'width' => '100%'
                )
            ),
            'bgcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Background Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
            ),
            'textcolor' => array(
                'type' => 'colorpicker',
                'label' => __('Text Color', 'tkingdom'),
                'desc' => __('', 'tkingdom'),
            ),
            'usebutton' => array(
                'type' => 'select',
                'label' => __('Use Button', 'tkingdom'),
                'desc' => __('Chose if you want to use Button inside Price Table', 'tkingdom'),
                'options' => array(
                    'yes' => 'Use Button',
                    'no' => 'Don\'t use Button',
                )
            ),
            'url' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Button URL', 'tkingdom'),
                'desc' => __('Add the button\'s url eg http://example.com', 'tkingdom'),
                'options' => array(
                    'width' => '98px'
                )
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Button\'s Style', 'tkingdom'),
                'desc' => __('Select the button\'s style, ie the buttons colour', 'tkingdom'),
                'options' => array(
                    'yellow' => 'Yellow',
                    'black' => 'Black',
                    'blue' => 'Blue',
                    'red' => 'Red',
                    'green' => 'Green',
                    'grey' => 'Grey',
                    'brown' => 'Brown'
                )
            ),
            'buttontext' => array(
                'std' => 'Button Text',
                'type' => 'text',
                'label' => __('Button\'s Text', 'tkingdom'),
                'desc' => __('Add the button\'s text', 'tkingdom'),
                 'options' => array(
                    'width' => '98px'
                )
            ),
            'repeatable' => array(
                'type' => 'repeatable',
                'params' => array(
                    'title' => array(
                        'type' => 'text',
                        'label' => __('Price Row Text', 'tkingdom'),
                        'desc' => '',
                        'std' => '',
                        'options' => array(
                            'width' => '100%'
                        )
                    ),
                    'content' => array(
                        'std' => '',
                        'type' => 'text',
                        'label' => __('Price Row Price', 'tkingdom'),
                        'desc' => __('Add the price to the element.', 'tkingdom'),
                        'options' => array(
                            'rows' => '10',
                            'width' => '100%'
                        )
                    ),
                ),
                'shortcode' => '[price title="{{title}}"] {{content}} [/price]',
            )
        ),
        'shortcode' => '[pricing column="{{column}}" position="{{position}}" title="{{title}}" subtitle="{{subtitle}}" url="{{url}}" style="{{style}}" usebutton="{{usebutton}}" buttontext="{{buttontext}}" bgcolor="{{bgcolor}}" textcolor="{{textcolor}}"] {{child_shortcode}} [/pricing]',
        'popup_title' => __('Insert Tabbed Content Shortcode', 'tkingdom'),

    ),

);

function create_shortcode($popup) {
    global $shortcode;

    if (isset($shortcode) && is_array($shortcode)) {
        $shortcode_param = $shortcode[$popup]['params'];
        $shortcode_code = $shortcode[$popup]['shortcode'];
        if(isset($shortcode[$popup]['params']['repeatable'])){
            $shortcode_repeatable = $shortcode[$popup]['params']['repeatable'];
        }


        $shortcode_output = print_shortcode("\n" . '<div id="old-shortcode" class="hidden">' . $shortcode_code . '</div>');
        $shortcode_output = print_shortcode("\n" . '<div id="shortcode-popup" class="hidden">' . $popup . '</div>');


        foreach ($shortcode_param as $key => $param) {
            $key = 'shortcode_' . $key;

            if(empty($param['label'])){$param['label'] = '';}
            if(empty($param['desc'])){$param['desc'] = '';}
            if(empty($param['type'])){$param['type'] = '';}

            $row_start = '<tbody style="display:inline-block;width:100%;">' . "\n";
            $row_start .= '<tr style="height:40px;">' . "\n";
            $row_start .= '<th class="label" style="vertical-align:top;width: 98px;padding-top:10px"><span class="alignleft">' . $param['label'] . '</span></th>' . "\n";
            $row_start .= '<td class="field">' . "\n";

            $row_end = '<span>' . $param['desc'] . '</span>' . "\n";
            $row_end .= '</td>' . "\n";
            $row_end .= '</tr>' . "\n";
            $row_end .= '</tbody>' . "\n";

            switch ($param['type']) {
                case 'text' :

                    if(!isset($param['options']['width'])){$param['options']['width'] = '98px';}

                    $output = $row_start;
                    $output .= '<input type="text" class="popup-input" style="width:'.$param['options']['width'].'" name="' . $key . '" id="' . $key . '" value="' . $param['std'] . '" />' . "\n";
                    $output .= $row_end;

                    print_shortcode($output);

                    break;

                case 'textarea' :
               
                    if(!isset($param['options']['rows'])){$param['options']['rows'] = '10';}
                    if(!isset($param['options']['width'])){$param['options']['width'] = '100%';}
                    
                    $output = $row_start;
                    $output .= '<textarea rows="'.$param['options']['rows'].'" style="width:'.$param['options']['width'].'" name="' . $key . '" id="' . $key . '" class="popup-input">' . $param['std'] . '</textarea>' . "\n";
                    $output .= $row_end;

                    print_shortcode($output);

                    break;

                case 'select' :

                    $output = $row_start;
                    $output .= '<select name="' . $key . '" id="' . $key . '" class="popup-input">' . "\n";

                    foreach ($param['options'] as $value => $option) {
                        $output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
                    }

                    $output .= '</select>' . "\n";
                    $output .= $row_end;

                    print_shortcode($output);

                    break;

                case 'colorpicker' :

                    $output = $row_start;
                    $output .= '<input id="' . $key . '" name="' . $key . '" type="text"  class="colorpicker popup-input" />' . "\n";

                    ?>
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            jQuery( '#<?php echo $key;?>' ).wpColorPicker();
                        })
                    </script>
                    <?php
                    $output .= $row_end;

                    print_shortcode($output);

                    break;

                case 'repeatable' :

                    // set child shortcode
                    $repeatable_param = $shortcode_repeatable['params'];
                    $repeatable_shortcode = $shortcode_repeatable['shortcode'];

                    // popup parent form row start
                    $prow_start  = '<tbody>' . "\n";
                    $prow_start .= '<tr class="form-row has-child">' . "\n";
                    $prow_start .= '<td style="width:100%">' . "\n";
                    $prow_start .= '<div class="child-clone-rows">' . "\n";

                    // for js use
                    $prow_start .= '<div id="_tz_cshortcode" class="hidden">' . $repeatable_shortcode . '</div>' . "\n";

                    // start the default row
                    $prow_start .= '<div class="child-clone-row">' . "\n";
                    $prow_start .= '<ul class="child-clone-row-form">' . "\n";

                    // add $prow_start to output
                    print_shortcode($prow_start);

                    foreach( $repeatable_param as $one_row => $repeatable_key )
                    {

                        // popup form row start
                        $crow_start  = '<li class="child-clone-row-form-row">' . "\n";
                        $crow_start .= '<div class="child-clone-row-label">' . "\n";
                        $crow_start .= '<label>' . $repeatable_key['label'] . '</label>' . "\n";
                        $crow_start .= '</div>' . "\n";
                        $crow_start .= '<div class="child-clone-row-field">' . "\n";

                        // popup form row end
                        $crow_end	  = '<span class="child-clone-row-desc">' . $repeatable_key['desc'] . '</span>' . "\n";
                        $crow_end   .= '</div>' . "\n";
                        $crow_end   .= '</li>' . "\n";

                        switch( $repeatable_key['type'] )
                        {
                            case 'text' :

                                if(!isset($repeatable_key['options']['width'])){$repeatable_key['options']['width'] = '98px';}

                                $output = $crow_start;
                                $output .= '<input type="text" class="repeated-popup-input tz-cinput" style="width:'.$repeatable_key['options']['width'].'" name="' . $one_row . '" id="' . $one_row . '" value="' . $repeatable_key['std'] . '" />' . "\n";
                                $output .= $crow_end;

                                print_shortcode($output);

                                break;

                            case 'textarea' :

                                if(!isset($repeatable_key['options']['rows'])){$repeatable_key['options']['rows'] = '10';}
                                if(!isset($repeatable_key['options']['width'])){$repeatable_key['options']['width'] = '100%';}

                                $output = $crow_start;
                                $output .= '<textarea rows="'.$repeatable_key['options']['rows'].'" style="width:'.$repeatable_key['options']['width'].'" name="' . $one_row . '" id="' . $one_row . '" class="tz-cinput repeated-popup-input">' . $repeatable_key['std'] . '</textarea>' . "\n";
                                $output .= $crow_end;

                                print_shortcode($output);

                                break;

                            case 'select' :

                                $output = $crow_start;
                                $output .= '<select name="' . $one_row . '" id="' . $one_row . '" class="repeated-popup-input tz-cinput">' . "\n";

                                foreach ($repeatable_key['options'] as $value => $option) {
                                    $output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
                                }

                                $output .= '</select>' . "\n";
                                $output .= $crow_end;

                                print_shortcode($output);

                                break;
                        }
                    }

                    // popup parent form row end
                    $prow_end    = '</ul>' . "\n";		// end .child-clone-row-form
                    $prow_end   .= '<a href="#" class="child-clone-row-remove">Remove</a>' . "\n";
                    $prow_end   .= '</div>' . "\n";		// end .child-clone-row


                    $prow_end   .= '</div>' . "\n";		// end .child-clone-rows
                    $prow_end   .= '</td>' . "\n";
                    $prow_end   .= '</tr>' . "\n";
                    $prow_end   .= '</tbody>' . "\n";

                    // add $prow_end to output
                    print_shortcode($prow_end);

                break;
            }

        } // end foreach param
    }
}

function print_shortcode($output) {
    global $shortcode_output;
    $shortcode_output = $shortcode_output . "\n" . $output;
}

?>
