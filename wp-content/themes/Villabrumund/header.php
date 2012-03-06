<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php if( is_404() ) echo '404 - Siden finnes ikke | '; elseif( is_search() ) echo 'Søkeresultater | ';
else wp_title( '|', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
<?php wp_head() // For plugins ?>
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'sandbox' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
</head>

<body class="<?php sandbox_body_class() ?>">

<div id="wrapper" class="hfeed">

	<div id="header">
		<h1 id="blog-title"><span><a href="<?php bloginfo('home') ?>">
<img src="images/logo.jpg" alt="Villa brumund"/>
</a></span></h1>




	</div><!--  #header -->

	<div id="access">

		<?php sandbox_globalnav() ?>
<?php
if(is_page('home')){
echo '<center><img src="images/forsideheader.jpg" alt="header bilde" height="300" width="1200"/></center>';
}

elseif(is_page('Leiligheter')){
echo '<center><img src="images/leiligheterheader.jpg" alt="header bilde" height="300" width="1200"/></center>';
}

elseif(is_child(4)){
echo '<center><img src="images/leilighetheader.jpg" alt="header bilde" height="300" width="1200"/></center>';
}

elseif(is_page('Nærmiljø')){
echo '<center><img src="images/nermiljoheader.jpg" alt="header bilde" height="300" width="1200"/></center>';
} 

elseif(is_page('Historie')){
echo '<center><img src="images/historieheader.jpg" alt="header bilde" height="300" width="1200"/></center>';
}

elseif(is_page('Kontakt oss')){
echo '<iframe width="1200" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.no/maps?f=q&amp;source=s_q&amp;hl=no&amp;geocode=&amp;q=2380+Brumunddal&amp;aq=&amp;sll=61.143235,9.09668&amp;sspn=12.354783,43.286133&amp;ie=UTF8&amp;hq=&amp;hnear=Brumunddal,+Ringsaker,+Hedmark&amp;t=m&amp;z=14&amp;ll=60.880948,10.939478&amp;output=embed"></iframe><br /><small><a href="http://maps.google.no/maps?f=q&amp;source=embed&amp;hl=no&amp;geocode=&amp;q=2380+Brumunddal&amp;aq=&amp;sll=61.143235,9.09668&amp;sspn=12.354783,43.286133&amp;ie=UTF8&amp;hq=&amp;hnear=Brumunddal,+Ringsaker,+Hedmark&amp;t=m&amp;z=14&amp;ll=60.880948,10.939478" style="color:#0000FF;text-align:left">Vis større kart</a></small>';
}

else {
echo '<center><img src="http://www.kristinannabel.com/villabrumund/forsideheader.jpg" alt="header bilde" height="300" width="1200"/></center>';
}
 ?>
</div><!-- #access -->