<?php
/*
Plugin Name: Apartment Viewer
Plugin URI:
Description: The plugin is making it easy to add appartments to a page, with metadata, gallery aso. A plugin for the course Emneoverbyggende 2 at H&oslash;yskolen i Gj&oslash;vik, Norway.
Version: 1.0
Author: Kristin Annabel T Folland, Mette Pernille Hellesvik, Ivan Le Hjelmeland
Author URI: http://www.kristinannabel.com/
*/

  
/* 
Copyright 2011 KRISTIN ANNABEL FOLLAND (email : kristinannabel.folland@gmail.com)  
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
//Refers to the files
if ( is_admin() )
	require_once dirname( __FILE__ ) . '/admin.php';
	
?>
<?php
//Code for activating and deactivating the plugin
register_activation_hook(__FILE__, 'apartmentviewer_activate'); 
function apartmentviewer_activate() { 
global $wp_version; 
if(version_compare($wp_version, '2.9', '<')) { 
deactivate_plugins(basename(__FILE__)); 
wp_die('This plugin requires WordPress version 2.9 or 
higher.'); 
} 
else{
activate_plugins(basename(__FILE__));	
}
} 
register_deactivation_hook(__FILE__, 'apartmentviewer_deactivate'); 
function apartmentviewer_deactivate() { 
deactivate_plugins(basename(__FILE__));
}
register_uninstall_hook( __FILE__, array( 'apartmentviewer', 'on_uninstall' ) );
// Class for uninstalling
if ( ! class_exists('apartmentviewer' ) ) :
/**
 * This class triggers functions that run during activation/deactivation & uninstallation
 */
class apartmentviewer
{
    // Set this to true to get the state of origin, so you don't need to always uninstall during development.
    const STATE_OF_ORIGIN = false;


    function __construct( $case = false )
    {
        if ( ! $case )
            wp_die( 'Busted! You should not call this class directly', 'Doing it wrong!' );

        switch( $case )
        {
            case 'uninstall' : 
                // delete the tables
                add_action( 'init', array( &$this, 'uninstall_cb' ) );
                break;
        }
    }

    /**
     * Remove/Delete everything - If the user wants to uninstall, then he wants the state of origin.
     */
    function on_uninstall()
    {
        if ( __FILE__ != WP_UNINSTALL_PLUGIN )
            return;

        new YourPluginNameInit( 'uninstall' );
    }

    function uninstall_cb()
    {
        // delete tables
        wp_die( '<h1>This is run on <code>init</code> during uninstallation</h1>', 'Uninstallation hook example' );
    }
}
endif;

require_once dirname( __FILE__ ) . '/opplastning.php';
?>
