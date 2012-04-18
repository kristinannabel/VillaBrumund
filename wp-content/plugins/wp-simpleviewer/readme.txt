=== WP-SimpleViewer ===
Contributors: simpleviewer
Tags: SimpleViewer, photos, photo, images, image, posts, post, pages, page, plugin, gallery, galleries, flash, media
Requires at least: 2.8
Tested up to: 3.3.1
Stable tag: 2.3.0

Allows you to easily create SimpleViewer galleries with WordPress.

== Description ==

The WP-SimpleViewer plugin allows you to easily create [SimpleViewer](http://www.simpleviewer.net/simpleviewer) galleries with WordPress. SimpleViewer is a free, customizable Flash image gallery. Images and captions can be loaded from the WordPress Media Library or from Flickr.

Get full instructions and support at the [WP-SimpleViewer Homepage](http://www.simpleviewer.net/simpleviewer/support/wp-simpleviewer/).

== Installation ==

= Installation =

1. Download the WP-SimpleViewer plugin. Unzip the plugin folder on your local machine.
2. Upload the complete plugin folder into your WordPress blog's `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress
4. If the the `/wp-content/uploads/` folder does not exist, create it and give it write permissions (777) using an FTP program.

= Requirements =

Before installing, please confirm your web server meets the following requirements. If you are not sure, contact your web host tech support.

* WordPress Version 2.8 or higher.
* PHP version 5.2.0 or higher.
* The `/wp-content/uploads/` folder must exist and have full access permissions (777).
* PHP DOM extension is enabled (this is the default, however some web hosts may disable this extension).
* Active theme must call the [wp_head](http://codex.wordpress.org/Plugin_API/Action_Reference/wp_head) function in it's header.php file.

= Compatibility =

WP-SimpleViewer is not compatible with the following WP plugins. Please disable these plugins when using WP-SimpleViewer:

* [Fluency Admin](http://wordpress.org/extend/plugins/fluency-admin/)
* [WP-Minify](http://wordpress.org/extend/plugins/wp-minify/)
* [jQuery ColorBox](http://wordpress.org/extend/plugins/jquery-colorbox/)
* [jQuery Lightbox](http://wordpress.org/extend/plugins/jquery-lightbox-balupton-edition/)
* [Special Recent Posts](http://wordpress.org/extend/plugins/special-recent-posts/)
* [CMS Tree Page View](http://wordpress.org/extend/plugins/cms-tree-page-view/)
* [Simple Fields](http://wordpress.org/extend/plugins/simple-fields/)
* [Slickr Flickr](http://wordpress.org/extend/plugins/slickr-flickr/)
* [WordPress Flickr Manager](http://wordpress.org/extend/plugins/wordpress-flickr-manager/)

= Upgrading from v1.5.4 = 

Please note that upgrading to the new plugin will cause galleries created with the old plugin not to display. [Check here for the solution](http://www.simpleviewer.net/simpleviewer/support/wp-simpleviewer/#v1). 

== Changelog ==

= 2.3.0 =
* Fixed missing 'Add SimpleViewer Gallery' text button.
* Fixed debug mode warnings.
* Supports SimpleViewer v2.3.0.

= 2.2.0 =
* Fixed Gallery Sizing Issues.
* Fixed Multiple Flickr Tags
* Multiple bug fixes and enhancements.

= 2.1.3 =
* Fixed Gallery Sizing Issues
* Fixed Compatibility with different jQuery versions
* Fixed Page zooming on mobile devices
* Multiple bug fixes and enhancements

= 2.1.2 =
* Added Universal Playback.
* Supports SimpleViewer v2.1.2.
* Multiple bug-fixes.

= 2.0.5 =
* Added ability to delete galleries.
* Fixed extra quotes in Pro options.

= 2.0.4 =
* Supports SimpleViewer v2.0
* Supports loading images from the WordPress Media Library or via Flickr.
* Compatible with WP 3.0

== Upgrade to SimpleViewer-Pro ==

[SimpleViewer-Pro](http://www.simpleviewer.net/simpleviewer/pro) supports advanced customization options, no branding, unlimited images and more. To upgrade the WP-SimpleViewer plugin to SimpleViewer-Pro, [check here](http://simpleviewer.net/simpleviewer/support/wp-simpleviewer/#pro).

== Credits ==

WP-SimpleViewer developed by [SimpleViewer Inc](http://www.simpleviewer.net/).

== Terms Of Use ==

WP-SimpleViewer may be used for personal and/or commercial projects. [View Terms of Use](http://www.simpleviewer.net/terms/)