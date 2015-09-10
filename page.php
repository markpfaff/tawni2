<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package tawnieakman
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="breadcrumb">
                <h1>oh hi</h1>
                    
            <?php 
            // if there is a parent, display the link
            $parent_title = get_the_title( $post->post_parent );
            if ( $parent_title != the_title( ' ', ' ', false ) ) {
                echo '<a href="' . get_permalink( $post->post_parent ) . '" title="' . $parent_title . '">' . $parent_title . '</a> » ';
            } 
            // then go on to the current page link
            ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?></a> »
            </div>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); //removes sidebar on main page ?>

<?php if( is_page( '15' )){//page id 15 is about 
    
    get_sidebar('about');//About sidebar is created in functions.php under register_sidebar
    
    }elseif( is_page( '13') || is_page('Portrait') || is_page('Lifestyle') || is_page('11') || is_page('7')){//page id 26 is portrait page
    
    get_sidebar('portfolio');
   
    }
?>        
        
<?php get_footer(); ?>
