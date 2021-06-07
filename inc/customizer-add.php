<?php
function bunnypresslite_color_conversion( $color ) {

    $color = str_replace('#', '', $color);

    $rgba_r   = hexdec(substr($color, 0, 2));
    $rgba_g = hexdec(substr($color, 2, 2));
    $rgba_b  = hexdec(substr($color, 4, 2));

    return $rgba_r .','. $rgba_g .','. $rgba_b;
}

function bunnypresslite_customizer_add_style(){

	echo '<style>';

	if ( bunnypresslite_ff() == 'z' ) $font = 'Arial';
	if ( bunnypresslite_ff() == '0' ) $font = 'sans-serif';
	if ( bunnypresslite_ff() == '1' ) $font = '"Noto Sans JP"';
	if ( bunnypresslite_ff() == '2' ) $font = '"M PLUS 1p"'; 
	if ( bunnypresslite_ff() == '3' ) $font = '"Noto Serif JP"'; 
	if ( bunnypresslite_ff() == '4' ) $font = '"Sawarabi Mincho"'; 
	if ( bunnypresslite_ff() == '5' ) $font = '"M PLUS Rounded 1c"';
	if ( bunnypresslite_ff() == '6' ) $font = '"Sawarabi Gothic"'; 
	if ( bunnypresslite_ff() == '7' ) $font = '"Kosugi Maru"';
	if ( bunnypresslite_ff() == '8' ) $font = '"Kosugi"';
	if ( bunnypresslite_ff() == '11' && bunnypresslite_ffo() ) $font = bunnypresslite_ffo();
	echo 'body{font-family:' . wp_kses_post($font) . ';font-size:' . esc_attr( bunnypresslite_fs() ) . 'px}';
	echo '.bunnypresslite_desc{font-size:' . esc_attr( bunnypresslite_fdfs() ) . '}';
	echo '.sitename{font-size:' . esc_attr( bunnypresslite_tfs() ) . ';';
	if(bunnypresslite_sffo()){
		echo 'font-family:"' . esc_attr(bunnypresslite_sffo()) . '"}';
	}else{
		echo '}';
	}
	if( has_custom_logo() ) {
	
		echo '.custom-logo-link img{width:' . esc_attr( bunnypresslite_custom_logo() ) . '}';
	
			$a1 =  substr(get_custom_logo(),$of=strpos(get_custom_logo(),'width="')+7,strpos(get_custom_logo(),'" height')-$of);
			$a2 =  substr(get_custom_logo(),$of=strpos(get_custom_logo(),'height="')+8,strpos(get_custom_logo(),'" src')-$of);
	
		if( !bunnypresslite_header_sticky() ) echo '.bunnypresslite_msh .custom-logo-link img{transition:.3s;width:' . esc_attr( round( ( $a1 * 40) / $a2 ) ) . 'px}';
	}
	
	if( bunnypresslite_title_width() ) echo '#header{width:' . esc_attr( bunnypresslite_title_width() ) . ';padding:15px 0}';

	$bunnypresslite_tfs = str_replace('px','',bunnypresslite_tfs());
	$bunnypresslite_sptfs = str_replace('px','',bunnypresslite_sptfs());

	if( bunnypresslite_sc() === '#other' ) {
		$sc = bunnypresslite_sco();
	}else{
		$sc = bunnypresslite_sc();
	}
	if( bunnypresslite_smc() === '#other' ) {
		$smc = bunnypresslite_smco();
	}else{
		$smc = bunnypresslite_smc();
	}

	if( bunnypresslite_ff_color() ){
		$ffc = bunnypresslite_ff_color();
	}elseif( bunnypresslite_schc() ){
		$ffc = bunnypresslite_fontcolor();
	}else{
		$ffc = '#ffffff';
	}

	if( bunnypresslite_fl_color() ) {
		$flc = bunnypresslite_fl_color();
	}elseif( bunnypresslite_schc() ) {
		$flc = bunnypresslite_fontcolor();
	}else{
		$flc = '#ffffff';
	}
	
	if( bunnypresslite_flh_color() ) {
		$flhc = bunnypresslite_flh_color();
	}elseif( bunnypresslite_schc() ) {
		$flhc = bunnypresslite_fontcolor();
	}else{
		$flhc = '#ffffff';
	}


	echo 'body,.comment-author-link a,.looptext,.looptext a,span.author a,#sidebar a,.bunnypresslite_relpost a,.sitename a,.bunnypresslite_desc,.sitename a:hover,.bunnypresslite_bc a,.singlecat a,.metaauthor a,.older a,.newer a,.pagination a,span.page-link{color:' . esc_attr(bunnypresslite_fontcolor()) . '}';
	echo 'a{color:' . esc_attr(bunnypresslite_link_color()) . '}';
	echo 'a:hover{color:' . esc_attr(bunnypresslite_linkh_color()) . '}';
	echo '.tagcloud a:hover,.taglist a:hover,.form-submit input,.editlink_comment a{background:' . esc_attr(bunnypresslite_link_color()) . '}';
	echo '.editlink_comment a:hover,.form-submit input:hover {background:' . esc_attr(bunnypresslite_linkh_color()) . '}';
	echo '.widget_recent_entries ul li a,.bunnypresslite_imgpostlist ul li a,.widget_archive ul li a,.widget_categories ul li a,.widget_meta ul li a,ul#recentcomments li{border-bottom:1px solid rgba(' . esc_attr(bunnypresslite_color_conversion( bunnypresslite_fontcolor()) ) . ',.1)}';
	echo '.sitename a{padding:' . absint( ( $bunnypresslite_tfs + 100) / 30 ) . 'px 0}';
	echo '.footer .widget_recent_entries ul li a,.footer .bunnypresslite_imgpostlist ul li a,.footer .widget_archive ul li a,.footer .widget_categories ul li a,.footer .widget_meta ul li a,.footer ul#recentcomments li{border-bottom:1px dashed rgba(' . esc_attr(bunnypresslite_color_conversion( $ffc) ) . ',.2)}';


	if( !bunnypresslite_schc() ) {
		echo '.sitename a,.sitename a:hover,.bunnypresslite_desc,ul.navi li a,.bunnypresslite_dm_menu{color:#fff}.bar{background:#fff}';
	}else{
		echo '.bar{background:' . esc_attr(bunnypresslite_fontcolor()) . '}';
		echo 'ul.navi li a{color:' . esc_attr(bunnypresslite_fontcolor()) . '}';
	}
	if( bunnypresslite_hd_color() ) echo '.bunnypresslite_desc{color:' . esc_attr(bunnypresslite_hd_color()) . '}';
	if( bunnypresslite_st_color() ) echo '.sitename a,.sitename a:hover{color:' . esc_attr(bunnypresslite_st_color()) . '}';


	echo '.footer,.footerwidget ul li{color:' . esc_attr($ffc) . '}';
	echo '.footer a,.footer ul li a{color:' . esc_attr($flc) . '}';
	echo '.footer a:hover { color:' . esc_attr($flhc) . '}';


	if( bunnypresslite_bg_color() ){
		echo 'body{background:' . esc_attr(bunnypresslite_bg_color()) . '}';
	}else{
		echo 'body{background:#fff}';
	}
	echo 'header{border-bottom:5px solid ' . esc_attr($sc) . '}';
	echo '.bunnypresslite_2line:before,#main h4:before{border-bottom:4px solid ' . esc_attr($sc) . '}';
	echo '.listpageh1 h1,.listpageh1 h2{border-bottom:6px solid ' . esc_attr($sc) . '}';
	echo '#main article h2:after,#main article h3:after,.footer h4:before{background: ' . esc_attr($sc) . '}';
	echo '.breadcrumb_home:before,.author_panel,.singlecat a:before,.metacat:before,.metaauthor:before,.metacomment:before,.modifi:before,.publish:before{color:' . esc_attr($sc) . '}';

	if(bunnypresslite_fbg_color()) {
		echo '.footer{background:' . esc_attr(bunnypresslite_fbg_color()) . '}';
	}else{
	echo '.footer{background:' . esc_attr($smc) . '}';
	}

	if( has_custom_header() ) {
		echo 'header{background: url(' . esc_url( get_header_image() ) . ') center;background-size:100%}';
	}elseif(bunnypresslite_hbg_color()) {
		echo 'header{background:' . esc_attr( bunnypresslite_hbg_color() ) . '}';
	}else{
		echo 'header{background:' . esc_attr($smc) . '}';
	}

	if( bunnypresslite_max_content_width() !== 'widthfull' ) echo '.' . esc_attr( bunnypresslite_max_content_width() ) . '{max-width:' . absint( str_replace('width','',bunnypresslite_max_content_width()) ) . 'px;margin:0 auto}';


	echo '@media screen and (min-width:559px){';
	if( bunnypresslite_listcard_pc() == '1' ) echo '.loopcon{margin:0 0 0 41%}';
	if( bunnypresslite_listcard_pc() == '2' ){
		if( get_theme_mod( 'bunnypresslite_listcard_type', '1' ) == '1' ){
			echo '.loopcon{margin:0}.loopimg{width:100%;float:none;margin:0 0 15px}#bunnypresslite_loop{display:flex;flex-wrap:wrap}.loopbox_cover{width:50%}.loopbox{padding:5px 15px 5px}.loopbox h2{margin:0 0 5px}';
		}else{
			echo '.loopcon{margin:0}.loopimg{width:100%;float:none;margin:0 0 15px}#bunnypresslite_loop{column-count:2}.loopbox_cover{break-inside:avoid}.loopbox{padding:5px 15px 5px;margin-top:0}.loopbox h2{margin:0 0 5px}';
		}
	} 
	if( !bunnypresslite_listcard_exc_pc() ) echo '.looptxt_height{display:none}';
	echo '}';

	echo '@media screen and (max-width:559px){';

	echo 'body{font-size:' . esc_attr( bunnypresslite_spfs() ) . 'px}';
	echo '.sitename{font-size:' . esc_attr( bunnypresslite_sptfs() ) . '}';
	if( has_custom_logo() && bunnypresslite_custom_logo_sp() ) echo '.custom-logo-link img{width:' . esc_attr( bunnypresslite_custom_logo_sp() ) . '}';
	if( get_theme_mod( 'bunnypresslite_display_sp_header_description', true ) != 'true' ) echo '.bunnypresslite_desc{display:none}';

	echo '.sitename a{padding:' . absint( $bunnypresslite_sptfs / 100 ) . 'em 0}.footermenu ul li{background:rgba(' . esc_attr(bunnypresslite_color_conversion( $ffc) ) . ',.1);border-bottom:1px solid rgba(' . esc_attr(bunnypresslite_color_conversion( $ffc )) . ',.3)}.footermenu ul{border-top:1px solid rgba(' . esc_attr(bunnypresslite_color_conversion( $ffc) ) . ',.3)}';

	if( bunnypresslite_listcard_sp() == '1' ) echo '.loopcon{margin:0 0 0 41%}';
	if( bunnypresslite_listcard_sp() == '2' ){
		if( get_theme_mod( 'bunnypresslite_listcard_type', '1' ) == '1' ){
			echo '.loopcon{margin:0}.loopimg{width:100%;float:none;margin:0 0 15px}#bunnypresslite_loop{display:flex;flex-wrap:wrap}.loopbox_cover{width:50%}.loopbox{padding:5px 7.5px 5px 15px}.loopbox_cover:nth-of-type(even) .loopbox{padding:5px 15px 5px 7.5px}.loopbox h2{margin:0 0 5px}';
		}else{
			echo '.loopcon{margin:0}.loopimg{width:100%;float:none;margin:0 0 15px}#bunnypresslite_loop{column-count:2;margin:0 10px}.loopbox_cover{break-inside:avoid}.loopbox{padding:0;margin-top:0}.loopbox h2{margin:0 0 5px}';
		}
	}
	if( bunnypresslite_listcard_sp() == '3' ) echo '.loopimg{width: 100%;margin:0;float:none}.loopbox h2{margin:0 0 5px}';
	if( !bunnypresslite_listcard_exc_sp() ) echo '.looptxt_height{display:none}';
	echo '}';


	if( is_user_logged_in() && !isset( $_GET['customize_changeset_uuid'] ) ) echo '#wpadminbar{position:fixed!important}.header_navi{top:46px}.bunnypresslite_check:checked ~ .bunnypresslite_dm{top:61px}';
	echo "</style>\n";

}
add_action( 'wp_head', 'bunnypresslite_customizer_add_style' , 37);
