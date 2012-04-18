<?php
	/*
	Plugin Name: ApartmentViewer
	Plugin URI: http://www.tunafishmedia.com/cinematuna/
	Description: Used by millions! 
	Version: 1.0
	Depends: WP-SimpleViewer, Apartment Widget, Megler Widget, Selger Widget
	Author: Ivan Le Hjelmeland, Mette Pernille Hellesvik, Kristin Annabel Folland
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

if ( is_admin() )
	require_once dirname( __FILE__ ) . '/admin.php';
	require_once dirname( __FILE__ ) . '/metabox.php';
	require_once dirname( __FILE__ ) . '/apartment_widget.php';
	require_once dirname( __FILE__ ) . '/megler_widget.php';
	require_once dirname( __FILE__ ) . '/selger_widget.php';
?>
