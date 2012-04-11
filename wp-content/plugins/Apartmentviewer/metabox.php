<?php 

add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );
// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'myplugin_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'myplugin_save_postdata' );

if(isset($_POST['post_ID'])){
	myplugin_save_postdata($_POST['post_ID']);
}
/*Her er box nr 1 - til høyre*/
/* Adds a box to the main column on the Page edit screen */
function myplugin_add_custom_box() {
add_meta_box( 'myplugin_sectionid', __('Leilighetsinformasjon', 'myplugin_textdomain'), 'myplugin_inner_custom_box', 'page', 'side', 'core');
add_meta_box( 'myplugin_sectionid2', __('Bildegalleri', 'myplugin_textdomain'), 'myplugin_inner_custom_box2', 'page', 'normal', 'high');
}

/* Prints the box content */
function myplugin_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
	echo '<input type="text" id="areal" name="areal" value="Areal" size="8" /><input type="text" id="arealvalue" name="arealvalue" value="'.get_post_meta($post->ID, 'arealvalue',true).'" size="16" />';
	echo '<input type="text" id="pris" name="pris" value="Pris" size="8" /><input type="text" id="prisvalue" name="prisvalue" value="" size="16" />';
	echo '<input type="text" id="soverom" name="soverom" value="Soverom" size="8" /><input type="text" id="soveromvalue" name="soveromvalue" value="" size="16" />';
	echo '<input type="text" id="bad" name="bad" value="Bad" size="8" /><input type="text" id="badvalue" name="badvalue" value="" size="16" />';
}


function myplugin_inner_custom_box2( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
  echo '<h3>Her skal det komme et galleri!</h3>';
}

/* When the post is saved, saves our custom data */
function myplugin_save_postdata( $post_id ) {
 
 // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

	  

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

 
 
  // Check permissions
/*  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }*/

  // OK, we're authenticated: we need to find and save the data

  if(isset($_POST['arealvalue'])){
	$mydata = $_POST['arealvalue'];
	print_r(update_post_meta($post_id, 'arealvalue', $mydata));
  }
  
  
  
  // Do something with $mydata 
  // probably using add_post_meta(), update_post_meta(), or 
  // a custom table (see Further Reading section below)
}
?>