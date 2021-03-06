<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package horvay-group
 */

?>

<article id="content" <?php post_class(); ?>>
	<div class="entry-header-wrapper">
		<header class="entry-header paper">
			<?php 
				the_title( '<h1 class="entry-title">', '</h1>' ); 
				the_excerpt();
			?>
		</header><!-- .entry-header -->
	</div>
	<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'horvay-group' ),
			'after'  => '</div>',
		) );
	?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'horvay-group' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
