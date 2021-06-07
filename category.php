<?php get_header();?>
<div class="listpageh1"><h1><?php the_archive_title(); ?></h1></div>
<div class="listpagedesc"><?php the_archive_description(); ?></div>
<?php

	get_template_part( 'content' );
	bunnypresslite_page_navi();

get_sidebar();
get_footer();
?>
