<?php
	/*
	Plugin Name: CinemaTuna
	Plugin URI: http://www.tunafishmedia.com/cinematuna/
	Description: Used by millions! A video-plugin where you easily can upload videos to your wordpress-website. Supports HTML5, W I N!
	Version: 1.0
	Author: Ivan Le Hjelmeland
	Author URI: http://www.tunafishmedia.com/
	
	Copyright 2012 Ivan Lé Hjelmeland (email : ivan.hjelmeland@gmail.com)  
	This program is free software; you can redistribute it and/or modify it under 
	the terms of the GNU General Public License, version 2, as published by the
	Free Software Foundation.  
	
	This program is distributed in the hope that it will be useful, but WITHOUT 
	ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS 
	FOR A PARTICULAR PURPOSE. See the GNU General Public License for more 
	details.  
	
	You should have received a copy of the GNU General Public License along with
	this program; if not, write to the Free Software Foundation, Inc., 51 
	Franklin St, Fifth Floor, Boston, MA 02110-1301 USA  
	*/
?>
<?php
	register_activation_hook(__FILE__, 'cinematuna_install'); 
	
	function cinematuna_install() { 
		global $wp_version; 
			if(version_compare($wp_version, "2.9", "<")) { 
				deactivate_plugins(basename(__FILE__)); 
				wp_die("This plugin requires WordPress version 2.9 or higher."); 
			} 
	} 
	register_deactivation_hook(__FILE__, 'cinematuna_uninstall'); 
	function cinematuna_uninstall() { 
	deactivate_plugins(basename(__FILE__)); 
} 

if ( is_admin() )
	require_once dirname( __FILE__ ) . '/admin.php';
	
function plugin_media_button($context) { 
$plugin_media_button = ' %s' . '<a href="media-upload.php?type=wp_myplugin&amp;TB_iframe=true" class="thickbox"><img src="http://tunafishmedia.com/prosjekt/webutv/wp-admin/images/media-button-other.gif?ver=20100531" alt="Legg til media" onclick="return false;"></a>'; 
return sprintf($context, $plugin_media_button); } 
add_filter('media_buttons_context', 'plugin_media_button');

function html5_video($atts, $content = null) {
	extract(shortcode_atts(array(
		"src" => '',
		"width" => '',
		"height" => ''
	), $atts));
	return '<video src="'.$src.'" width="'.$width.'" height="'.$height.'" controls autobuffer>';
}
add_shortcode('cinematuna', 'html5_video');
?>