<?php
add_action('widgets_init', 'wpo_contact_info_load_widgets');

function wpo_contact_info_load_widgets() {
	register_widget('WPO_Contact_Info_Widget');
}

class WPO_Contact_Info_Widget extends WPO_Widget {
    
    private $params;

	function WPO_Contact_Info_Widget() {
        
        $this->params = array(
            'title' => __('Title', 'wpo'), 
            'description' => __('Description', 'wpo'), 
            'company' => __('Company', 'wpo'), 
            'country' => __('Country', 'wpo'), 
            'locality' => __('Locality', 'wpo'),
            'region' => __('Region', 'wpo'),
            'street' => __('Street', 'wpo'),
            'working-days' => __('Working Days', 'wpo'),
            'working-hours' => __('Working Hours', 'wpo'),
            'phone' => __('Phone', 'wpo'),
            'mobile' => __('Mobile', 'wpo'),
            'fax' => __('Fax', 'wpo'),
            'skype' => __('Skype', 'wpo'),
            'email-address' => __('Email Address', 'wpo'),
            'email' => __('Email', 'wpo'),
            'website-url' => __('Website URL', 'wpo'),
            'website' => __('Website', 'wpo')
        );
                    
        $widget_ops = array('classname' => 'contact-info', 'description' => __('Add contact information.', 'wpo'));

        $control_ops = array('id_base' => 'contact-info-widget');

        $this->WP_Widget('contact-info-widget', __('WPO: Contact Info', 'wpo'), $widget_ops, $control_ops);
    }


	function widget($args, $instance) {
		extract($args);		
        $title  = apply_filters('widget_title', esc_attr($instance['title']));

		echo $before_widget;

		if ($title) {
			echo $before_title . esc_html( $title ) . $after_title;
		}
		?>
		<ul class="contact-info list-unstyled">
        <?php
        foreach ($this->params as $key => $value) :
            if ($instance[$key]) : 
                switch ($key) { 
                    case 'working-days':
                    case 'working-hours':
                    case 'phone':
						if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
							<li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ); ?>: <?php echo esc_html( $instance[$key] ); ?></li>
					<?php else: ?>
						<li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
						<?php endif;
					break;
                    case 'mobile':
						if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
								<li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
						<?php else: ?>
						<li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ); ?>: <?php echo esc_html( $instance[$key] ); ?></li>
						<?php endif;
						break;
                    case 'skype':
						if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
								<li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
						<?php else: ?>
						<li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
						<?php endif;
                        break;
                    case 'title':
                    case 'email-address':
                    case 'website-url':
                        break;
                    case 'email':
						if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
							<li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value )?>: <a href="mailto:<?php echo sanitize_email( $instance['email-address'] ); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } ?></a></li>
						<?php else: ?>
							<li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?>: <a href="mailto:<?php echo sanitize_email( $instance['email-address'] ); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } else { echo esc_html( $instance[$key] ); } ?></a></li>
						<?php endif;
                        break;
                    case 'website':
						if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
							<li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ) ?>: <a href="<?php echo esc_url($instance['website-url']); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } else { echo esc_html( $instance[$key] ); } ?></a></li>
						<?php else: ?>
							<li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?> <a href="<?php echo esc_url($instance['website-url']); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } else { echo esc_html( $instance[$key] ); } ?></a></li>
						<?php endif;
					break;
                    default: ?>
                        <li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $instance[$key] ); ?></li>
            <?php }
            endif;
        endforeach; ?>
		</ul>
		<?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
        
        
        foreach ($this->params as $key => $value){
            $instance[$key] = $new_instance[$key];
			$instance[$key.'_class'] = $new_instance[$key.'_class'];
		}
		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => __('Contact Info', 'wpo'));
		$instance = wp_parse_args((array) $instance, $defaults);
		$array_class = array('phone', 'mobile', 'fax', 'skype', 'email', 'website' );
        foreach ($this->params as $key => $value) :
        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id($key) ); ?>"><?php echo esc_html( $value ) ?>:</label>
				<?php if(in_array($key, $array_class)):?>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id($key) ); ?>" name="<?php echo esc_attr( $this->get_field_name($key) ); ?>" type="text" value="<?php if (isset($instance[$key])) echo esc_attr( $instance[$key] ); ?>" />
					<label for="<?php echo esc_attr( $this->get_field_id($key.'_class') ); ?>"><?php echo 'Icon class '.esc_html( $value ); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id($key.'_class') ); ?>" name="<?php echo esc_attr( $this->get_field_name($key.'_class') ); ?>" type="text" value="<?php if (isset($instance[$key.'_class'])) echo esc_attr( $instance[$key.'_class'] ); ?>" />
				<?php else: ?>
					<input class="widefat" id="<?php echo esc_attr( $this->get_field_id($key) ); ?>" name="<?php echo esc_attr( $this->get_field_name($key) ); ?>" type="text" value="<?php if (isset($instance[$key])) echo esc_attr( $instance[$key] ); ?>" />
				<?php endif; ?>
            </p>
        <?php endforeach; ?>
		<script type="application/javascript">
        jQuery('.checkbox').on('click',function(){
            jQuery('.'+this.id).toggle();
        });
    </script>
	<?php
	}
}
?>