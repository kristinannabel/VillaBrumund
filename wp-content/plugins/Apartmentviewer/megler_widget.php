<?php
/*
Plugin Name: Megler Widget
Description: En widget som viser meglerinformasjonen fra metaboxene i page-edit
Author: Kristin Annabel Folland, Mette Pernille Hellesvik, Ivan Le Hjelmeland
Version: 1
*/ 
class MeglerWidget extends WP_Widget
{
  function MeglerWidget()
  {
    $widget_ops = array('classname' => 'MeglerWidget', 'description' => 'Viser metadataene om megleren' );
    $this->WP_Widget('MeglerWidget', 'ApartmentViewer Meglerinformasjon', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
		//Vi ønsker ikke å vise tittelen på widgeten til brukeren, fordi vi har vår egen tittel, generert i koden
 
    // WIDGET KODE
	meglerContent($_GET['page_id']);//Henter denne funksjonen fra nederst i metabox.php
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("MeglerWidget");') );
?>