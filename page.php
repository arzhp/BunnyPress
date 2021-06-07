<?php get_header();?>
<div class="contents">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>

	<?php

		echo '<article itemscope itemtype="https://schema.org/WebPage">';

		if( is_front_page() ) {
			echo '<h2 class="bunnypresslite_fp_h">';
			the_title();
			echo '</h2>';
		}else{
			echo '<h1 itemprop="headline name">';
			the_title();
			echo '</h1>';
		}

			if ( bunnypresslite_display_page_author() ) { ?><span class="metaauthor" itemprop="author" itemscope itemtype="https://schema.org/Person"><?php echo '<a itemprop="url" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '" rel="author"><span itemprop="name">'; the_author_meta('nickname'); echo '</span></a>'; ?></span><?php }else{ ?><div itemprop="author" itemscope itemtype="https://schema.org/Person"><meta itemprop="url" content="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) );?>"><meta itemprop="name" content="<?php the_author_meta('nickname');?>"></div><?php }?>

		<?php if ( bunnypresslite_display_page_update() && get_the_modified_date('Y-m-d') != get_the_time('Y-m-d') ) { ?>
			<span class="modifi" itemprop="dateModified" content="<?php the_modified_date( 'Y-m-d' );?>"><?php the_modified_date( get_option( 'date_format' ) );?></span>
		<?php }else{ ?>
			<meta itemprop="dateModified" content="<?php the_modified_date( 'Y-m-d' ); ?>">
		<?php }?>

		<?php if ( bunnypresslite_display_page_date() ) { ?>
			<span class="publish" itemprop="datePublished" content="<?php the_time( 'Y-m-d' );?>"><?php the_time( get_option( 'date_format' ) );?></span>
		<?php }else{ ?>
			<meta itemprop="datePublished" content="<?php the_time( 'Y-m-d' );?>">
		<?php }?>

			<div class="clear"></div>

			<?php if( has_post_thumbnail() && bunnypresslite_display_page_thumbnail() ){
				echo '<div class="bunnypresslite_content_thum">';
					bunnypresslite_singular_thumbnail();
					echo '</div>'; 
				}elseif( has_post_thumbnail() && !bunnypresslite_display_page_thumbnail() ){
					echo '<meta itemprop="image" content="' . esc_url( bunnypresslite_thumbnail_url() ) . '">';
				}else{
					echo '<meta itemprop="image" content="' . esc_url( get_template_directory_uri() . '/images/noimg.jpg' ) . '">';
				}?>
			<div itemprop="mainContentOfPage" class="post-content page-content">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
				<?php the_content(); ?>
				<div class="clear"></div>

<?php

	$bunnypresslite_wplinknum = wp_link_pages( array(
		'before' =>'',
		'after' => '',
		'separator' => ' ',
 		'link_before' => '<span class="page-link">',
		'link_after' => '</span>',
		'echo' => 0
	));

	if( $bunnypresslite_wplinknum ) {

		$bunnypresslite_pagelink = wp_link_pages( array(
			'before' =>'',
			'after' => '',
	 		'link_before' => '',
			'link_after' => '',
			'separator' => '',
			'next_or_number' => 'next',
			'nextpagelink'     => 'next',
			'previouspagelink' => 'previous',
			'echo' => 0
		));

		preg_match_all('|<a href="(.*?)</a>|s', $bunnypresslite_pagelink, $bunnypresslite_get_pagelink);

		if( isset( $bunnypresslite_get_pagelink[0][0] ) ) {

			if( strstr($bunnypresslite_get_pagelink[0][0],'previous') ) {

				preg_match('|"(.*?)"|s', $bunnypresslite_get_pagelink[0][0], $bunnypresslite_get_previousurl);
			$bunnypresslite_previouslink = '<a href="' . esc_url( $bunnypresslite_get_previousurl[1] ) . '"><span class="page-link">' . __('&laquo; Previous page','bunnypresslite') . '</span></a> ';

			}elseif( strstr($bunnypresslite_get_pagelink[0][0],'next') ) {

				preg_match('|"(.*?)"|s', $bunnypresslite_get_pagelink[0][0], $bunnypresslite_get_nexturl);
				$bunnypresslite_nextlink = ' <a href="' . esc_url( $bunnypresslite_get_nexturl[1] ) . '"><span class="page-link">' . __('Next page &raquo;','bunnypresslite') . '</span></a>';

			}

		}

		if( isset( $bunnypresslite_get_pagelink[0][1] ) ) {

			if( strstr($bunnypresslite_get_pagelink[0][1],'next') ) {

				preg_match('|"(.*?)"|s', $bunnypresslite_get_pagelink[0][1], $bunnypresslite_get_nexturl);
				$bunnypresslite_nextlink = ' <a href="' . esc_url( $bunnypresslite_get_nexturl[1] ) . '"><span class="page-link">' . __('Next page &raquo;','bunnypresslite') . '</span></a>';

			}elseif ( strstr($bunnypresslite_get_pagelink[0][1],'previous') ) {

				preg_match('|"(.*?)"|s', $bunnypresslite_get_pagelink[0][1], $bunnypresslite_get_previousurl);
			$bunnypresslite_previouslink = '<a href="' . esc_url( $bunnypresslite_get_previousurl[1] ) . '"><span class="page-link">' . __('&laquo; Previous page','bunnypresslite') . '</span></a> ';

			}

		}

		echo '<nav class="center"><div class="page-links">';
		if( isset( $bunnypresslite_previouslink ) ) echo wp_kses_post( $bunnypresslite_previouslink );
		echo wp_kses_post( $bunnypresslite_wplinknum );
		if( isset( $bunnypresslite_nextlink ) ) echo wp_kses_post( $bunnypresslite_nextlink );
		echo '</div></nav>';
	}

		dynamic_sidebar( 'sidebar-4' );

?>
				</div>
			</article>

		</div>

		<?php comments_template( '', true ); ?>

	<?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
