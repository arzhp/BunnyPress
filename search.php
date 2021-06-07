<?php get_header(); ?>

	<div class="listpageh1"><h1><?php /* translators: %s: search term */ printf( esc_html__( 'Search results for "%s"','bunnypresslite' ), get_search_query( '',false ) ); ?></h1></div>

	<?php get_template_part( 'content' ); ?>

	<?php bunnypresslite_page_navi(); ?>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
