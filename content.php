<div id="bunnypresslite_loop">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="loopbox_cover"><div class="loopbox">

		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">

			<?php 

			$bunnypresslite_commentcount = get_comments( array(
				'status' => 'approve',
				'post_id'=> get_the_ID(), 
				'type'=> 'comment', 
				'count' => true
			) );?>

			<div class="bunnypresslite_list_thum"></div>
			<?php
			$ampwd = '150';
			$allowed_html = array(
				'amp-img' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array (), 'src' => array (), 'border' => array (), 'width' => array (), 'height' => array () ),
			);
			
				if ( has_post_thumbnail() ) {

					echo '<div class="loopimg"><div class="bunnypresslite_rpimg"><div class="bunnypresslite_rpimg_in">';

					the_post_thumbnail( 'medium',array( 'class' => 'bunnypresslite-list-thum' ) );

					echo '</div></div></div><div class="loopcon">';

				}elseif( bunnypresslite_display_list_img() ) {

					echo '<div class="loopimg"><div class="bunnypresslite_rpimg"><div class="bunnypresslite_rpimg_in">';

					bunnypresslite_noimg();

					echo '</div></div></div><div class="loopcon">';

				}

			?><div class="looptext"><?php
				if ( bunnypresslite_display_list_date() ) { ?><div class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></div><?php }
				echo '<div class="listpage_item_title"><h2>';
				the_title();
				echo '</h2></div>';
			

					if ( bunnypresslite_display_list_category() && !is_category() ) {
						$bunnypresslite_cat = get_the_category(); 
						for ($i = 0; $i <= count($bunnypresslite_cat); ++$i) {
							if( isset($bunnypresslite_cat[$i]) ) { echo '<span class="metacat">' . esc_html( $bunnypresslite_cat[$i]->cat_name ) . '</span>'; }
						}
					}
					if ( bunnypresslite_display_list_author() ) {
						echo '<span class="metaauthor">';
						the_author();
						echo '</span>';
					}
					if ( bunnypresslite_display_list_comment() ) {
						echo '<span class="metacomment">';
						comments_number(0,1,'%');
						echo '</span>';
					}
			
				echo '<div class="looptxt_height">';
				the_excerpt();
				echo '</div>';

			?></div>

		<div class="clear"></div></a>
		<?php if ( has_post_thumbnail() || bunnypresslite_display_list_img() ) echo '</div>'; ?></div></div>

	<?php endwhile; else: ?>

		<div class="contents">

			<?php if( !is_search() ) { ?>
				<h1><?php esc_html_e('Article is not yet.', 'bunnypresslite'); ?></h1>
				<p><?php esc_html_e('We apologize for any inconvenience.', 'bunnypresslite'); ?></p>
				<p><?php esc_html_e('Please hit back on your browser or use the search form below.', 'bunnypresslite'); ?></p>
			<?php }else{ ?>
				<br />
				<p><?php esc_html_e('No Results', 'bunnypresslite'); ?></p>
				<p><?php esc_html_e('Please feel free try again!', 'bunnypresslite'); ?></p>
			<?php } ?>

			<?php get_search_form(); ?>
		</div>

	<?php endif; ?>
</div>
<div class="clear"></div>
