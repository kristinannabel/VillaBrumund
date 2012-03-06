<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

			<?php
				if(is_page('Hjem')){ ?>
					<div id="post-<?php the_ID() ?>" class="home <?php sandbox_post_class() ?>">
				<?php }
				else { ?>
			<div id="post-<?php the_ID() ?>" class="other <?php sandbox_post_class() ?>">
			<?php } ?>
			<?php
				if(is_page('Hjem')){
				}
				else{?>
					<h2 class="entry-title"><?php the_title() ?></h2>
				<?php } ?>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sandbox' ) . '&after=</div>' ) ?>

<?php edit_post_link( __( 'Edit', 'sandbox' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key+value of "comments" to enable comments on this page ?>


		</div><!-- #content -->
	</div><!-- #container -->
<?php if ( is_page('Leiligheter') ) {
	include ('sidebar1.php');
}
else if ( is_page('Historie') ) {
	include ('sidebar3.php');
}
else if ( is_page('Kontakt oss') ) {
	include ('sidebar4.php');
}
else if ( is_page('Nærmiljø') ) {
	include ('sidebar5.php');
}
else if ( is_child(4) ) {
	if ( is_page('Leilighet 2B') ) {
		include ('sidebar2.php');
	}
	else if ( is_page('Leilighet 1A') ) {
		include ('sidebar6.php');
	}
	else if ( is_page('Leilighet 1B') ) {
		include ('sidebar7.php');
	}
	else if ( is_page('Leilighet 1C') ) {
		include ('sidebar8.php');
	}
	else if ( is_page('Leilighet 2A') ) {
		include ('sidebar9.php');
	}
	else if ( is_page('Leilighet 2C') ) {
		include ('sidebar10.php');
	}
	else if ( is_page('Leilighet 3A') ) {
		include ('sidebar11.php');
	}
	else if ( is_page('Leilighet 3B') ) {
		include ('sidebar12.php');
	}
	else if ( is_page('Leilighet 3C') ) {
		include ('sidebar13.php');
	}
	else if ( is_page('Leilighet 4A') ) {
		include ('sidebar14.php');
	}
	else if ( is_page('Leilighet 4B') ) {
		include ('sidebar15.php');
	}
	else if ( is_page('Leilighet 4C') ) {
		include ('sidebar16.php');
	}
	else {
		include ('sidebar2.php');
	}
}
else {

} ?>
<?php get_footer() ?>