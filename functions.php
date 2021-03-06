<?php
/**
 * tawnieakman functions and definitions
 *
 * @package tawnieakman
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'tawnieakman_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tawnieakman_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tawnieakman, use a find and replace
	 * to change 'tawnieakman' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'tawnieakman', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tawnieakman' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tawnieakman_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // tawnieakman_setup
add_action( 'after_setup_theme', 'tawnieakman_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tawnieakman_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'tawnieakman' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
        ) );
	register_sidebar( array(
		'name'          => __( 'About', 'tawnieakman' ),
		'id'            => 'sidebar-2',
		'description'   => 'About Tawni Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
        register_sidebar( array(
		'name'          => __( 'Portfolio', 'tawnieakman' ),
		'id'            => 'sidebar-3',
		'description'   => 'Portfolio Sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'tawnieakman_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tawnieakman_scripts() {
	wp_enqueue_style( 'tawnieakman-style', get_stylesheet_uri() );
 
        wp_enqueue_style( 'tawnieakman-sidebar-content', get_template_directory_uri() . '/layouts/sidebar-content.css');
        
//        wp_enqueue_style( 'tawnieakman-supersized', get_template_directory_uri() . '/inc/supersized.css');
        
//        wp_enqueue_script( 'tawnieakman-supersized-js', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array('jquery'), '20141211', true );
       
        wp_enqueue_style( 'tawnieakman-google-fonts', 'http://fonts.googleapis.com/css?family=Libre+Baskerville');
        
        wp_enqueue_style( 'tawnieakman-font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

	wp_enqueue_script( 'tawnieakman-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
        //^^true will load in footer which is usually what you want, false is header
        //20120206 is version number
        
        wp_enqueue_script( 'tawnieakman-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20141211', true );

	wp_enqueue_script( 'tawnieakman-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

        	      //Enqueue jQuery first
	wp_enqueue_script('jquery');
	      // Enqueue your jQuery resize file
	wp_enqueue_script('resize', get_template_directory_uri().'/js/jquery.ez-bg-resize.js', array( 'jquery' ), '1.0');
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tawnieakman_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function add_flexslider() { 
	
	$attachments = get_children(array('post_parent' => get_the_ID(), 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image','caption' => $attachment->post_excerpt, 'description' => $attachment->post_content, ));
	
	if ($attachments) { // see if there are images attached to posting ?>
        
    <!-- Begin Slider --> 
    <div class="flexslider">
    <ul class="slides">
    
    <?php // create the list items for images with captions
    
    foreach ( $attachments as $attachment_id => $attachment ) { 
	
		$theImage = wp_get_attachment_image($attachment_id, 'full');
		$theBlockquote = get_post_field('post_excerpt', $attachment->ID);
		$theLink = get_post_field('post_content', $attachment->ID);
    
		/*$key = "buy-tickets-button";
		$value = get_post_meta($post->ID, $key, true);*/
	
        echo '<li>';
		
		if (is_page('portrait-2')) { // use full size image for home page
			
        	echo $theImage;
			echo '<blockquote class="home">&ldquo;'.$theBlockquote.'&rdquo;</blockquote>';
			echo '<a href="'.$theLink.'"><button class="home">Learn More&nbsp;&raquo;</button></a>';
			
		}
		
		else { // use large size image for all other pages & posts
			
			echo wp_get_attachment_image($attachment_id, 'large');
			echo '<p>';
			echo get_post_field('post_excerpt', $attachment->ID);
			echo '</p>';
			
			/*if (!empty($value)) {
	
			echo '<a href="'.$value.'"><button class="buy-tickets">Buy Tickets&nbsp;&raquo;</button></a>';
			}*/
			
		}
      
        echo '</li>';
        
    } ?>
    
    </ul>
    </div>
    <!-- End Slider -->
        
	<?php } // end see if images
	
} // end add flexslider