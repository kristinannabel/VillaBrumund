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
add_meta_box( 'myplugin_sectionid3', __('Meglerinformasjon', 'myplugin_textdomain'), 'myplugin_inner_custom_box3', 'page', 'side', 'core');
add_meta_box( 'myplugin_sectionid4', __('Selgerinformasjon', 'myplugin_textdomain'), 'myplugin_inner_custom_box4', 'page', 'side', 'core');
add_meta_box( 'myplugin_sectionid2', __('Bildegalleri', 'myplugin_textdomain'), 'myplugin_inner_custom_box2', 'page', 'normal', 'high');
}

/* Prints the box content */
function myplugin_inner_custom_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
	echo '<label for="areal">Areal: </label><input type="text" id="arealvalue" name="arealvalue" value="'.get_post_meta($post->ID, 'arealvalue',true).'" size="16" /><br />';
	echo '<label for="pris">Pris: </label><input type="text" id="prisvalue" name="prisvalue" value="'.get_post_meta($post->ID, 'prisvalue',true).'" size="16" /><br />';
	echo '<label for="soverom">Soverom: </label><input type="text" id="soveromvalue" name="soveromvalue" value="'.get_post_meta($post->ID, 'soveromvalue',true).'" size="16" /><br />';
	echo '<label for="bad">Bad: </label><input type="text" id="badvalue" name="badvalue" value="'.get_post_meta($post->ID, 'badvalue',true).'" size="16" />';
}

function myplugin_inner_custom_box2( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
  echo '<h3>Her skal det komme et galleri!</h3>';
}

function myplugin_inner_custom_box3( $post ) {//meglerinformasjon

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
  
  echo '<label for="navn">Navn: </label><input type="text" id="meglernavnvalue" name="meglernavnvalue" value="'.get_post_meta($post->ID, 'meglernavnvalue',true).'" size="16" /><br />';
  echo '<label for="tlf">Telefonnummer:&nbsp;</label><input type="text" id="meglertlfvalue" name="meglertlfvalue" value="'.get_post_meta($post->ID, 'meglertlfvalue',true).'" size="16" /><br />';
  echo '<label for="epost">Epost-adresse: </label><input type="text" id="meglerepostvalue" name="meglerepostvalue" value="'.get_post_meta($post->ID, 'meglerepostvalue',true).'" size="16" /><br />';
  echo '<label for="fax">Fax: </label><input type="text" id="meglerfaxvalue" name="meglerfaxvalue" value="'.get_post_meta($post->ID, 'meglerfaxvalue',true).'" size="16" /><br />';
  echo '<label for="bilde">Bilde av megler: </label><input type="file" id="meglerbildevalue" name="meglerbildevalue" value="'.get_post_meta($post->ID, 'meglerbildevalue',true).'" size="16" />';
}
function myplugin_inner_custom_box4( $post ) {//selgerinformasjon

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
  echo '<label for="navn">Navn: </label><input type="text" id="selgernavnvalue" name="selgernavnvalue" value="'.get_post_meta($post->ID, 'selgernavnvalue',true).'" size="16" /><br />';
  echo '<label for="tlf">Telefonnummer:&nbsp;</label><input type="text" id="selgertlfvalue" name="selgertlfvalue" value="'.get_post_meta($post->ID, 'selgertlfvalue',true).'" size="16" /><br />';
  echo '<label for="epost">Epost-adresse: </label><input type="text" id="selgerepostvalue" name="selgerepostvalue" value="'.get_post_meta($post->ID, 'selgerepostvalue',true).'" size="16" /><br />';
  echo '<label for="fax">Fax: </label><input type="text" id="selgerfaxvalue" name="selgerfaxvalue" value="'.get_post_meta($post->ID, 'selgerfaxvalue',true).'" size="16" /><br />';
  echo '<label for="bilde">Bilde av megler: </label><input type="file" id="selgerbildevalue" name="selgerbildevalue" value="'.get_post_meta($post->ID, 'selgerbildevalue',true).'" size="16" />';
}

/* When the post is saved, saves our custom data */
function myplugin_save_postdata( $post_id ) {
 
 // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;
//Kontaktinformasjons lagring
  if(strlen($_POST['arealvalue'])){
	$areal = $_POST['arealvalue'];
	update_post_meta($post_id, 'arealvalue', $areal);
  }
  if(strlen($_POST['prisvalue'])){
	$pris = $_POST['prisvalue'];
	update_post_meta($post_id, 'prisvalue', $pris);
  }
  if(strlen($_POST['soveromvalue'])){
	$soverom = $_POST['soveromvalue'];
	update_post_meta($post_id, 'soveromvalue', $soverom);
  }
  if(strlen($_POST['badvalue'])){
	$bad = $_POST['badvalue'];
	update_post_meta($post_id, 'badvalue', $bad);
  }
  
  //meglerinformasjon lagring
  if(strlen($_POST['meglernavnvalue'])){
	$meglernavn = $_POST['meglernavnvalue'];
	update_post_meta($post_id, 'meglernavnvalue', $meglernavn);
  }
  if(strlen($_POST['meglertlfvalue'])){
	$meglertlf = $_POST['meglertlfvalue'];
	update_post_meta($post_id, 'meglertlfvalue', $meglertlf);
  }
  if(strlen($_POST['meglerepostvalue'])){
	$meglerepost = $_POST['meglerepostvalue'];
	update_post_meta($post_id, 'meglerepostvalue', $meglerepost);
  }
  if(strlen($_POST['meglerfaxvalue'])){
	$meglerfax = $_POST['meglerfaxvalue'];
	update_post_meta($post_id, 'meglerfaxvalue', $meglerfax);
  }
  /*if(isset($_POST['meglerbildevalue'])){
	$meglerbilde = $_POST['meglerbildevalue'];
	update_post_meta($post_id, 'meglerbildevalue', $meglerbilde);
  }*/
  
  //selgerinformasjon lagring
  if(strlen($_POST['selgernavnvalue'])){
	$selgernavn = $_POST['selgernavnvalue'];
	update_post_meta($post_id, 'selgernavnvalue', $selgernavn);
  }
  if(strlen($_POST['selgertlfvalue'])){
	$selgertlf = $_POST['selgertlfvalue'];
	update_post_meta($post_id, 'selgertlfvalue', $selgertlf);
  }
  if(strlen($_POST['selgerepostvalue'])){
	$selgerepost = $_POST['selgerepostvalue'];
	update_post_meta($post_id, 'selgerepostvalue', $selgerepost);
  }
  if(strlen($_POST['selgerfaxvalue'])){
	$selgerfax = $_POST['selgerfaxvalue'];
	update_post_meta($post_id, 'selgerfaxvalue', $selgerfax);
  }
  /*if(isset($_POST['selgerbildevalue'])){
	$selgerbilde = $_POST['selgerbildevalue'];
	update_post_meta($post_id, 'selgerbildevalue', $selgerbilde);
  }*/
}
?>