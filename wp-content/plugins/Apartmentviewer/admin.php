<?php

function create_theme_options_page() {
  add_menu_page('ApartmentViewer Settings', 'ApartmentViewer', 'administrator', __FILE__, 'build_options_page', plugins_url('/images/icon.png', __FILE__));
  add_submenu_page(__FILE__, 'general', 'Instillinger', 'administrator', __FILE__, '', 'general_funksjon');
  add_submenu_page( __FILE__, 'About', 'Om', 'administrator', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
}
add_action('admin_menu', 'create_theme_options_page');


function build_options_page() {
?>

<link rel="stylesheet" href="farbtastic.css" type="text/css" />
  <div id="myBackground">
  <div id="theme-options-wrap">
    <div class="icon32" id="icon-upload"> <br /> </div>
    <h2>ApartmentViewer</h2>
    <p>Her kan du personliggj&oslash;re din versjon av ApartmentViewer.</p>
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
		
		width: 1000px; 
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
  add_settings_section('main_section', 'Widget-innstilling', 'section_cb', __FILE__);
  add_settings_section('about_section', 'Om ApartmentViewer', 'section_cb', __FILE__);
  add_settings_field('tit_color', 'Tittelfarge:', 'title_color', __FILE__, 'main_section' );
  add_settings_field('tit_font', 'Tittelfont:', 'title_font', __FILE__, 'main_section');
  add_settings_field('tit_size', 'Tittelst&oslash;rrelse:', 'title_size', __FILE__, 'main_section');
  add_settings_field('tek_color', 'Tekstfarge:', 'tekst_farge', __FILE__, 'main_section');
  add_settings_field('tek_font', 'Tekstfont:', 'tekst_font', __FILE__, 'main_section');
  add_settings_field('pic_width', 'Bredde p&aring; meglerbilde:', 'picture_width', __FILE__, 'main_section' );
  add_settings_field('versjon', 'Version:', 'version_innstilling', __FILE__, 'about_section'); 
  add_settings_field('author', 'Author:', 'author_innstilling', __FILE__, 'about_section');  
 
  
  
}

// Funskjon som viser versjon av plugin i adminpanel. 
function version_innstilling() {
	echo "<p>1.0</p>";
}

// Author
function author_innstilling() {
  echo "<p>Ivan Le Hjelmeland, Mette Pernille Hellesvik, Kristin Annabel Folland</p>";
}
	
// Funskjon for å endre fargen på widget-titler.
function title_color() {
  $options = get_option('plugin_options');
  if($options['tit_color'] == ''){
  echo "<input name='plugin_options[tit_color]' type='text' value='#808080' />";
  }
  else{
  echo "<input name='plugin_options[tit_color]' type='text' value='{$options['tit_color']}' />";
  }
}

// Funskjon for å endre fonten på widhget-titler.
function title_font() {
  $options = get_option('plugin_options');
  if($options['tit_font'] == ''){
  echo "<input name='plugin_options[tit_font]' type='text' value='Verdana' />";
  }
  else{
  echo "<input name='plugin_options[tit_font]' type='text' value='{$options['tit_font']}' />";
  }
}

// Funskjon for å endre størrelsen på widget-titler.
function title_size() {
  $options = get_option('plugin_options');
  if($options['tit_size'] == ''){
  echo "<input name='plugin_options[tit_size]' type='text' value='14px' />";
  }
  else{
  echo "<input name='plugin_options[tit_size]' type='text' value='{$options['tit_size']}' />";
  }
}

// Funskjon for å endre fargen på widget-innhold.
function tekst_farge() {
  $options = get_option('plugin_options');
    if($options['tek_color'] == ''){
  echo "<input name='plugin_options[tek_color]' type='text' value='#808080' />";
  }
  else{
  echo "<input name='plugin_options[tek_color]' type='text' value='{$options['tek_color']}' />";
  }
}

// Funksjon for å endre fonten på widget-innhold.
function tekst_font() {
  $options = get_option('plugin_options');
   if($options['tek_font'] == ''){
  echo "<input name='plugin_options[tek_font]' type='text' value='Verdana' />";
  }
  else{
  echo "<input name='plugin_options[tek_font]' type='text' value='{$options['tek_font']}' />";
  }
}

// Funksjon for å endre bredden på meglerbildet.
function picture_width() {
  $options = get_option('plugin_options');
    if($options['pic_width'] == ''){
  echo "<input name='plugin_options[pic_width]' type='text' value='200px' />";
  }
  else{
  echo "<input name='plugin_options[pic_width]' type='text' value='{$options['pic_width']}' />";
}
}

function about_section() {
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