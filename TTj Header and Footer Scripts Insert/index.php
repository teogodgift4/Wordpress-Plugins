<?php
/**
*Plugin Name: TTj Header and Footer Scripts Insert
*Description: This is a simple plugin for inserting scripts in header and footer. Suitable for css or cdns on the header or footer of the wordpress sites but NOT for js files
*Author: Teo Theodoridis
*Requires at least: 5.3
*Requires PHP: 5.6
*Licence: GPL v2 or later
**/

	

	function ideapro_admin_menu_option()
	{
		add_menu_page('Header & Footer Scripts','Site Scripts','manage_options','ideapro-admin-menu','ideapro_scripts_page','',200);
	}

	add_action('admin_menu','ideapro_admin_menu_option');

	function ideapro_scripts_page()
	{

		if(array_key_exists('submit_scripts_update',$_POST))
		{
			update_option('ideapro_header_scripts',$_POST['header_scripts']);
			update_option('ideapro_footer_scripts',$_POST['footer_script']);

			?>
			<div id="setting-error-settings-updated" class="updated_settings_error notice is-dismissible"><strong>Settings have been saved.</strong></div>
			<?php

		}

		$header_scripts = get_option('ideapro_header_scripts','none');
		$footer_scripts = get_option('ideapro_footer_scripts','none');


		?>
		<div class="wrap">
			<h2>Update Scripts</h2>
			<form method="post" action="">
			<label for="header_scripts">Header Scripts</label>
			<textarea name="header_scripts" class="large-text"><?php print $header_scripts; ?></textarea>
			<label for="footer_scripts">Footer Scripts</label>
			<textarea name="footer_script" class="large-text"><?php print $footer_scripts; ?></textarea>
			<input type="submit" name="submit_scripts_update" class="button button-primary" value="UPDATE SCRIPTS">
			</form>
		</div>	
		<?php
	}


	function ideapro_display_header_scripts()
	{
		$header_scripts = get_option('ideapro_header_scripts','none');

		print $header_scripts;
	}
	add_action('wp_head','ideapro_display_header_scripts');

	function ideapro_display_footer_scripts()
	{
		$footer_scripts = get_option('ideapro_footer_scripts','none');
		print $footer_scripts;
	}
	add_action('wp_footer','ideapro_display_footer_scripts');

	
?>
