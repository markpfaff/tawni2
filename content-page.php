<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package tawnieakman
 */
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tawnieakman' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

    <h1>content-page</h1>
</article><!-- #post-## -->

<?php add_flexslider();?>
 
