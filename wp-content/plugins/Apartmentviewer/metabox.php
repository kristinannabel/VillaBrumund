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
	echo '<input type="text" id="pris" name="pris" value="Pris" size="8" /><input type="text" id="prisvalue" name="prisvalue" value="'.get_post_meta($post->ID, 'prisvalue',true).'" size="16" />';
	echo '<input type="text" id="soverom" name="soverom" value="Soverom" size="8" /><input type="text" id="soveromvalue" name="soveromvalue" value="'.get_post_meta($post->ID, 'soveromvalue',true).'" size="16" />';
	echo '<input type="text" id="bad" name="bad" value="Bad" size="8" /><input type="text" id="badvalue" name="badvalue" value="'.get_post_meta($post->ID, 'badvalue',true).'" size="16" />';
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

  if(isset($_POST['arealvalue'])){
	$areal = $_POST['arealvalue'];
	update_post_meta($post_id, 'arealvalue', $areal);
  }
  if(isset($_POST['prisvalue'])){
	$pris = $_POST['prisvalue'];
	update_post_meta($post_id, 'prisvalue', $pris);
  }
  if(isset($_POST['soveromvalue'])){
	$soverom = $_POST['soveromvalue'];
	update_post_meta($post_id, 'soveromvalue', $soverom);
  }
  if(isset($_POST['badvalue'])){
	$bad = $_POST['badvalue'];
	update_post_meta($post_id, 'badvalue', $bad);
  }
}
?>