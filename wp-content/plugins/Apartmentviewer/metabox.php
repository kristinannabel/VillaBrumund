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
}

/* Prints the box content */
function myplugin_inner_custom_box( $post ) {//generell informasjon

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );

  // The actual fields for data entry
  echo '<label for="areal"><b>Areal: </b></label><input type="text" id="arealvalue" name="arealvalue" value="'.get_post_meta($post->ID, 'arealvalue',true).'" size="16" /><br />';
  echo '<label for="pris"><b>Pris: </b></label><input type="text" id="prisvalue" name="prisvalue" value="'.get_post_meta($post->ID, 'prisvalue',true).'" size="16" /><br />';
  echo '<label for="soverom"><b>Soverom: </b></label><input type="text" id="soveromvalue" name="soveromvalue" value="'.get_post_meta($post->ID, 'soveromvalue',true).'" size="16" /><br />';
  echo '<label for="bad"><b>Bad: </b></label><input type="text" id="badvalue" name="badvalue" value="'.get_post_meta($post->ID, 'badvalue',true).'" size="16" /><br />';
  echo '<label for)"prospekt"><b>Last ned prospekt: </b></label><input id="prospektvalue" type="text" size="36" name="prospektvalue" value="'.get_post_meta($post->ID, 'prospektvalue',true).'" /><input id="upload_pdf_button" type="button" value="Last opp prospekt" />';
  echo '<br><br><label for="url"><b>URL: </b></label><input type="text" id="urlenvalue" name="urlenvalue" value="'.get_post_meta($post->ID, 'urlenvalue',true).'" size="16" /><br />';
  echo 'Skriv inn URL som kjøper skal sendes til når de trykker på bud-knappen';
}

function myplugin_inner_custom_box3( $post ) {//meglerinformasjon

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
  
  echo '<label for="navn"><b>Navn: </b></label><input type="text" id="meglernavnvalue" name="meglernavnvalue" value="'.get_post_meta($post->ID, 'meglernavnvalue',true).'" size="16" /><br />';
  echo '<label for="tlf"><b>Telefonnummer:&nbsp;</b></label><input type="text" id="meglertlfvalue" name="meglertlfvalue" value="'.get_post_meta($post->ID, 'meglertlfvalue',true).'" size="16" /><br />';
  echo '<label for="epost"><b>Epost-adresse: </b></label><input type="text" id="meglerepostvalue" name="meglerepostvalue" value="'.get_post_meta($post->ID, 'meglerepostvalue',true).'" size="16" /><br />';
  echo '<label for="fax"><b>Fax: </b></label><input type="text" id="meglerfaxvalue" name="meglerfaxvalue" value="'.get_post_meta($post->ID, 'meglerfaxvalue',true).'" size="16" /><br />';
  echo '<label for="meglerbildevalue"><b>Last opp bilde av megler: </b></label><input id="meglerbildevalue" type="text" size="36" name="meglerbildevalue" value="'.get_post_meta($post->ID, 'meglerbildevalue',true).'" /><input id="upload_image_button_megler" type="button" value="Last opp bilde" />';
  echo '<br>Skriv inn en URL eller last opp et bilde';
}
function myplugin_inner_custom_box4( $post ) {//selgerinformasjon

  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
  echo '<label for="navn"><b>Navn: </b></label><input type="text" id="selgernavnvalue" name="selgernavnvalue" value="'.get_post_meta($post->ID, 'selgernavnvalue',true).'" size="16" /><br />';
  echo '<label for="tlf"><b>Telefonnummer:&nbsp;</b></label><input type="text" id="selgertlfvalue" name="selgertlfvalue" value="'.get_post_meta($post->ID, 'selgertlfvalue',true).'" size="16" /><br />';
  echo '<label for="epost"><b>Epost-adresse: </b></label><input type="text" id="selgerepostvalue" name="selgerepostvalue" value="'.get_post_meta($post->ID, 'selgerepostvalue',true).'" size="16" /><br />';
  echo '<label for="fax"><b>Fax: </b></label><input type="text" id="selgerfaxvalue" name="selgerfaxvalue" value="'.get_post_meta($post->ID, 'selgerfaxvalue',true).'" size="16" /><br />';
}
function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', WP_PLUGIN_URL.'/my-script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
	}
