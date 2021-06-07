<?php get_header();

$f_name = get_the_author_meta( 'first_name' , $author );
$l_name = get_the_author_meta( 'last_name' , $author );
$bunnypresslite_user_url = get_the_author_meta( 'user_url' , $author );
$a_desc = get_the_author_meta( 'description' , $author );

?>
<div class="author-page">
	<div class="post-content">
	<div class="listpageh1"><h1><?php esc_html_e('About:','bunnypresslite'); ?> <?php echo esc_html( get_the_author_meta( 'display_name' , $author ) ); ?></h1></div>

	<div class="author_page contents">
	<div class="author_info_widget">
	<div class="author_info_widgetin">

		<div class="author_img">
			<p class="avatar"><?php if(function_exists('get_avatar')) echo get_avatar( esc_html( get_the_author_meta( 'user_email' , $author ) ), $size = '180' ); ?></p>
		</div>


		<div class="author_desc">

		<?php

			echo '<div class="author_nickname">';
			esc_html_e('Nickname: ','bunnypresslite');
			echo '<span>';
			echo esc_html( get_the_author_meta( 'nickname' ) );
			echo '</span></div>';

		if ( $f_name || $l_name ) {

			echo '<div class="author_name">';
			esc_html_e('Name: ','bunnypresslite');
			echo '<span>';
			if( $f_name ) echo esc_html( $f_name ) .' ';
			if( $l_name ) echo esc_html( $l_name );
			echo '</span></div>';
		}

		if ( $bunnypresslite_user_url ) {

			/* translators: %s: user site url */
			echo '<div class="user_url"><a href="' . esc_url( $bunnypresslite_user_url ) . '" title="' . sprintf( esc_attr__( 'Homepage of %s', 'bunnypresslite'), esc_attr( get_the_author_meta( 'display_name' , $author ) ) ) . '">' . esc_url( $bunnypresslite_user_url ) . '</a></div>';
	
		}

		if ( $a_desc ) {
			echo '<div class="author_text">';
			echo wp_kses_post( $a_desc );
			echo '</div>';
		}

		echo '</div></div>';

?>
	
	</div>
	</div>
	</div>

	<div class="listpageh1"><h2><?php /* translators: %s: author */ printf( esc_html__('Recent Posts by %s','bunnypresslite') , esc_html( get_the_author_meta( 'display_name' , $author ) )); ?></h2></div>
	<?php get_template_part( 'content' ); ?>
	<?php bunnypresslite_page_navi(); ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
