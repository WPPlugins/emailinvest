<?php
class ei_w_form extends WP_Widget {
	function __construct() {
		parent::__construct(false, $name = __('Email Invest'),array( 'description' => __( 'Add your form from Email Invest' )) );
	}
function form($instance) {
	if( $instance) {
		 $form_id = esc_attr($instance['form_id']);
		 $width = esc_attr($instance['width']);
	} else {
		 $form_id = '';
		 $width = '';
	}
?>

<p>
  <label for="<?php echo $this->get_field_id('form_id'); ?>">
    <?php _e('Form ID', 'wp_widget_plugin'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('form_id'); ?>" name="<?php echo $this->get_field_name('form_id'); ?>" type="text" value="<?php echo $form_id; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('width'); ?>">
    <?php _e('Width:', 'wp_widget_plugin'); ?>
  </label>
  <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
</p>
<?php
}

function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['form_id'] = strip_tags($new_instance['form_id']);
      $instance['width'] = strip_tags($new_instance['width']);
     return $instance;
}

function widget($args, $instance) {
	$form_id = esc_attr($instance['form_id']);
    $width = esc_attr($instance['width']);
	$f_d=explode("-", $form_id);
?>
<aside class="widget"> 
  <script src="https://<?php echo $f_d[0];?>.emailinvest.com/get_code/js/<?php echo $f_d[1];?>/<?php echo $width;?>"></script> 
</aside>
<?php
	}

}
function register_ei_w_form()
{
    register_widget( 'ei_w_form' );
}
?>