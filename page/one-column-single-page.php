<?php
/*
Template Name: One Column
Template Post Type: post
*/
get_header(); ?>
<div class="contents">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		<article itemscope itemtype="https://schema.org/Article">
		<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
		<h1 itemprop="headline name"><?php the_title(); ?></h1>
		<?php if ( bunnypresslite_display_single_category() ) { ?><span class="singlecat"><?php the_category(' '); ?></span><?php }
		if ( bunnypresslite_display_single_author() ) { ?><span class="metaauthor" itemprop="author" itemscope itemtype="https://schema.org/Person"><?php echo '<a itemprop="url" href="' . esc_url( get_author_posts_url( get_the_author_meta('ID') ) ) . '" rel="author"><span itemprop="name">'; the_author_meta('nickname'); echo '</span></a>'; ?></span><?php }else{ ?><span itemprop="author" itemscope itemtype="https://schema.org/Person"><meta itemprop="url" content="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) );?>"><meta itemprop="name" content="<?php the_author_meta('nickname');?>"></span><?php }?>
		
		<?php if ( bunnypresslite_display_single_update() && get_the_modified_date('Y-m-d') != get_the_time('Y-m-d') ) { ?>
			<span class="modifi" itemprop="dateModified" content="<?php the_modified_date( 'Y-m-d' );?>"><?php the_modified_date( get_option( 'date_format' ) );?></span>
		<?php }else{ ?>
			<meta itemprop="dateModified" content="<?php the_modified_date( 'Y-m-d' ); ?>">
		<?php }?>

		<?php if ( bunnypresslite_display_single_date() ) { ?>
			<span class="publish" itemprop="datePublished" content="<?php the_time( 'Y-m-d' );?>"><?php the_time( get_option( 'date_format' ) );?></span>
		<?php }else{ ?>
			<meta itemprop="datePublished" content="<?php the_time( 'Y-m-d' );?>">
		<?php }?>

		<div class="clear"></div>

		<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
			<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<?php if( has_custom_logo() ) {?>
				<meta itemprop="url" content="<?php echo esc_url( substr(get_custom_logo(),$of=strpos(get_custom_logo(),'src="')+5,strpos(get_custom_logo(),'" class="custom-logo"')-$of) );?>">
				<meta itemprop="width" content="<?php echo absint( substr(get_custom_logo(),$of=strpos(get_custom_logo(),'width="')+7,strpos(get_custom_logo(),'"')-$of) );?>">
				<meta itemprop="height" content="<?php echo absint( substr(get_custom_logo(),$of=strpos(get_custom_logo(),'height="')+8,strpos(get_custom_logo(),'"')-$of) ); ?>">
				<?php } else {?>
				<meta itemprop="url" content="<?php echo esc_url( get_template_directory_uri() . '/images/bunnypresslite.png' ); ?>">
				<meta itemprop="width" content="100">
				<meta itemprop="height" content="100">
				<?php } ?>
			</div>
		</div>

		<?php if( has_post_thumbnail() && bunnypresslite_display_single_thumbnail() ){
			echo '<div class="bunnypresslite_content_thum">';
			bunnypresslite_singular_thumbnail();
			echo '</div>'; 
		}elseif( has_post_thumbnail() && !bunnypresslite_display_single_thumbnail() ){
			echo '<meta itemprop="image" content="' . esc_url( bunnypresslite_thumbnail_url() ) . '">';
		}else{
			echo '<meta itemprop="image" content="' . esc_url( get_template_directory_uri() . '/images/noimg.jpg' ) . '">';
		}?>
		<div itemprop="articleBody" class="post-content">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
		<?php the_content(); ?>
		<div class="clear"></div>
		</div>
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
		if( isset( $bunnypresslite_nextlink )  ) echo wp_kses_post( $bunnypresslite_nextlink );
		echo '</div></nav>';
	}

		dynamic_sidebar( 'sidebar-4' );


		if( has_tag() ) { ?>
			<div class="taglist right"><?php the_tags( __('<span>Tags: </span>','bunnypresslite') ,'','' ); ?></div>
			<div class="clear"></div>
		<?php } ?>


		</article>
	</div>
	<?php comments_template( '', true );

	if ( bunnypresslite_display_single_pagenav() ) {

		$bunnypresslite_prevpost = get_previous_post();
		$prevThumbnail = '';
		$prevclass = '<p>';
		if( $bunnypresslite_prevpost ) {
			$prevThumbnail = get_the_post_thumbnail($bunnypresslite_prevpost->ID, array(90,90) );
		}
		if( empty($prevThumbnail) ) $prevclass = '<p class="bunnypresslite_noimg_prev">';

		$bunnypresslite_nextpost = get_next_post();
		$nextThumbnail = '';
		$nextclass = '<p>';
		if( $bunnypresslite_nextpost ) {
			$nextThumbnail = get_the_post_thumbnail($bunnypresslite_nextpost->ID, array(90,90), array( 'src' ) );
		}
		if( empty($nextThumbnail) ) $nextclass = '<p class="bunnypresslite_noimg_next">';

		$bunnypresslite_center_border = '';
		if( !get_previous_post() ) $bunnypresslite_center_border = ' bunnypresslite_center_border';

		if( get_next_post() || get_previous_post() ){?>
		<div id="pagenavi" class="newer-older">
			<div class="older"><?php bunnypresslite_previous_post_link( 43,'%link',$prevThumbnail.$prevclass.'%title</p>' ) ?></div>
			<div class="newer<?php echo esc_attr($bunnypresslite_center_border) ?>"><?php bunnypresslite_next_post_link( 43, '%link', $nextclass.'%title</p>' . $nextThumbnail) ?></div>
		</div>
	<?php }
	}
	endwhile; ?>
</div>
<?php get_footer(); ?>
