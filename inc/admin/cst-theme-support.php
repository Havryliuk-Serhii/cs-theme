<h1>Custom header settings</h1>
<?php settings_errors();?>

<form  method="post" action="options.php">
	<?php settings_fields( 'cst-settings-group' ); ?>
	<?php
            do_settings_sections( 'cst_theme' );
        ?>
	<?php submit_button(  ); ?>
</form>