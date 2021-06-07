</div>
<?php if ( bunnypresslite_layout() !== 'one' ) { ?>
		<div id="sidebar" class="<?php echo esc_attr( bunnypresslite_layout() ); ?>_sidebar">
			<?php dynamic_sidebar( 'sidebar-1' );	?>
		</div>
<?php } ?>
