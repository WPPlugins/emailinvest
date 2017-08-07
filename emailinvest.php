<?php
/* 
Plugin Name: Email Invest Forms
Plugin URI: http://emailinvest.com/ 
Version: 2.4
Author: EmailInvest
Description: Easy add an email subscription form to your Wordpress website and start collect users data as emails, names or birthdays and grow your email list. Use them in your Emailinvest account. Send and track your email campaigns.
*/  

$plugin_dir = plugin_dir_path( __FILE__ );
require(ABSPATH.WPINC.'/pluggable.php');
require($plugin_dir . 'widget.php');
require($plugin_dir . 'settings.php');

add_action('widgets_init', 'register_ei_w_form'); // When widget is show
add_action('admin_menu', 'Emailinvest_Settings'); // Add Menu Page
add_action('admin_init', 'register_ei_settings'); // Open Menu Page
add_action('wp_footer', 'Do_Plugin'); // When WP footer is loaded

add_shortcode( 'add_form', 'add_form' );

function Do_Plugin () {
	// Check for PopUp Form
	if (doubleval(get_option('ei_pop_on')) == 1) {
	$f_d=explode("-",get_option('ei_form_id'));
	if (!$f_d[0]) return false;
	?>
    <link href="https://<?php echo $f_d[0];?>.emailinvest.com/css/forms/css/modal.css" rel="stylesheet" type="text/css" />
    <!--<a href="javascript:void(0)" OnClick="EI_Modal('open')">Бутон</a> -->
    
    <script src="https://<?php echo $f_d[0];?>.emailinvest.com/get_code/modal/<?php echo $f_d[1];?>"></script> 
    <script>
        EI_Modal(false,'modal-form');
        setTimeout(function(){
            EI_Modal('auto','modal-form');
            },<?php echo doubleval(get_option('ei_pop_time'))*1000;?>);
    </script>
    <?php
	}
}

function add_form ($params = array()) {
	if (!$params["id"]) return "Please enter ID";
	$f_d=explode("-",$params["id"]);
	if (!$f_d[0]) return false;
		$form='<script src="https://'.$f_d[0].'.emailinvest.com/get_code/js/'.$f_d[1].'/'.$params["w"].'"></script>';
		return $form;
}

?>
