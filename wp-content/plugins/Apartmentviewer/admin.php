<?php

function create_theme_options_page() {
  add_menu_page('ApartmentViewer Settings', 'ApartmentViewer', 'administrator', __FILE__, 'build_options_page', plugins_url('/images/icon.png', __FILE__));
  add_submenu_page(__FILE__, 'general', 'General', 'administrator', __FILE__, 'general_setting', 'general_funksjon');
  add_submenu_page( __FILE__, 'About', 'About', 'administrator', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
}
add_action('admin_menu', 'create_theme_options_page');


function build_options_page() {
?>

<link rel="stylesheet" href="farbtastic.css" type="text/css" />
  <div id="myBackground">
  <div id="theme-options-wrap">
    <div class="icon32" id="icon-upload"> <br /> </div>
    <h2>ApartmentViewer</h2>
    <p>Change the settings off the plugin here.</p>
    <form method="post" action="options.php" enctype="multipart/form-data">
		<?php settings_fields('plugin_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
      <p class="submit">
        <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
      </p>
    </form>
  </div>
  </div>
  
	<head>
    	<style>

		div#myBackground {
		background-image: url("http://www.tunafishmedia.com/prosjekt/webutv/wp-content/plugins/CinemaTuna/images/cinemapop.jpg");
		width: 1000px; height: 1000px; 
		background-repeat:no-repeat;}


			#theme-options-wrap {

			}
			#theme-options-wrap h3 {
				background-color: #48a1f1;
				border: 1px solid #999999;
				border-radius: 5px 5px 5px 5px;
				cursor: pointer;
				display: block;
				font-size: 1.17em;
				font-weight: bold;
				margin: 1em 0;
				padding: 10px;
				width: 500px;
			}
		</style>
		<script type="text/javascript">
            jQuery('form h3').live('click', function(){	
                // Hide
                hide_table();
            
                // Show
                jQuery(this).next().animate( 
                    {'height':'toggle'}, 'fast', 'swing'
                );
            });
        	
			jQuery("form table").hide();
			
            function hide_table() {
                jQuery("form table[style='display: table;']").hide();
            }
        
        </script>
	</head>
  
<?php
}

add_action('admin_init', 'register_and_build_fields');
function register_and_build_fields() {
  register_setting('plugin_options', 'plugin_options', 'validate_setting');
  add_settings_section('main_section', 'General', 'section_cb', __FILE__);
  add_settings_section('second_section', 'Design', 'section_cb', __FILE__);
  add_settings_section('third_section', 'Upload', 'section_cb', __FILE__);
  add_settings_section('fourth_section', 'About', 'section_cb', __FILE__);
  add_settings_field('footer_epost', 'E-post', 'footer_epost_innstilling', __FILE__, 'main_section');
  add_settings_field('footer_font2', 'E-post Font:', 'footer_font2_innstilling', __FILE__, 'main_section');
  add_settings_field('footer_farge2', 'E-post Farge:', 'footer_farge2_innstilling', __FILE__, 'main_section');
  add_settings_field('footer_telefon', 'Telefonnummer:', 'footer_telefon_innstilling', __FILE__, 'main_section');
  add_settings_field('footer_font', 'Telefonnummer Font:', 'footer_font_innstilling', __FILE__, 'main_section');
  add_settings_field('footer_farge', 'Telefonnummer Farge:', 'footer_farge_innstilling', __FILE__, 'main_section');
  add_settings_field('toppmeny_font', 'Version:', 'version_innstilling', __FILE__, 'fourth_section'); 
  add_settings_field('toppmeny_farge', 'Author:', 'author_innstilling', __FILE__, 'fourth_section');  
  add_settings_field('color', 'Menyelement 1:', 'my_setting_color', __FILE__, 'third_section' );
  add_settings_field('logo', 'Video (.mp4) :', 'logo_innstilling', __FILE__, 'second_section');
  add_settings_field('menyelement_to', 'Menyelement 2:', 'menyelement2_innstilling', __FILE__, 'third_section');
  add_settings_field('menyelement_tre', 'Menyelement 3:', 'menyelement3_innstilling', __FILE__, 'third_section');
  add_settings_field('menyelement_fire', 'Menyelement 4:', 'menyelement4_innstilling', __FILE__, 'third_section');
  add_settings_field('menyelement_fem', 'Menyelement 5:', 'menyelement5_innstilling', __FILE__, 'third_section');
  add_settings_field('bakgrunns_farge', 'Bakgrunnsfarge:', 'bakgrunnsfarge_innstilling', __FILE__, 'second_section');
  add_settings_field('innhold_pfont', 'Tekst Font:', 'innhold_font_innstilling', __FILE__, 'third_section');
  add_settings_field('innhold_pfarge', 'Tekst Farge:', 'innhold_farge_innstilling', __FILE__, 'third_section');
  add_settings_field('menyelemnt_font', 'Font:', 'meny_font_innstilling', __FILE__, 'third_section');
  add_settings_field('menyelementtekst_farge', 'Tekstfarge:', 'meny_farge_innstilling', __FILE__, 'third_section');
  add_settings_field('overskrift_font', 'Overskrift Font:', 'overskrift_font_innstilling', __FILE__, 'third_section');
  add_settings_field('overskrift_farge', 'Overskrift Farge:', 'overskrift_farge_innstilling', __FILE__, 'third_section');
  
}

	// Colorpicker test
