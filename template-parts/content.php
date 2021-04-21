<?php
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
 if ( is_singular() ) : the_title( '<h1 class="entry-title">', '</h1>' ); else : the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); endif; if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
 blanksmall_posted_on(); blanksmall_posted_by(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php blanksmall_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
 the_content( sprintf( wp_kses( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'blanksmall' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blanksmall' ), 'after' => '</div>', ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php blanksmall_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->