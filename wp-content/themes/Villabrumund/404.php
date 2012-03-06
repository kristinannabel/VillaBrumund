<?php get_header() ?>

	<div id="container">
		<div id="content">

			<div id="post-0" class="post error404 not-found">
				<h2 class="entry-title"><?php _e( 'Feilmelding 404 - Siden finnes ikke', 'sandbox' ) ?></h2>
				<div class="entry-content">
					<p><?php _e( 'Beklager, vi kunne ikke finne siden du ser etter. Det kan skyldes at siden har flyttet, fått ny adresse eller ikke eksisterer. Kanskje vil det hjelpe å søke.', 'sandbox' ) ?>
				</div>
				<form id="searchform-404" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
						<input class="button" type="submit" value="<?php _e( 'Søk', 'sandbox' ) ?>" />
					</div>
				</form>
			</div><!-- .post -->

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_footer() ?>