<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<?php wp_head(); ?>
</head>
<body id="bunnypresslite_top" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'bunnypresslite' ); ?></a>
<div>
<header>
<div class="bunnypresslite_header <?php echo esc_attr( bunnypresslite_max_content_width() ); ?>">
	<div id="header" itemscope itemtype="https://schema.org/Organization">
	<?php
	if( bunnypresslite_display_header_description() == '1' ) bunnypresslite_header_description_set();

	if( has_custom_logo() ) {
		echo '<div class="bunnypresslite_logo_title">';
		echo '<div class="bunnypresslite_logo">';
		if( is_front_page() || is_home() || is_404() ) {
			if( bunnypresslite_dst() ) echo '<h1>';
		}
		the_custom_logo();
		if( is_front_page() || is_home() || is_404() ) {
			if( bunnypresslite_dst() ) echo '</h1>';
		}
		echo '</div>';
	}
  if( !bunnypresslite_dst() ){
		echo '<div class="sitename" itemprop="name">';
		if( is_front_page() || is_home() || is_404() ) echo '<h1>';
		echo '<a href="' . esc_url( home_url() ) . '/" title="';
		bloginfo('name');
		echo '"><span class="siteicon">';
		bloginfo('name');
		echo '</span></a>';
		if( is_front_page() || is_home() || is_404() ) echo '</h1>';
		echo '</div>';
	}
	if( has_custom_logo() ) echo '</div>';

	if( bunnypresslite_display_header_description() == '2' ) bunnypresslite_header_description_set(); ?>
	</div>
	
	<?php if( has_nav_menu( 'header-menu' ) ) { ?>
		<div class="headermenublock">

			<input type="checkbox" class="bunnypresslite_check" id="checkeds">
			<label class="bunnypresslite_dm" for="checkeds">
				<span class="bar top"></span>
				<span class="bar middle"></span>
				<span class="bar bottom"></span>
				<span class="bunnypresslite_dm_menu"><?php esc_html_e( 'MENU' , 'bunnypresslite' );?></span>
			</label>
			<label class="bunnypresslite_close" for="checkeds"></label>
			<?php

				echo '<nav class="header_navi">';
				$bunnypresslite_navi_pc = '';
				$allowed_html = array(
					'a' => array( 'id' => array (), 'class' => array (), 'href' => array (), 'onclick' => array (), 'target' => array() ),
					'div' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
					'img' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array (), 'src' => array (), 'data-src' => array (), 'data-lazy-src' => array (), 'border' => array (), 'width' => array (), 'height' => array () ),
					'amp-img' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'layout' => array (), 'align' => array (), 'src' => array (), 'border' => array (), 'width' => array (), 'height' => array () ),
					'p' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
					'span' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
					'ul' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
					'ol' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
					'li' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
					'input' => array( 'class' => array (), 'id' => array (), 'type' => array () ),
					'label' => array( 'class' => array (), 'id' => array (), 'for' => array () ),
				);

				if( has_nav_menu( 'header-menu-sp' ) ) {
					$nav = wp_nav_menu( array( 
						'theme_location' => 'header-menu-sp',
						'container' => false,
						'menu_class' => false,
						'items_wrap' => '<ul class="navi bunnypresslite_navi_sp">%3$s</ul>',
						'link_before' => '<span>',
						'link_after' => '</span>',
						'echo' => false
					) );
					$num = 1;
					$nav = preg_replace_callback('/<ul class="sub-menu">/m',function($matches) use(&$num){return '<input type="checkbox" id="bunnypresslite_dm_sub_' . $num . '"><label for="bunnypresslite_dm_sub_'  . $num . '" class="bunnypresslite_dm_sub_'  . $num++ . '"></label><ul class="sub-menu">';},$nav);
					echo wp_kses( $nav , $allowed_html );
					$bunnypresslite_navi_pc = ' bunnypresslite_navi_pc';
				}

				if( has_nav_menu( 'header-menu' ) ) {
				$nav = wp_nav_menu( array( 
					'theme_location' => 'header-menu',
					'container' => false,
					'menu_class' => false,
					'items_wrap' => '<ul class="navi' . $bunnypresslite_navi_pc . '">%3$s</ul>',
						'echo' => false
					) );
					$num = 1;
					$nav = preg_replace_callback('/<ul class="sub-menu">/m',function($matches) use(&$num){return '<input type="checkbox" id="bunnypresslite_dm_sub_' . $num . '"><label for="bunnypresslite_dm_sub_'  . $num . '" class="bunnypresslite_dm_sub_'  . $num++ . '"></label><ul class="sub-menu">';},$nav);
					echo wp_kses( $nav , $allowed_html );
				}

				echo '</nav>';
			?>
		</div>
	<?php } ?>
	
</div>
</header>

<div class="sitebody">
<div class="<?php echo esc_attr( bunnypresslite_max_content_width() ); ?>">
<?php if( is_active_sidebar( 'sidebar-2' ) ){ ?><div class="<?php echo esc_attr( bunnypresslite_max_content_width() ); ?>"><?php dynamic_sidebar( 'sidebar-2' ); ?></div><?php } ?>
<?php if( bunnypresslite_display_breadcrumb() != '3' ) get_template_part( 'inc/breadcrumb' ); ?>
</div>
<div class="inbody <?php echo esc_attr( bunnypresslite_max_content_width() ); ?>">
	<div id="main" class="<?php echo esc_attr( bunnypresslite_layout() ); ?>_content">