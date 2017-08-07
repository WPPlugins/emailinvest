<?php
function Emailinvest_Settings() {
    add_menu_page('Emailinvest', 'Emailinvest', 'administrator', 'Emailinvest_Settings', 'OL_Display_EI_Settings',plugins_url().'/emailinvest/fav_icon.png');
}

function register_ei_settings() {
	register_setting( 'emailinvest', 'ei_form_id' );
	register_setting( 'emailinvest', 'ei_pop_on' );
	register_setting( 'emailinvest', 'ei_pop_time' );
}

function OL_Display_EI_Settings() {
?>

<div class="wrap">
  <h2>EmailInvest subscribe form settings</h2>
  <form method="post" action="options.php">
    <?php settings_fields( 'emailinvest' ); ?>
    <?php do_settings_sections( 'emailinvest' ); ?>
    <table width="100%" border="0" cellpadding="2" cellspacing="0" class="form-table">
      <tr valign="top">
        <th width="350" align="left" scope="row">EmailInvest Form ID</th>
        <td align="left"><input name="ei_form_id" type="text" value="<?php echo get_option('ei_form_id'); ?>" /></td>
      </tr>
      <tr valign="top">
        <th align="left" scope="row">Show as PopUp window</th>
        <td align="left"><input name="ei_pop_on" type="checkbox" value="1" <?php if (doubleval(get_option('ei_pop_on')) == 1) echo 'checked';?>/></td>
      </tr>
      <tr valign="top">
        <th align="left" scope="row">Delay PopUp for</th>
        <td align="left"><input name="ei_pop_time" type="text" value="<?php echo doubleval(get_option('ei_pop_time')); ?>" />
          seconds</td>
      </tr>
      <tr>
        <td colspan="2"><?php submit_button(); ?></td>
      </tr>
      <tr valign="top">
        <th colspan="2" align="left" scope="row"> <h2>How to add your form from EmailInvest</h2>
          <ol>
            <li>Go to http://emailinvest.com</li>
            <li>Login with your data</li>
            <li>Open Web Forms menu</li>
            <li>View your Form Id</li>
            <li>Go to widget settings in your Blog (Appearance-&gt;Widget) and move your widget in your sidebar.</li>
            <li>[add_form id=ID w=350px h=350px] - To add forms in your post, where ID - is form id from emailinvest, w and h are width and height (this is option)</li>
          </ol></th>
      </tr>
    </table>
  </form>
</div>
<?php
}
?>