<?php
function add_theme_menu_item(){
	add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-settings", "theme_settings_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");


function theme_settings_page(){
  ?>
	  <div class="wrap">
  	  <h1>Theme Settings</h1>
  	  <form method="post" action="options.php">
  	    <?php
  	      settings_fields("section");
  	      do_settings_sections("theme-settings");
  	      submit_button();
  	    ?>
  	  </form>
		</div>
	<?php
}



function display_theme_panel_fields(){
  add_settings_section("section", "All Settings", null, "theme-settings");

  add_settings_field("phpsentryio_url", "PHP Sentry.io URL", "display_phpsentryio_element", "theme-settings", "section");
  register_setting("section", "phpsentryio_url");

  add_settings_field("jssentryio_url", "JS Sentry.io URL", "display_jssentryio_element", "theme-settings", "section");
  register_setting("section", "jssentryio_url");

  add_settings_field("AnalyticsID", "Analytics ID", "display_analyticsid_element", "theme-settings", "section");
  register_setting("section", "AnalyticsID");

  add_settings_field("WatermarkURL", "Watermark URL", "display_watermarkurl_element", "theme-settings", "section");
  register_setting("section", "WatermarkURL");

  add_settings_field("WatermarkKey", "Watermark Key", "display_watermarkkey_element", "theme-settings", "section");
  register_setting("section", "WatermarkKey");
}
add_action("admin_init", "display_theme_panel_fields");

function display_phpsentryio_element(){
	?>
    <input type="text" name="phpsentryio_url" id="phpsentryio_url" value="<?php echo get_option('phpsentryio_url'); ?>" />
  <?php
}

function display_jssentryio_element(){
	?>
    <input type="text" name="jssentryio_url" id="jssentryio_url" value="<?php echo get_option('jssentryio_url'); ?>" />
  <?php
}

function display_analyticsid_element(){
	?>
    <input type="text" name="AnalyticsID" id="AnalyticsID" value="<?php echo get_option('AnalyticsID'); ?>" />
  <?php
}

function display_watermarkurl_element(){
	?>
    <input type="text" name="WatermarkURL" id="WatermarkURL" value="<?php echo get_option('WatermarkURL'); ?>" />
  <?php
}

function display_watermarkkey_element(){
	?>
    <input type="text" name="WatermarkKey" id="WatermarkKey" value="<?php echo get_option('WatermarkKey'); ?>" />
  <?php
}
?>