add_action("admin_init", "my_admin_scripts");
function my_admin_styles() {
	wp_enqueue_style('thickbox');
}
if((isset($_GET['page']))&&($_GET['page'] == 'Apartmentviewer')){
	add_action('admin_print_scripts', 'my_admin_scripts');
	add_action('admin_print_styles', 'my_admin_styles');
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
  if(isset($_POST['prospektvalue'])){
	$prospektbilde = $_POST['prospektvalue'];
	update_post_meta($post_id, 'prospektvalue', $prospektbilde);
  }
  if(strlen($_POST['urlenvalue'])){
	$urlen = $_POST['urlenvalue'];
	update_post_meta($post_id, 'urlenvalue', $urlen);
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
  if(isset($_POST['meglerbildevalue'])){
	$meglerbilde = $_POST['meglerbildevalue'];
	update_post_meta($post_id, 'meglerbildevalue', $meglerbilde);
  }
  
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
}

function apartmentContent($post){
$options = get_option('plugin_options');
  if((get_post_meta($post, 'arealvalue',true))||(get_post_meta($post, 'prisvalue',true))||(get_post_meta($post, 'soveromvalue',true))||(get_post_meta($post, 'badvalue',true))){
	echo "<h3 style='color:" . $options['tit_color'] . "; font-family:" . $options['tit_font'] . "; font-size:". $options['tit_size'] ."'; class='widget-title'>Leilighetsinformasjon</h3>";
  }
  if(get_post_meta($post, 'arealvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Areal: </b>".get_post_meta($post, 'arealvalue',true)." kvm<br />");
  }
  if(get_post_meta($post, 'prisvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Pris: </b>".get_post_meta($post, 'prisvalue',true)." kr<br />");
  }
  if(get_post_meta($post, 'soveromvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Antall soverom: </b>".get_post_meta($post, 'soveromvalue',true)."<br />");
  }
  if(get_post_meta($post, 'badvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Antall bad: </b>".get_post_meta($post, 'badvalue',true)."<br />");
  }
  if(get_post_meta($post, 'prospektvalue',true)){
  print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Prospekt: </b><a href='".get_post_meta($post, 'prospektvalue',true)."'>Vis</a><br />");
  }
  if(get_post_meta($post, 'urlenvalue',true)){
	print_r( "<br><a href='http://".get_post_meta($post, 'urlenvalue',true)."'><img src='".network_site_url( '/' )."/wp-content/plugins/Apartmentviewer/images/knapp.jpg' alt='Legg inn bud'/></a>");
  }
}
function meglerContent($post){
$options = get_option('plugin_options');
  if((get_post_meta($post, 'meglernavnvalue',true))||(get_post_meta($post, 'meglertlfvalue',true))||(get_post_meta($post, 'meglerepostvalue',true))||(get_post_meta($post, 'meglerfaxvalue',true))||(get_post_meta($post, 'meglerbildevalue',true))){
	echo "<h3 style='color:" . $options['tit_color'] . "; font-family:" . $options['tit_font'] . "; font-size:". $options['tit_size'] ."'; class='widget-title'>Meglerinformasjon</h3>";
  }
  if(get_post_meta($post, 'meglernavnvalue',true)){
  print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Meglers navn: </b>".get_post_meta($post, 'meglernavnvalue',true)."<br />");
  }
  if(get_post_meta($post, 'meglertlfvalue',true)){
  print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Meglers tlfnr: </b>".get_post_meta($post, 'meglertlfvalue',true)."<br />");
  }
  if(get_post_meta($post, 'meglerepostvalue',true)){
  print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Meglers epost: </b>".get_post_meta($post, 'meglerepostvalue',true)."<br />");
  }
  if(get_post_meta($post, 'meglerfaxvalue',true)){
  print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Meglers fax: </b>".get_post_meta($post, 'meglerfaxvalue',true)."<br />");
  }
  if(get_post_meta($post, 'meglerbildevalue',true)){
  print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Bilde av megler: </b><br><img src=".get_post_meta($post, 'meglerbildevalue',true)." alt='Bilde av megler' width='" . $options['pic_width'] . "' /><br />");
  }
}
function selgerContent($post){
$options = get_option('plugin_options');
  if((get_post_meta($post, 'selgernavnvalue',true))||(get_post_meta($post, 'selgertlfvalue',true))||(get_post_meta($post, 'selgerepostvalue',true))||(get_post_meta($post, 'selgerfaxvalue',true))||(get_post_meta($post, 'selgerbildevalue',true))){
	echo "<h3 style='color:" . $options['tit_color'] . "; font-family:" . $options['tit_font'] . "; font-size:". $options['tit_size'] ."'; class='widget-title'>Selgerinformasjon</h3>";
  }
  if(get_post_meta($post, 'selgernavnvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Selgers navn: </b>".get_post_meta($post, 'selgernavnvalue',true)."<br />");
  }
  if(get_post_meta($post, 'selgertlfvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Selgers tlfnr: </b>".get_post_meta($post, 'selgertlfvalue',true)."<br />");
  }
  if(get_post_meta($post, 'selgerepostvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Selgers epost: </b>".get_post_meta($post, 'selgerepostvalue',true)."<br />");
  }
  if(get_post_meta($post, 'selgerfaxvalue',true)){
	print_r( "<b style='color:" . $options['tek_color'] . "; font-family:" . $options['tek_font'] . "';>Selgers fax: </b>".get_post_meta($post, 'selgerfaxvalue',true)."<br />");
  }
}

add_filter('apartmentContent', 'apartmentContent', 10, 1);
add_filter('meglerContent', 'meglerContent', 10, 1);
add_filter('selgerContent', 'selgerContent', 10, 1);
?>