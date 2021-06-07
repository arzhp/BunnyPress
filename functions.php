<?php

function bunnypresslite_text_domain(){
	load_theme_textdomain( 'bunnypresslite', get_template_directory() . '/languages' );
}
add_action('after_setup_theme', 'bunnypresslite_text_domain');

if ( ! function_exists( 'bunnypresslite_generator' ) ){
	function bunnypresslite_generator() {
		echo '<meta name="generator" content="' .  esc_html( wp_get_theme()->name . ' ' .  wp_get_theme()->version ) . '" />' . "\n";
	}
	add_action( 'wp_head', 'bunnypresslite_generator' );
}

if ( ! function_exists( 'bunnypresslite_theme_support' ) ){
	function bunnypresslite_theme_support() {
	
		add_theme_support( 'title-tag' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		if ( function_exists( 'register_nav_menus' ) ) {
	  		register_nav_menus(
	  			array(
	  				'header-menu' => __( 'Header Menu', 'bunnypresslite' ),
	  				'header-menu-sp' => __( 'Header Menu for SP only', 'bunnypresslite' ),
	  				'footer-menu' => __( 'Footer Menu', 'bunnypresslite' ),
	  			)
	  		);
		}	
		add_theme_support( 'custom-logo', array(
			'flex-width' => true,
		) );
		add_theme_support( 'custom-background' );
		$args = array(
			'flex-width'    => true,
			'flex-width'    => true,
		);
		add_theme_support( 'custom-header', $args );

	}
}
add_action( 'after_setup_theme', 'bunnypresslite_theme_support' );

function bunnypresslite_widgets_init() {

	register_sidebar(array(
		'name' => __( 'Sidebar', 'bunnypresslite' ),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="sidebox %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="bunnypresslite_s_h3"><h3 class="bunnypresslite_2line"><span>',
		'after_title' => '</span></h3></div>',
	));

	register_sidebar(array(
		'name' => __( 'Content top', 'bunnypresslite' ),
		'id' => 'sidebar-2',
		'description' => __( 'Ideal for displaying bread crumbs.', 'bunnypresslite' ),
		'before_widget' => '<div id="%1$s" class="contenttop %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));


	register_sidebar(array(
		'name' => __( 'Article Content Top', 'bunnypresslite' ),
		'id' => 'sidebar-3',
		'description' => __( 'It is displayed directly top of the article.', 'bunnypresslite' ),
		'before_widget' => '<div class="" id="%1$s" class="article_content_top %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Article Content bottom', 'bunnypresslite' ),
		'id' => 'sidebar-4',
		'description' => __( 'It is displayed directly under the article.', 'bunnypresslite' ),
		'before_widget' => '<div id="%1$s" class="contentbottom %2$s">',
		'after_widget' => '</div><div class="clear"></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'name' => __( 'Footer', 'bunnypresslite' ),
		'id' => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4><span>',
		'after_title' => '</span></h4>',
	));

}
add_action( 'widgets_init','bunnypresslite_widgets_init' );

if ( !function_exists( 'bunnypresslite_excerpt_length' ) ) {
	function bunnypresslite_excerpt_length( ) {
		if ( is_admin() ) return;
		$custom = absint( get_theme_mod( 'bunnypresslite_custom_excerpt_length', '90' ) );
		if ( $custom ){
			return $custom;
		}
		return 90;
	}
}
add_filter( 'excerpt_length', 'bunnypresslite_excerpt_length' );

if ( !function_exists( 'bunnypresslite_custom_tag_cloud' ) ) {
	function bunnypresslite_custom_tag_cloud($args) {
		$myargs = array(
		'smallest' => 9, 
		'largest' => 9,
		);
		$args = wp_parse_args($args, $myargs);
		return $args;
	}
}
add_filter( 'widget_tag_cloud_args', 'bunnypresslite_custom_tag_cloud' );

if ( !function_exists( 'bunnypresslite_page_navi' ) ) {
	function bunnypresslite_page_navi() {
		$pagination = get_the_posts_pagination( array( 'mid_size' => 1 ) );
		$pagination = str_replace(' role="navigation"', '', $pagination);
	
		$allowed_html = array(
			'a' => array( 'href' => array (), 'class' => array (), 'target' => array(), 'class' => array () ),
			'div' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
			'span' => array( 'style' => array (), 'class' => array (), 'aria-current' => array () ),
			'h2' => array( 'style' => array (), 'class' => array () ),
			'nav' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
		);
	
		echo wp_kses( $pagination, $allowed_html );
	}
}

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-add.php';

if ( !function_exists( 'bunnypresslite_content_width' ) ) {
	function bunnypresslite_content_width() {

		$bunnypresslite_content_width = str_replace(array('width','full'),array('','1400'),bunnypresslite_max_content_width());
		$cd = '';

		if( bunnypresslite_layout() == 'one' ) {
			$cd = $bunnypresslite_content_width - 30;
		}else{
			$cd = $bunnypresslite_content_width - 390;
		}
		
		return $cd;
	}
}
$content_width = bunnypresslite_content_width();

if ( !function_exists( 'bunnypresslite_category_id_class' ) ) {
	function bunnypresslite_category_id_class($bunnypresslite_classes) {
		global $post;
		if( $post && !is_search() && !is_404() ) { 
			foreach((get_the_category($post->ID)) as $category)
			$bunnypresslite_classes [] = 'cat-' . $category->cat_ID . '-id';
		}
		return $bunnypresslite_classes;
	}
}
add_filter('post_class', 'bunnypresslite_category_id_class');
add_filter('body_class', 'bunnypresslite_category_id_class');

if ( !function_exists( 'bunnypresslite_has_thumb_class' ) ) {
	function bunnypresslite_has_thumb_class($bunnypresslite_classes) {
		global $post;
		if( has_post_thumbnail($post->ID) ) { $bunnypresslite_classes[] = 'has_thumb'; }
			return $bunnypresslite_classes;
	}
}
add_filter('post_class', 'bunnypresslite_has_thumb_class');

if ( !function_exists( 'bunnypresslite_custom_comments_list' ) ) {
function bunnypresslite_custom_comments_list($bunnypresslite_comment, $bunnypresslite_args, $bunnypresslite_depth){?>
<li <?php comment_class('comment-body'); ?> id="li-comment-<?php comment_ID() ?>">
<div class="bunnypresslite_comment" id="comment-<?php comment_ID() ?>">
<?php if( !get_theme_mod('bunnypresslite_comment_name','') ){ ?><div class="comment-auther"><?php if(function_exists('get_avatar')) echo get_avatar($bunnypresslite_comment, '36'); comment_author_link(); ?><?php edit_comment_link( __('Edit Comment', 'bunnypresslite'), '<span class="editlink_comment">', '</span>' ); ?></div><?php } ?>
<div class="comment-date"><?php comment_date(); ?> <?php comment_time(); ?></div>
<?php if ($bunnypresslite_comment->comment_approved == '0') echo '<p class="waiting-for-approval">' . esc_html_e('Your comment is awaiting approval.','bunnypresslite') . '</p>';?>
<div class="comment-text"><?php comment_text(); ?></div>
<div class="reply"><?php comment_reply_link(array_merge( $bunnypresslite_args, array('depth' => $bunnypresslite_depth, 'reply_text' => __( 'Reply', 'bunnypresslite' ), 'before' => '', 'after' => '') ) ); ?></div>
</div><?php }
}

if ( !function_exists( 'bunnypresslite_custom_pings_list' ) ) {
	function bunnypresslite_custom_pings_list($bunnypresslite_comment, $bunnypresslite_args, $bunnypresslite_depth) {?>
	<li <?php comment_class('comment-body'); ?> id="li-comment-<?php comment_ID() ?>">
	<div class="bunnypresslite_comment" id="comment-<?php comment_ID(); ?>">
	<div class="comment-auther"><?php esc_html_e( 'Pingback: ', 'bunnypresslite' ); comment_author_link(); ?><?php edit_comment_link( __('Edit Pingback', 'bunnypresslite'), '<span class="editlink_comment">', '</span>' ); ?></div><?php 
		if( strstr( get_comment_text(),'<strong>') ) {

			$bunnypresslite_track_con = str_replace( array("\r\n","\n","\r"), '', get_comment_text() );
			preg_match('|<strong>(.*?)</strong>|s', $bunnypresslite_track_con , $bunnypresslite_gettrck_t );

			?><div class="trackback-text"><?php echo esc_html( $bunnypresslite_gettrck_t[1] ); ?></div>

		<?php }else{
		comment_excerpt();
		}
	echo '</div>';
	}
}

if ( !function_exists( 'bunnypresslite_list_categories' ) ) {
	function bunnypresslite_list_categories( $bunnypresslite_linkindata ) {
		$bunnypresslite_linkindata = preg_replace('/<\/a>\s*\((\d+)\)/',' ($1)</a>',$bunnypresslite_linkindata);
		return $bunnypresslite_linkindata;
	}
}
add_filter( 'wp_list_categories', 'bunnypresslite_list_categories', 10, 2 );

if ( !function_exists( 'bunnypresslite_archives_link' ) ) {
	function bunnypresslite_archives_link( $bunnypresslite_linkindata ) {
		$bunnypresslite_linkindata = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$bunnypresslite_linkindata);
		return $bunnypresslite_linkindata;
	}
}
add_filter( 'get_archives_link', 'bunnypresslite_archives_link' );

if ( !function_exists( 'bunnypresslite_editor_style' ) ) {
	function bunnypresslite_editor_style(){
		add_theme_support( 'editor-styles' );
		add_editor_style( 'css/editor-style.css' );
	}
}
add_action('after_setup_theme', 'bunnypresslite_editor_style');

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'bunnypresslite_Custom_Content' ) ) : 

