<?php if ( post_password_required() ) {	return; } ?>

<?php if( have_comments() ) { ?>
<div id="comments" class="comments-area">
	<?php 
	$bunnypresslite_commentcount = get_comments( array(
		'status' => 'approve',
		'post_id'=> get_the_ID(), 
		'type'=> 'comment', 
		'count' => true
	) );

	$bunnypresslite_pingscount = get_comments( array(
		'status' => 'approve',
		'post_id'=> get_the_ID(), 
		'type'=> 'pings', 
		'count' => true
	) );

	if ( $bunnypresslite_commentcount > 0) { 

		if ( $bunnypresslite_commentcount == 1) { 

			echo '<h3 class="bunnypresslite_2line">' . esc_html( __( 'One Comment' , 'bunnypresslite') ) . '</h3>';

		}else{ 
			/* translators: %s: comment number */
			echo '<h3 class="bunnypresslite_2line">' . esc_html( sprintf( __( '%s Comments', 'bunnypresslite'), $bunnypresslite_commentcount ) ) . '</h3>';

		}

		?><ol class="comment-list">
		<?php wp_list_comments( 'type=comment&callback=bunnypresslite_custom_comments_list' );?>
		</ol>

	<?php }

	if ( $bunnypresslite_pingscount > 0  ){ ?>

		<ul class="comment-list">
		<?php wp_list_comments('type=pings&callback=bunnypresslite_custom_pings_list'); ?>
		</ul>
	<?php } 
    echo '</div>';
}

if (get_comment_pages_count() > 1) {
	echo '<div class="comment_newer-older">';
		$bunnypresslite_previous_comments_link = get_previous_comments_link( __( '&laquo; Previous comment', 'bunnypresslite' ) );
		$bunnypresslite_next_comments_link = get_next_comments_link( __( 'Next comment &raquo;', 'bunnypresslite' ) );
		echo '<div class="comment_older">';
		if ( isset($bunnypresslite_previous_comments_link) ) echo wp_kses_post( $bunnypresslite_previous_comments_link );
		echo '</div>';
		echo '<div class="comment_newer">';
		if ( isset($bunnypresslite_next_comments_link) ) echo wp_kses_post( $bunnypresslite_next_comments_link );
		echo '</div>';
    echo '</div>';
}

if( comments_open() ) comment_form();

?>
