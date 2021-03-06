﻿<?php
	/*
	Plugin Name: ApartmentViewer
	Description: Used by millions! 
	Version: 1.0
	Depends: Apartment Widget, Megler Widget, Selger Widget, Slideshow Gallery
	Author: Ivan Le Hjelmeland, Mette Pernille Hellesvik, Kristin Annabel Folland
	
	Copyright 2012
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
	register_activation_hook(__FILE__, 'apartmentviewer_install'); 
	
	function apartmentviewer_install() { 
		global $wp_version; 
			if(version_compare($wp_version, "2.9", "<")) { 
				deactivate_plugins(basename(__FILE__)); 
				wp_die("This plugin requires WordPress version 2.9 or higher."); 
			} 
	} 
	register_deactivation_hook(__FILE__, 'apartmentviewer_uninstall'); 
	function apartmentviewer_uninstall() { 
	deactivate_plugins(basename(__FILE__)); 
} 

if ( is_admin() ) {
	require_once dirname( __FILE__ ) . '/admin.php';
	require_once dirname( __FILE__ ) . '/metabox.php';
	require_once dirname( __FILE__ ) . '/apartment_widget.php';
	require_once dirname( __FILE__ ) . '/megler_widget.php';
	require_once dirname( __FILE__ ) . '/selger_widget.php';
	}
	
	function include_scripts() {
		$handle = "myscript";
		$src = plugins_url("my-script.js", __FILE__);
		$deps = "jQuery";
		$ver = false;
		$in_footer = false;
		wp_enqueue_script( 
			$handle
			,$src
			,$deps
			,$ver
			,$in_footer 
		);
	}
	
	add_action("admin_init", "include_scripts");

//Funksjon som henter ut en liste med alle barnesidene til angitt id, med featured image om denne er satt
//Eksempel på shortcode : [menu id="7"]
function get_apartments($atts) {
	extract(shortcode_atts(array('id' => '#'), $atts));
	$pages = get_pages(array( 'child_of' => $id, 'sort_column' => 'post_title'));
	$html = '';
	foreach($pages as $page){
		$ids = $page->ID;
		$imageUrl = get_the_post_thumbnail($ids);
		if(strlen($imageUrl))
			$html .= "<a href='".get_page_link( $page->ID )."'>".$imageUrl."<br><b>".$page->post_title."</b>";
		else
			$html .= "<li><a href='".get_page_link( $page->ID )."'><b>".$page->post_title."</b></li>";
	}
		
	return $html;
}
add_shortcode('menu', 'get_apartments');
?>