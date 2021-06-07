<?php
get_header();
if( !bunnypresslite_display_toppage() ){
	get_template_part( 'content' );
	bunnypresslite_page_navi();
	get_sidebar();
}
get_footer();
