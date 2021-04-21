<?php
 get_header(); ?>

	<main id="primary" class="site-main">

		<?php
 while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'page' ); if ( comments_open() || get_comments_number() ) : comments_template(); endif; endwhile; ?>

	</main><!-- #main -->

<?php
get_sidebar(); get_footer();