function my_setting_color() {
    $options = get_option( 'plugin_options' );
    ?>
    <div class="color-picker" style="position: relative;">
        <input type="text" name='plugin_options[color]' class="color-wheel" value="<?php echo esc_attr( $options['color'] ); ?>" />
        <div style="position: absolute;" class="colorpicker"></div>
    </div>
    <?php
}

// Version
function version_innstilling() {
	echo "<p>1.0</p>";
}

// Author
function author_innstilling() {
  echo "<p>Ivan Le Hjelmeland, Mette Pernille Hellesvik, Kristin Annabel Folland</p>";
}

// Overskrift farge
function overskrift_farge_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[overskrift_farge]' type='text' value='{$options['overskrift_farge']}' />";
}

	// Overskrift font
function overskrift_font_innstilling() {
	$items = array('', 'Gill Sans MT', 'Lucida Sans Unicode', 'verdana', 'geneva', 'sans-serif');
	echo "<select name='plugin_options[overskrift_font]'>";
		foreach($items as $item) {
			$selected = ( $options['overskrift_font'] === $item) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
	echo "</select>";
}

// Menyelement farge
function meny_farge_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[menyelementtekst_farge]' type='text' value='{$options['menyelementtekst_farge']}' />";
}

	// Menyelement font
function meny_font_innstilling() {
	$items = array('', 'Gill Sans MT', 'Lucida Sans Unicode', 'verdana', 'geneva', 'sans-serif');
	echo "<select name='plugin_options[menyelemnt_font]'>";
		foreach($items as $item) {
			$selected = ( $options['menyelemnt_font'] === $item) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
	echo "</select>";
}	
	
// Innholdstekst farge
function innhold_farge_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[innhold_pfarge]' type='text' value='{$options['innhold_pfarge']}' />";
}

// Innholdsfont
function innhold_font_innstilling() {
	$items = array('', 'Gill Sans MT', 'Lucida Sans Unicode', 'verdana', 'geneva', 'sans-serif');
	echo "<select name='plugin_options[innhold_pfont]'>";
		foreach($items as $item) {
			$selected = ( $options['innhold_pfont'] === $item) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
	echo "</select>";
}

// Footer_Font for E-post
function footer_font2_innstilling() {
	$items = array('', 'Gill Sans MT', 'Lucida Sans Unicode', 'verdana', 'geneva', 'sans-serif');
	echo "<select name='plugin_options[footer_font2]'>";
		foreach($items as $item) {
			$selected = ( $options['footer_font2'] === $item) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
	echo "</select>";
}

// Footer E-post Farge
function footer_farge2_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[footer_farge2]' type='text' value='{$options['footer_farge2']}' />";
}

// Footer Telefonnummer farge
function footer_farge_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[footer_farge]' type='text' value='{$options['footer_farge']}' />";
}

