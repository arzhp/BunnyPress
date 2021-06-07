<?php get_header(); ?>

	<div class="listpageh1"><h1><?php the_archive_title(); ?></h1></div>

	<?php get_template_part( 'content' ); ?>

	<?php bunnypresslite_page_navi(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
