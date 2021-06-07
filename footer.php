<div class="clear"></div>
<div id="bunnypresslite-pagetop" class="pagetop <?php echo esc_attr( bunnypresslite_display_totop() ); ?>"><a href="#bunnypresslite_top"></a></div>
</div>
</div>
<div class="footer">
<div class="infooter <?php echo esc_attr( bunnypresslite_max_content_width() ); ?>">
<footer>

<?php dynamic_sidebar( 'sidebar-5' ); ?>

		<div class="clear"></div>

		<?php if ( has_nav_menu( 'footer-menu' ) ) { ?>
		<div class="footermenu">
		<nav><?php wp_nav_menu( array('theme_location' => 'footer-menu' )); ?></nav>
		<div class="clear"></div>
		</div>
		<?php } ?>

<div class="footers"><?php esc_html_e( 'Copyright &copy; ' , 'bunnypresslite' ); echo absint( date_i18n(__('Y','bunnypresslite')) ) . ' '; bloginfo('name'); esc_html_e( '&nbsp;All Rights Reserved. ' , 'bunnypresslite' );?></div>
<div class="credit"><?php esc_html_e( 'Powered by ' , 'bunnypresslite' );?><a href="https://wordpress.org/"><?php esc_html_e( 'WordPress' , 'bunnypresslite' );?></a>. <?php esc_html_e( 'Designed by ' , 'bunnypresslite' );?><a href="https://yws.tokyo/"><?php esc_html_e( 'Yossy\'s web service' , 'bunnypresslite' );?></a>.</div>
</footer>
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