// Footer_Font 
function footer_font_innstilling() {
	$items = array('', 'Gill Sans MT', 'Lucida Sans Unicode', 'verdana', 'geneva', 'sans-serif');
	echo "<select name='plugin_options[footer_font]'>";
		foreach($items as $item) {
			$selected = ( $options['footer_font'] === $item) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
	echo "</select>";
}

// E-post i footer
function footer_epost_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[footer_epost]' type='text' value='{$options['footer_epost']}' />";
}

// Telefonnummeret i footer
function footer_telefon_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[footer_telefon]' type='text' value='{$options['footer_telefon']}' />";
}

// Menyelement 1
function menyelement1_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[menyelement_en]' type='text' value='{$options['menyelement_en']}' />";
}

// Menyelement 2
function menyelement2_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[menyelement_to]' type='text' value='{$options['menyelement_to']}' />";
}

// Menyelement 3
function menyelement3_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[menyelement_tre]' type='text' value='{$options['menyelement_tre']}' />";
}

// Menyelement 4
function menyelement4_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[menyelement_fire]' type='text' value='{$options['menyelement_fire']}' />";
}

// Menyelement 5
function menyelement5_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[menyelement_fem]' type='text' value='{$options['menyelement_fem']}' />";
}

// Bakgrunnsfarge
function bakgrunnsfarge_innstilling() {
  $options = get_option('plugin_options');
  echo "<input name='plugin_options[bakgrunns_farge]' type='text' value='{$options['bakgrunns_farge']}' />";
}

// Logo
function logo_innstilling() {
	echo '<input type="file" name="logo" />';
}

function fourth_section() {
    _e( 'The general section description goes here.' );
}
function my_custom_submenu_page_callback() {
	echo '<h3>About ApartmentViewer Plugin</h3>
	<p>	<strong>Plugin Name:</strong> ApartmentViewer </br>
	<strong>Description:</strong> A plugin to sell apartments. Devoloped by students at the university of Gj&oslash;vik </br>
	<strong>Version:</strong> 1.0 </br>
	<strong>Author:</strong> Ivan Le Hjelmeland, Mette Pernille Hellesvik, Kristin Annabel Folland </br>
	<strong>Author URI:</strong> http://www.tunafishmedia.com/</p> 
	
	<p>Copyright 2012 Ivan Le Hjelmeland, Mette Pernille Hellesvik, Kristin Annabel Folland (email : ivan.hjelmeland@gmail.com, pernillehellesvik@gmail.com, kristinannabel.folland@gmail.com) </br>  
	This program is free software; you can redistribute it and/or modify it under  </br>
	the terms of the GNU General Public License, version 2, as published by the </br>
	Free Software Foundation.  </p>
	
	<p>This program is distributed in the hope that it will be useful, but WITHOUT  </br>
	ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or </br>
	FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License </br>
	for more details.  </p>
	
	<p>You should have received a copy of the GNU General Public License along with </br>
	this program; if not, write to the Free Software Foundation, Inc., 51  </br>
	Franklin St, Fifth Floor, Boston, MA 02110-1301 USA  </p>';

}
function section_cb() {}

function validate_setting($plugin_options){
	$keys = array_keys($_FILES);
	$i = 0;
	
	foreach( $_FILES as $video ) {
		if ( $video['size'] ) {
			if ( preg_match('/(mp4|ogv|webm)$/i', $video['type']) ) {
				$override = array('test_form' => false);
				$file = wp_handle_upload($video, $override);
				$plugin_options[$keys[$i]] = $file['url'];
			}
			else {
				wp_die('None of the files were uploaded. Maybe it had the wrong type?');
			}
			}
			else {
				$options = get_option('plugin_options');
				$plugin_options[$keys[$i]] = $options[$keys[$i]];
			}
			$i++;
		}

	return $plugin_options;
}