class bunnypresslite_Custom_Content extends WP_Customize_Control {

	public $content = ''; 
 	public function render_content() { 

	$allowed_html = array(
		'a' => array( 'href' => array (), 'onclick' => array (), 'target' => array() ),
		'div' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
		'p' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
		'span' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
		'br' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
		'h2' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
		'h3' => array( 'style' => array (), 'class' => array (), 'align' => array () ),
	);

 		if ( isset( $this->content ) ) { 
 			echo wp_kses( $this->content , $allowed_html ); 
 		} 
	} 
} 
endif;

if ( !function_exists( 'bunnypresslite_singular_thumbnail' ) ) {
	function bunnypresslite_singular_thumbnail(){
		$allowed_tag = array( 'img' => array( 'loading' => array (), 'id' => array (), 'class' => array (), 'style' => array (), 'itemprop' => array (), 'src' => array (), 'data-src' => array (), 'srcset' => array (), 'width' => array (), 'height' => array (), 'alt' => array (), 'title' => array (), ));
		$pattern = '/<img([^>]+?)\/?>/i';
		$replacement = '<img$1itemprop="image" />';
		echo wp_kses( preg_replace($pattern, $replacement, get_the_post_thumbnail()) , $allowed_tag);
	}
}

if ( !function_exists( 'bunnypresslite_noimg' ) ) {
	function bunnypresslite_noimg(){
		$allowed_tag = array( 'img' => array( 'loading' => array (), 'id' => array (), 'class' => array (), 'style' => array (), 'itemprop' => array (), 'src' => array (), 'data-src' => array (), 'srcset' => array (), 'width' => array (), 'height' => array (), 'alt' => array (), 'title' => array (), ));
		$noimg = '<img src="' . esc_url( get_template_directory_uri() . '/images/noimg.jpg' ) . '" alt="' . esc_attr__('Noimg', 'bunnypresslite') . '" width="400" height="300" loading="lazy" />';
		echo wp_kses( $noimg, $allowed_tag );
	}
}

