<?php
//Creates a custom plugin settings menu
add_action('admin_menu', 'apartmentviewer_create_menu');

function apartmentviewer_create_menu() {
//Creates new top-level menu in adminpanel
add_menu_page('Apartment Viewer Plugin Settings', 'Apartment Viewer','administrator', __FILE__, 'apartmentviewer_settings_page', plugins_url('/image/video-icon.png', __FILE__));

//creates submenus
add_submenu_page(__FILE__, 'Email Settings Page', 'Email', 'manage_options', __FILE__.'_email_settings', 'apartmentviewer_settings_email');
}
?>
