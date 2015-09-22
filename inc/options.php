<?php
/*
*
*
*/

add_action('admin_menu', 'create_disable_autofill_settings_menu');

function create_disable_autofill_settings_menu() {
	/*add_menu_page('WP Disable Autofill', 'Generate Alt Tags', 'administrator', 'generate-image-alt-tags-settings',
	 							'gen_alt_tag_settings_page' , plugins_url('/options/images/icon-16.png', dirname(__FILE__))  );*/
  add_submenu_page( 'options-general.php', 'WP Disable Autofill', 'WP Disable Autofill', 'administrator', 'wp-disable-autofill-settings', 'create_disable_autofill_settings_page');
	//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);*/
	//add_action( 'admin_init', 'register_disable_autofill_settings' );
	//add_action( 'admin_init', 'register_disable_autofill_includes' );
}

function create_disable_autofill_settings_page() {
	register_disable_autofill_settings();
	disable_autofill_settings_page();
}
function register_disable_autofill_settings() {
	register_setting( 'disable-autofill-settings-group', 'disable_auto_all_forms' );
	register_setting( 'disable-autofill-settings-group', 'some_other_option' );
	register_setting( 'disable-autofill-settings-group', 'option_etc' );

}




function disable_autofill_settings_page() {
?>
<div class="wrap">
<h2>WP Disable Autofill</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'disable-autofill-settings-group' ); ?>
    <?php do_settings_sections( 'disable-autofill-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Disable Autofill on all forms</th>
        <td><input type="checkbox" name="disable_auto_all_forms" value="<?php echo esc_attr( get_option('disable_auto_all_forms') ); ?>" /></td>
        </tr>
    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