if ( !function_exists( 'bunnypresslite_thumbnail_url' ) ) {
	function bunnypresslite_thumbnail_url(){
		$thumbnail_id = get_post_thumbnail_id();
		$thumbnail = wp_get_attachment_image_src( $thumbnail_id , 'medium' );
		return $thumbnail[0];
	}
}

if ( !function_exists( 'bunnypresslite_previous_post_link' ) ) {
	function bunnypresslite_previous_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
		bunnypresslite_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, true, $maxlen);
	}
}
if ( !function_exists( 'bunnypresslite_next_post_link' ) ) {
	function bunnypresslite_next_post_link($maxlen = -1, $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
		bunnypresslite_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, false);
	}
}
if ( !function_exists( 'bunnypresslite_adjacent_post_link' ) ) {
	function bunnypresslite_adjacent_post_link($bunnypresslite_maxlen = -1, $bunnypresslite_format='&laquo; %link', $bunnypresslite_link='%title', $bunnypresslite_in_same_cat = false, $bunnypresslite_excluded_categories = '', $bunnypresslite_previous = true) {
	
		if ( $bunnypresslite_previous && is_attachment() ){
			$bunnypresslite_post = & get_post($GLOBALS['post']->post_parent);
		}else{
			$bunnypresslite_post = get_adjacent_post($bunnypresslite_in_same_cat, $bunnypresslite_excluded_categories, $bunnypresslite_previous);
		}
	
		if ( !$bunnypresslite_post ) return;
	
		$tCnt = mb_strlen( $bunnypresslite_post->post_title, get_bloginfo('charset') );
	
		if(($bunnypresslite_maxlen > 0)&&($tCnt > $bunnypresslite_maxlen)) {
			$title = mb_substr( $bunnypresslite_post->post_title, 0, $bunnypresslite_maxlen, get_bloginfo('charset') ) . '[...]';
		} else {
			$title = $bunnypresslite_post->post_title;
		}
	
		if ( empty($bunnypresslite_post->post_title) ) $title = $bunnypresslite_previous ? __('Previous Post','bunnypresslite') : __('Next Post','bunnypresslite');
		
		$title = apply_filters('the_title', $title, $bunnypresslite_post->ID);
		$date = mysql2date(get_option('date_format'), $bunnypresslite_post->post_date);
		$rel = $bunnypresslite_previous ? 'prev' : 'next';
	
		$string = '<a href="'. esc_url( get_permalink($bunnypresslite_post) ) .'" rel="'.$rel.'">';
		$bunnypresslite_link = str_replace('%title', $title, $bunnypresslite_link);
		$bunnypresslite_link = str_replace('%date', $date, $bunnypresslite_link);
		$bunnypresslite_link = $string . $bunnypresslite_link . '</a>';
		$bunnypresslite_format = str_replace('%link', $bunnypresslite_link, $bunnypresslite_format);

		$allowed_html = array(
			'a' => array( 'id' => array (), 'class' => array (), 'href' => array (), 'onclick' => array (), 'target' => array() ),
			'div' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
			'img' => array( 'loading' => array (), 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array (), 'src' => array (), 'data-src' => array (), 'data-lazy-src' => array (), 'border' => array (), 'width' => array (), 'height' => array (), 'alt' => array () ),
			'p' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
			'span' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
			'noscript' => array( ),
		);

		echo wp_kses( $bunnypresslite_format , $allowed_html );
	
	}
}


function bunnypresslite_archive_title( $title ){
	if ( is_category() ) {
		/* translators: %s: category term */
		$title = sprintf( esc_html__( 'Category Archives: %s','bunnypresslite' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		/* translators: %s: tag term */ 
		$title = sprintf( esc_html__( 'Tag Archives: %s','bunnypresslite' ) , '<span>' . single_tag_title( '', false ) . '</span>' );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title('',false);
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	}
return $title;
}
add_filter( 'get_the_archive_title', 'bunnypresslite_archive_title' );

if ( !function_exists( 'bunnypresslite_get_title' ) ) {
	function bunnypresslite_get_title() {
		if(is_front_page() || is_home() || is_404()) {
			$bunnypresslite_title = sprintf( str_replace('<t>','%s',bunnypresslite_title_top()) , get_bloginfo( 'name' ) );
		}elseif(is_singular()) {
			$bunnypresslite_title = get_the_title();
		}elseif(is_category() || is_tag()  || is_tax() ) {
			$bunnypresslite_title = strip_tags( get_the_archive_title( '' , false ) );
		}elseif(is_author()) {
			$bunnypresslite_title = get_the_author_meta('display_name', get_query_var('author') );
		}elseif(is_archive()) {
			$bunnypresslite_title = get_the_archive_title( '' , false );
		}elseif(is_search()) {
			/* translators: %s: search term */
			$bunnypresslite_title = sprintf( esc_html__( 'Search results for "%s"','bunnypresslite' ), get_search_query( '',false ) );
		}else{
			$bunnypresslite_title = sprintf( str_replace('<t>','%s',bunnypresslite_title_top()) , get_bloginfo( 'name' ) );
		}
		return $bunnypresslite_title;
	}
}

if ( !function_exists( 'bunnypresslite_get_url' ) ) {
	function bunnypresslite_get_url() {
		if(is_front_page() || is_home() || is_404()) {
			$bunnypresslite_url = home_url( '/' );
		}elseif(is_singular()) {
			$bunnypresslite_url = get_permalink();
		}elseif(is_category() || is_tag()  || is_tax() ) {
			if( is_category() ) { $bunnypresslite_url = get_category_link( get_query_var('cat') ); }
			elseif( is_tag() ) { $bunnypresslite_url = get_tag_link( get_query_var('tag_id') ); }
			else{ $bunnypresslite_url = home_url( '/' ); }
		}elseif(is_author()) {
			$bunnypresslite_url = get_author_posts_url( get_query_var('author') );
		}elseif(is_archive()) {
			if( is_post_type_archive() ) { $bunnypresslite_url = get_post_type_archive_link( get_post_type() ); }
			if( is_day() ) { $bunnypresslite_url = get_day_link( get_query_var('year'), get_query_var('monthnum'), get_query_var('day') ); }
			if( is_month() ) { $bunnypresslite_url = get_month_link( get_query_var('year'), get_query_var('monthnum') ); }
			if( is_year() ) { $bunnypresslite_url = get_year_link( get_query_var('year') ); }
		}elseif(is_search()) {
			$bunnypresslite_url = get_search_link( );
		}else{
			$bunnypresslite_url = home_url( '/' );
		}
		return $bunnypresslite_url;
	}
}

if ( !function_exists( 'bunnypresslite_header_description_set' ) ) {
	function bunnypresslite_header_description_set(){
		echo '<div class="bunnypresslite_desc">';
		if( bunnypresslite_display_header_description_type() == '3' ){
			if ( is_front_page() ) {
				bloginfo( 'description' );
			} elseif ( is_tag() || is_category() || is_author() ) {
				/* translators: %s: term */
				echo sprintf( esc_html__( 'Page of "%s".', 'bunnypresslite') , wp_kses_post( get_the_archive_title( '' , false ) ) );
			}  elseif ( is_404() ) {
				esc_html_e( 'The page could not be found.' , 'bunnypresslite');
			} elseif ( is_archive() ) {
				/* translators: %s: archive term */
				echo sprintf( esc_html__( '%s archive page.', 'bunnypresslite'), wp_kses_post( get_the_archive_title( '' , false ) ) );
			} elseif ( is_search() ) {
				/* translators: %s: search term */
				printf( esc_html__( 'Search results for "%s"','bunnypresslite' ), get_search_query( '',false ) );
			} elseif ( is_single() or is_page() ) {
				/* translators: %s: search term */
				echo sprintf( esc_html__( 'Page of "%s".', 'bunnypresslite'), wp_kses_post( get_the_title() ) );
			} else {
				bloginfo( 'description' ); 
			}
			/* translators: %s: page number */
			if(get_query_var('paged') > 0 ) echo sprintf( esc_html__( 'Page of %s.', 'bunnypresslite'), esc_html( get_query_var('paged') ) );	
	
		}else{
			bloginfo( 'description' );
		}
		echo '</div>';
	}
}

if ( !function_exists( 'bunnypresslite_scripts' ) ) {
	function bunnypresslite_scripts() {

		$time = wp_get_theme( get_template() )->Version;

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bunnypresslite_script_js', get_template_directory_uri() . '/js/index.js', array(), $time, true );
		if( is_singular() && comments_open() ) wp_enqueue_script('comment-reply');
		wp_enqueue_style( 'bunnypresslite_style', get_template_directory_uri() . '/css/firstveiw.css', array(), $time );
		if( has_nav_menu( 'header-menu' ) ) wp_enqueue_style( 'bunnypresslite_header-menu', get_template_directory_uri() . '/css/header_menu.css', array(), $time );
		if( bunnypresslite_display_totop() != 'totop4' ) wp_enqueue_style( 'totop', get_template_directory_uri() . '/css/totop.css', array(), $time );
		wp_enqueue_style('dashicons');

		wp_register_style('bunnypresslite_notosansjp', 'https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap');
		wp_register_style('bunnypresslite_mplus1p', 'https://fonts.googleapis.com/css?family=M+PLUS+1p&display=swap');
		wp_register_style('bunnypresslite_notoserifjp', 'https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap');
		wp_register_style('bunnypresslite_sawarabimincho', 'https://fonts.googleapis.com/css?family=Sawarabi+Mincho&display=swap');
		wp_register_style('bunnypresslite_mplusrounded1c', 'https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap');
		wp_register_style('bunnypresslite_sawarabigothic', 'https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap');
		wp_register_style('bunnypresslite_kusugimaru', 'https://fonts.googleapis.com/css?family=Kosugi+Maru&display=swap');
		wp_register_style('bunnypresslite_kusugi', 'https://fonts.googleapis.com/css?family=Kosugi&display=swap');

		if ( bunnypresslite_ff() == 1 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_notosansjp');
		if ( bunnypresslite_ff() == 2 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_mplus1p');
		if ( bunnypresslite_ff() == 3 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_notoserifjp');
		if ( bunnypresslite_ff() == 4 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_sawarabimincho');
		if ( bunnypresslite_ff() == 5 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_mplusrounded1c');
		if ( bunnypresslite_ff() == 6 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_sawarabigothic');
		if ( bunnypresslite_ff() == 7 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_kusugimaru');
		if ( bunnypresslite_ff() == 8 || isset( $_GET['customize_changeset_uuid'] )) wp_enqueue_style('bunnypresslite_kusugi');

		if( bunnypresslite_footerwidget() == '2') wp_enqueue_style( 'bunnypresslite_style_fw', get_template_directory_uri() . '/css/fw2.css', array(), $time );
		if( bunnypresslite_footerwidget() == '3') wp_enqueue_style( 'bunnypresslite_style_fw', get_template_directory_uri() . '/css/fw3.css', array(), $time );
		if( bunnypresslite_footerwidget() == '4') wp_enqueue_style( 'bunnypresslite_style_fw', get_template_directory_uri() . '/css/fw4.css', array(), $time );
		if( bunnypresslite_footerwidget() == '5') wp_enqueue_style( 'bunnypresslite_style_fw', get_template_directory_uri() . '/css/fw5.css', array(), $time );

	}
}
add_action( 'wp_enqueue_scripts', 'bunnypresslite_scripts' );


if ( !function_exists( 'bunnypresslite_customizer_style' ) ) {
	function bunnypresslite_customizer_style() {
		wp_enqueue_style( 'bunnypresslite_customizer_style', get_template_directory_uri().'/css/customizer.css' );
	}
}
add_action( 'customize_controls_enqueue_scripts', 'bunnypresslite_customizer_style' );


if ( !function_exists( 'bunnypresslite_admin_post_style' ) ) {
	function bunnypresslite_admin_post_style(){
		wp_enqueue_style( 'bunnypresslite_admin_style', get_template_directory_uri() . '/css/admin.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'bunnypresslite_admin_post_style' );