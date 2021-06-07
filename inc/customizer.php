<?php 

function bunnypresslite_theme_customizer_extension($wp_customize) {

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_titlefontsize', array(
		'selector' => '.sitename',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_header_description', array(
		'selector' => '.bunnypresslite_desc',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_breadcrumb', array(
		'selector' => '#breadcrumb',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_single_category', array(
		'selector' => '.singlecat',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_list_category', array(
		'selector' => '.metacat:nth-of-type(1)',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_list_author', array(
		'selector' => '.loopbox .metaauthor',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_custom_excerpt_length', array(
		'selector' => '.looptxt_height',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_list_comment', array(
		'selector' => '.loopbox .metacomment',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_single_date', array(
		'selector' => '.post .bunnypresslite_time',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_single_update', array(
		'selector' => '.post .modifi',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_single_author', array(
		'selector' => '.post .metaauthor',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_single_thumbnail', array(
		'selector' => '.post .bunnypresslite_content_thum',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_page_author', array(
		'selector' => '.page .metaauthor',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_page_date', array(
		'selector' => '.page .bunnypresslite_time',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_page_update', array(
		'selector' => '.page .modifi',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_page_thumbnail', array(
		'selector' => '.page .bunnypresslite_content_thum',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_list_date', array(
		'selector' => '.loopbox .bunnypresslite_time',        
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_single_pagenav', array(
		'selector' => '#pagenavi', 
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_ah12_h_font', array(
		'selector' => '.post h1,.post h2,.page h1,.page h2,.listpage_item_title_content',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_sidebar_h_font', array(
		'selector' => '.sidebox h3',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_ah3_h_font', array(
		'selector' => '.post h3,.page h3',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_ah4_h_font', array(
		'selector' => '.post h4,.page h4',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_sidebarmenu_font', array(
		'selector' => '.sidebox ul',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_footer_h_font', array(
		'selector' => '.footer h4',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_footermenu_font', array(
		'selector' => '.footerwidget ul',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_headermenu_font', array(
		'selector' => '.navi ul li a:nth-child(1)',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_lph1_h_font', array(
		'selector' => '.listpageh1',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_lph2_h_font', array(
		'selector' => '.listpage_item_title',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_display_list_img', array(
		'selector' => '.bunnypresslite_list_thum',
		) );

		$wp_customize->selective_refresh->add_partial( 'bunnypresslite_index_enable', array(
		'selector' => '#bunnypresslite_indexs',
		) );

	}

	$wp_customize->add_setting( 'bunnypresslite_site_main_color', array (
	'default' => '6b5344',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_site_main_color', array(
	'section' => 'colors',
	'settings' => 'bunnypresslite_site_main_color',
	'label' => __( 'Site Main Color', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'66ccff' => __( 'Light Blue', 'bunnypresslite' ),
		'3366cc' => __( 'Blue', 'bunnypresslite' ),
		'ff9999' => __( 'Light Red', 'bunnypresslite' ),
		'ff3333' => __( 'Red', 'bunnypresslite' ),
		'66ff66' => __( 'Light Green', 'bunnypresslite' ),
		'339933' => __( 'Green', 'bunnypresslite' ),
		'6b5344' => __( 'Chocolate', 'bunnypresslite' ),
		'other' => __( 'Other', 'bunnypresslite' ),
	),
	'priority' => 1,
	));

	$wp_customize->add_setting( 'bunnypresslite_site_main_color_other', array(
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_site_main_color_other', array(
	'description' => __( 'When selecting "Other"', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_site_main_color_other',
	'priority' => 2,
	)));

	$wp_customize->add_setting( 'bunnypresslite_sitecolor_hc', array (
	'default' => '',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_sitecolor_hc', array(
	'section' => 'colors',
	'settings' => 'bunnypresslite_sitecolor_hc',
	'label' => __( 'Don&#039;t make header and footer text color white', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 3,
	));

	$wp_customize->add_setting( 'bunnypresslite_sitecolor', array (
	'default' => 'ff9999',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_sitecolor', array(
	'section' => 'colors',
	'settings' => 'bunnypresslite_sitecolor',
	'label' => __( 'Site Sub Color', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'66ccff' => __( 'Light Blue', 'bunnypresslite' ),
		'3366cc' => __( 'Blue', 'bunnypresslite' ),
		'ff9999' => __( 'Light Red', 'bunnypresslite' ),
		'ff3333' => __( 'Red', 'bunnypresslite' ),
		'66ff66' => __( 'Light Green', 'bunnypresslite' ),
		'339933' => __( 'Green', 'bunnypresslite' ),
		'6b5344' => __( 'Chocolate', 'bunnypresslite' ),
		'other' => __( 'Other', 'bunnypresslite' ),
	),
	'priority' => 4,
	));

	$wp_customize->add_setting( 'bunnypresslite_sitecolor_other', array(
	'default' => '#000000',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_sitecolor_other', array(
	'description' => __( 'When selecting "Other"', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_sitecolor_other',
	'priority' => 5,
	)));

	$wp_customize->add_setting( 'bunnypresslite_site_title_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_site_title_color', array(
	'label' => __( 'Site title color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_site_title_color',
	'priority' => 40,
	)));

	$wp_customize->add_setting( 'bunnypresslite_header_description_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_header_description_color', array(
	'label' => __( 'Site description text color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_header_description_color',
	'priority' => 50,
	)));

	$wp_customize->add_setting( 'bunnypresslite_hbg_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_hbg_color', array(
	'label' => __( 'Top header background color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_hbg_color',
	'priority' => 60,
	)));

	$wp_customize->add_setting( 'bunnypresslite_bg_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_bg_color', array(
	'label' => __( 'background color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_bg_color',
	'priority' => 70,
	)));

	$wp_customize->add_setting( 'bunnypresslite_link_color', array(
	'default' => '#0066cc',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_link_color', array(
	'label' => __( 'Link color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_link_color',
	'priority' => 80,
	)));

	$wp_customize->add_setting( 'bunnypresslite_link_hover_color', array(
	'default' => '#cc0000',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_link_hover_color', array(
	'label' => __( 'Link hover color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_link_hover_color',
	'priority' => 90,
	)));

	$wp_customize->add_setting( 'bunnypresslite_fontcolor', array(
	'default' => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_fontcolor', array(
	'label' => __( 'Overall font color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_fontcolor',
	'priority' => 100,
	)));

	$wp_customize->add_setting( 'bunnypresslite_footer_bg_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_footer_bg_color', array(
	'label' => __( 'Footer background color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_footer_bg_color',
	'priority' => 110,
	)));

	$wp_customize->add_setting( 'bunnypresslite_footer_font_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_footer_font_color', array(
	'label' => __( 'Footer font color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_footer_font_color',
	'priority' => 120,
	)));

	$wp_customize->add_setting( 'bunnypresslite_footer_link_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_footer_link_color', array(
	'label' => __( 'Footer link color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_footer_link_color',
	'priority' => 130,
	)));

	$wp_customize->add_setting( 'bunnypresslite_footer_link_h_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bunnypresslite_footer_link_h_color', array(
	'label' => __( 'Footer link hover color', 'bunnypresslite' ),
	'section' => 'colors',
	'settings' => 'bunnypresslite_footer_link_h_color',
	'priority' => 140,
	)));

	$wp_customize->add_section( 'roughdesign', array (
	'title' => __( 'Rough design', 'bunnypresslite' ),
	'panel' => 'bunnypresslite_design_and_display_settings',
	'priority' => 5,
	));

	$wp_customize->add_setting( 'bunnypresslite_custom_excerpt_length', array (
	'default' => '90',
	'sanitize_callback' => 'bunnypresslite_sanitize_text',
	));
	$wp_customize->add_control( 'bunnypresslite_custom_excerpt_length', array(
	'section' => 'roughdesign',
	'settings' => 'bunnypresslite_custom_excerpt_length',
	'label' => __( 'Excerpt length', 'bunnypresslite' ),
	'type' => 'text',
	'priority' => 10,
	));

	$wp_customize->add_setting( 'bunnypresslite_listcard_exc_pc', array (
	'default' => '1',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_listcard_exc_pc', array(
	'section' => 'roughdesign',
	'settings' => 'bunnypresslite_listcard_exc_pc',
	'label' => __( 'List Card excerpt (PC)', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'1' => __( 'Display', 'bunnypresslite' ),
		'' => __( 'Hide', 'bunnypresslite' ),
	),
	'priority' => 20,
	));

	$wp_customize->add_setting( 'bunnypresslite_listcard_exc_sp', array (
	'default' => '',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_listcard_exc_sp', array(
	'section' => 'roughdesign',
	'settings' => 'bunnypresslite_listcard_exc_sp',
	'label' => __( 'List Card excerpt (Mobile)', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'1' => __( 'Display', 'bunnypresslite' ),
		'' => __( 'Hide', 'bunnypresslite' ),
	),
	'priority' => 30,
	));

	$wp_customize->add_section( 'layout', array (
	'title' => __( 'Layout', 'bunnypresslite' ),
	'panel' => 'bunnypresslite_design_and_display_settings',
	'priority' => 10,
	));

	$wp_customize->add_setting( 'bunnypresslite_layout', array (
	'default' => 'right',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_layout', array(
	'section' => 'layout',
	'settings' => 'bunnypresslite_layout',
	'label' => __( 'layout', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'right' => __( 'right sidebar', 'bunnypresslite' ),
		'left' => __( 'left sidebar', 'bunnypresslite' ),
		'one' => __( 'no sidebar', 'bunnypresslite' ),
	),
	'priority' => 10,
	));

	$wp_customize->add_setting( 'bunnypresslite_max_content_width', array (
	'default' => 'width1150',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_max_content_width', array(
	'section' => 'layout',
	'settings' => 'bunnypresslite_max_content_width',
	'label' => __( 'Max content width', 'bunnypresslite' ),
	'description' => __( '(When the screen width is smaller than this setting, it can be adjusted to the screen width)', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'width800' => '800px',
		'width850' => '850px',
		'width900' => '900px',
		'width950' => '950px',
		'width1000' => '1000px',
		'width1050' => '1050px',
		'width1100' => '1100px',
		'width1150' => '1150px',
		'width1200' => '1200px',
		'width1250' => '1250px',
		'width1300' => '1300px',
		'width1350' => '1350px',
		'width1400' => '1400px',
		'widthfull' => '100%',
	),
	'priority' => 20,
	));


	$wp_customize->add_setting( 'bunnypresslite_listcard_pc', array (
	'default' => '1',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_listcard_pc', array(
	'section' => 'layout',
	'settings' => 'bunnypresslite_listcard_pc',
	'label' => __( 'List Card (PC)', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'2' => __( '2 column', 'bunnypresslite' ),
		'1' => __( '1 column', 'bunnypresslite' ),
	),
	'priority' => 30,
	));

	$wp_customize->add_setting( 'bunnypresslite_listcard_sp', array (
	'default' => '2',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_listcard_sp', array(
	'section' => 'layout',
	'settings' => 'bunnypresslite_listcard_sp',
	'label' => __( 'List Card (Mobile)', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'2' => __( '2 column', 'bunnypresslite' ),
		'1' => __( '1 column (Image on the left, title on the right.)', 'bunnypresslite' ),
		'3' => __( '1 column (Image above, title below.)', 'bunnypresslite' ),
	),
	'priority' => 40,
	));

	$wp_customize->add_setting( 'bunnypresslite_listcard_type', array (
	'default' => '1',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_listcard_type', array(
	'section' => 'layout',
	'settings' => 'bunnypresslite_listcard_type',
	'label' => __( 'Layout for 2 columns of list cards', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'1' => __( 'Grid', 'bunnypresslite' ),
		'2' => __( 'Masonry', 'bunnypresslite' ),
	),
	'priority' => 50,
	));

	$wp_customize->add_panel( 'bunnypresslite_design_and_display_settings', array(
	'priority' => 22,
	'title' => __('Design detail setting', 'bunnypresslite'),
	) );

	$wp_customize->add_section( 'display', array (
	'title' => __( 'Display settings', 'bunnypresslite' ),
	'panel' => 'bunnypresslite_design_and_display_settings',
	'priority' => 28,
	));
	$wp_customize->add_setting( 'bunnypresslite_display_toppage', array (
	'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new bunnypresslite_Custom_Content( $wp_customize, 'bunnypresslite_display_toppage', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_toppage',
	'content' => '<span class="customize-control-title">' . __( 'Top Page', 'bunnypresslite' ) . '</span>',
	'priority' => 5,
	)));

	$wp_customize->add_setting( 'bunnypresslite_display_toppage_radio', array (
	'default' => '',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_toppage_radio', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_toppage_radio',
	'label' => __( 'Do not display post list', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 6,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_single_title', array (
	'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new bunnypresslite_Custom_Content( $wp_customize, 'bunnypresslite_display_single_title', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_single_title',
	'content' => '<span class="customize-control-title">' . __( 'Single', 'bunnypresslite' ) . '</span>',
	'priority' => 28,
	)));

	$wp_customize->add_setting( 'bunnypresslite_display_single_category', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_single_category', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_single_category',
	'label' => __( 'Display categories on the single page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 30,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_single_date', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_single_date', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_single_date',
	'label' => __( 'Display date on the single page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 40,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_single_update', array (
	'default' => true,
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_single_update', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_single_update',
	'label' => __( 'Display Update date on the single page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 45,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_single_author', array (
	'default' => false,
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_single_author', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_single_author',
	'label' => __( 'Display author on the single page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 50,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_single_thumbnail', array (
	'default' => true,
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_single_thumbnail', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_single_thumbnail',
	'label' => __( 'Display Eye catch image on the single page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 55,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_single_pagenav', array (
	'default' => true,
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_single_pagenav', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_single_pagenav',
	'label' => __( 'Display "Next page", "Previous page" link on the single page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 60,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_page_title', array (
	'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new bunnypresslite_Custom_Content( $wp_customize, 'bunnypresslite_display_page_title', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_page_title',
	'content' => '<span class="customize-control-title">' . __( 'Page', 'bunnypresslite' ) . '</span>',
	'priority' => 68,
	)));

	$wp_customize->add_setting( 'bunnypresslite_display_page_date', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_page_date', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_page_date',
	'label' => __( 'Display date on the page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 70,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_page_update', array (
	'default' => true,
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_page_update', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_page_update',
	'label' => __( 'Display Update date on the page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 75,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_page_author', array (
	'default' => false,
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_page_author', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_page_author',
	'label' => __( 'Display author on the page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 80,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_page_thumbnail', array (
	'default' => true,
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_page_thumbnail', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_page_thumbnail',
	'label' => __( 'Display Eye catch image on the page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 85,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_list_page_title', array (
	'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new bunnypresslite_Custom_Content( $wp_customize, 'bunnypresslite_display_list_page_title', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_list_page_title',
	'content' => '<span class="customize-control-title">' . __( 'List Page', 'bunnypresslite' ) . '</span>',
	'priority' => 88,
	)));

	$wp_customize->add_setting( 'bunnypresslite_display_list_category', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_list_category', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_list_category',
	'label' => __( 'Display categories on the list page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 90,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_list_date', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_list_date', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_list_date',
	'label' => __( 'Display date on the list page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 100,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_list_author', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_list_author', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_list_author',
	'label' => __( 'Display author on the list page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 110,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_list_comment', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_list_comment', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_list_comment',
	'label' => __( 'Display comment on the list page', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 115,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_list_img', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_list_img', array(
	'section' => 'display',
	'settings' => 'bunnypresslite_display_list_img',
	'label' => __( 'If there is no eye catch image, display placeholder image', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 120,
	));

	$wp_customize->add_section( 'design', array (
	'title' => __( 'General design', 'bunnypresslite' ),
	'panel' => 'bunnypresslite_design_and_display_settings',
	'priority' => 1,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_sitetitle', array (
	'default' => '',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_sitetitle', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_display_sitetitle',
	'label' => __( 'Hide the site title of the text', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 8,
	));

	$wp_customize->add_setting( 'bunnypresslite_titlelogo_width', array (
	'default' => '200px',
	'sanitize_callback' => 'bunnypresslite_sanitize_text',
	));
	$wp_customize->add_control( 'bunnypresslite_titlelogo_width', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_titlelogo_width',
	'label' => __( 'Logo width', 'bunnypresslite' ),
	'description' => __( 'Add px etc. Automatic adjustment of height.', 'bunnypresslite' ),
	'type' => 'text',
	'priority' => 9,
	));

	$wp_customize->add_setting( 'bunnypresslite_title_width', array (
	'default' => '300px',
	'sanitize_callback' => 'bunnypresslite_sanitize_text',
	));
	$wp_customize->add_control( 'bunnypresslite_title_width', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_title_width',
	'label' => __( 'Site title width', 'bunnypresslite' ),
	'description' => __( 'Add px etc. Automatic adjustment of height.', 'bunnypresslite' ),
	'type' => 'text',
	'priority' => 10,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_header_description', array (
	'default' => '2',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_display_header_description', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_display_header_description',
	'label' => __( 'Where will you display the site description?', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'1' => __( 'Top of site title', 'bunnypresslite' ),
		'2' => __( 'Under the site title', 'bunnypresslite' ),
		'4' => __( 'Do not show', 'bunnypresslite' ),
	),
	'priority' => 20,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_header_description_type', array (
	'default' => '3',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_display_header_description_type', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_display_header_description_type',
	'label' => __( 'Content of site description', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'1' => __( 'Always site catchphrase', 'bunnypresslite' ),
		'3' => __( 'Switch to page description', 'bunnypresslite' ),
	),
	'priority' => 30,
	));

	$wp_customize->add_setting( 'header_background_image', array (
	'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new bunnypresslite_Custom_Content( $wp_customize, 'header_background_image', array(
	'section' => 'design',
	'settings' => 'header_background_image',
	'content' => '<span class="customize-control-title">' . __( 'Header background image', 'bunnypresslite' ) . '</span>',
	'priority' => 40,
	)));

	$wp_customize->add_setting( 'bunnypresslite_display_breadcrumb', array (
	'default' => '2',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_display_breadcrumb', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_display_breadcrumb',
	'label' => __( 'Breadcrumb navigation', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'1' => __( 'Display on all pages', 'bunnypresslite' ),
		'2' => __( 'Displayed outside the top page', 'bunnypresslite' ),
		'3' => __( 'Hide', 'bunnypresslite' ),
	),
	'priority' => 70,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_totop', array (
	'default' => 'totop1',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_display_totop', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_display_totop',
	'label' => __( 'Back to the top of the page Button', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'totop1' => __( 'Display', 'bunnypresslite' ),
		'totop2' => __( '60 px offset on top', 'bunnypresslite' ),
		'totop3' => __( '120 px offset on top', 'bunnypresslite' ),
		'totop5' => __( '60 px offset on top (Only for smartphone)', 'bunnypresslite' ),
		'totop6' => __( '120 px offset on top (Only for smartphone)', 'bunnypresslite' ),
		'totop4' => __( 'Hide', 'bunnypresslite' ),
	),
	'priority' => 80,
	));

	$wp_customize->add_setting( 'bunnypresslite_footerwidget', array (
	'default' => '3',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_footerwidget', array(
	'section' => 'design',
	'settings' => 'bunnypresslite_footerwidget',
	'label' => __( 'How many footer widgets are to be arranged next to it?', 'bunnypresslite' ),
	'description' => __( '(Regardless of this setting, Two rows on tablet and one row on smartphone)', 'bunnypresslite' ),
	'type' => 'radio',
	'choices' => array(
		'1' => __( 'Not side by side', 'bunnypresslite' ),
		'2' => '2',
		'3' => '3',
		'4' => '4',
		'5' => '5',
	),
	'priority' => 200,
	));

	$wp_customize->add_section( 'fontsetting', array (
	'title' => __( 'Font settings', 'bunnypresslite' ),
	'panel' => 'bunnypresslite_design_and_display_settings',
	'priority' => 35,
	));

	$wp_customize->add_setting( 'bunnypresslite_fontsize', array (
	'default' => '15',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_fontsize', array(
	'section' => 'fontsetting',
	'settings' => 'bunnypresslite_fontsize',
	'label' => __( 'Font size', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'10' => '10px',
		'11' => '11px',
		'12' => '12px',
		'13' => '13px',
		'14' => '14px',
		'15' => '15px',
		'16' => '16px',
		'17' => '17px',
		'18' => '18px',
		'19' => '19px',
		'20' => '20px',
	),
	'priority' => 5,
	));

	$wp_customize->add_setting( 'bunnypresslite_fontfamily', array (
	'default' => '0',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_fontfamily', array(
	'section' => 'fontsetting',
	'settings' => 'bunnypresslite_fontfamily',
	'label' => __( 'Overall font family', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'z' => 'Arial',
		'0' => 'sans-serif',
		'1' => 'Noto Sans JP',
		'2' => 'M PLUS 1p',
		'3' => 'Noto Serif JP',
		'4' => 'Sawarabi Mincho',
		'5' => 'M PLUS Rounded',
		'6' => 'Sawarabi Gothic',
		'7' => 'Kosugi Maru',
		'8' => 'Kosugi',
		'11' => __( 'Other', 'bunnypresslite' ),
	),
	'priority' => 10,
	));

	$wp_customize->add_setting( 'bunnypresslite_fontfamily_other', array (
	'default' => '',
	'sanitize_callback' => 'bunnypresslite_sanitize_text',
	));
	$wp_customize->add_control( 'bunnypresslite_fontfamily_other', array(
	'section' => 'fontsetting',
	'settings' => 'bunnypresslite_fontfamily_other',
	'description' => __( 'When selecting "Other"', 'bunnypresslite' ) . __( '<br />Example: "MS PGothic", "Osaka", Arial, sans-serif', 'bunnypresslite' ),
	'type' => 'text',
	'priority' => 20,
	));

	$wp_customize->add_setting( 'bunnypresslite_titlefontsize', array (
	'default' => '24px',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_titlefontsize', array(
	'section' => 'fontsetting',
	'settings' => 'bunnypresslite_titlefontsize',
	'label' => __( 'Site title font size', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'24px' =>  '24px',
		'26px' =>  '26px',
		'28px' =>  '28px',
		'30px' =>  '30px',
		'32px' =>  '32px',
		'34px' =>  '34px',
		'36px' =>  '36px',
		'38px' =>  '38px',
		'40px' =>  '40px',
		'42px' =>  '42px',
		'44px' =>  '44px',
		'46px' =>  '46px',
		'48px' =>  '48px',
		'50px' =>  '50px',
		'52px' =>  '52px',
		'54px' =>  '54px',
		'56px' =>  '56px',
		'58px' =>  '58px',
		'60px' =>  '60px',
		'62px' =>  '62px',
		'64px' =>  '64px',

	),
	'priority' => 30,
	));

	$wp_customize->add_setting( 'bunnypresslite_sitefontfamily_other', array (
	'default' => '',
	'sanitize_callback' => 'bunnypresslite_sanitize_text',
	));
	$wp_customize->add_control( 'bunnypresslite_sitefontfamily_other', array(
	'section' => 'fontsetting',
	'settings' => 'bunnypresslite_sitefontfamily_other',
	'label' => __( 'Site title font family', 'bunnypresslite' ),
	'description' => __( 'Example: "MS PGothic", "Osaka", Arial, sans-serif', 'bunnypresslite' ),
	'type' => 'text',
	'priority' => 40,
	));

	$wp_customize->add_setting( 'bunnypresslite_h_d_fontsize', array (
	'default' => '10px',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_h_d_fontsize', array(
	'section' => 'fontsetting',
	'settings' => 'bunnypresslite_h_d_fontsize',
	'label' => __( 'Site description font size', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'8px' => '8px',
		'9px' => '9px',
		'10px' => '10px',
		'11px' => '11px',
		'12px' => '12px',
		'13px' => '13px',
		'14px' => '14px',
		'15px' => '15px',
		'16px' => '16px',
		'17px' => '17px',
		'18px' => '18px',
		'19px' => '19px',
		'20px' => '20px',
	),
	'priority' => 50,
	));

	$wp_customize->add_section( 'spsetting', array (
	'title' => __( 'Smartphone setting', 'bunnypresslite' ),
	'description' => __( 'When the width is 480px or less', 'bunnypresslite' ),
	'priority' => 150,
	));

	$wp_customize->add_setting( 'bunnypresslite_sp_fontsize', array (
	'default' => '14',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_sp_fontsize', array(
	'section' => 'spsetting',
	'settings' => 'bunnypresslite_sp_fontsize',
	'label' => __( 'Font size', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'10' => '10px',
		'11' => '11px',
		'12' => '12px',
		'13' => '13px',
		'14' => '14px',
		'15' => '15px',
		'16' => '16px',
		'17' => '17px',
		'18' => '18px',
		'19' => '19px',
		'20' => '20px',
	),
	'priority' => 5,
	));

	$wp_customize->add_setting( 'bunnypresslite_sp_titlefontsize', array (
	'default' => '20px',
	'sanitize_callback' => 'bunnypresslite_sanitize_select',
	));
	$wp_customize->add_control( 'bunnypresslite_sp_titlefontsize', array(
	'section' => 'spsetting',
	'settings' => 'bunnypresslite_sp_titlefontsize',
	'label' => __( 'Site title font size', 'bunnypresslite' ),
	'type' => 'select',
	'choices' => array(
		'12px' =>  '12px',
		'13px' =>  '13px',
		'14px' =>  '14px',
		'15px' =>  '15px',
		'16px' =>  '16px',
		'17px' =>  '17px',
		'18px' =>  '18px',
		'19px' =>  '19px',
		'20px' =>  '20px',
		'22px' =>  '22px',
		'24px' =>  '24px',
		'26px' =>  '26px',
		'28px' =>  '28px',
		'30px' =>  '30px',
		'32px' =>  '32px',
		'34px' =>  '34px',
		'36px' =>  '36px',
		'38px' =>  '38px',
		'40px' =>  '40px',
		'42px' =>  '42px',
		'44px' =>  '44px',
	),
	'priority' => 10,
	));

	$wp_customize->add_setting( 'bunnypresslite_display_sp_header_description', array (
	'default' => 'true',
	'sanitize_callback' => 'bunnypresslite_sanitize_checkbox',
	));
	$wp_customize->add_control( 'bunnypresslite_display_sp_header_description', array(
	'section' => 'spsetting',
	'settings' => 'bunnypresslite_display_sp_header_description',
	'label' => __( 'Display the header description', 'bunnypresslite' ),
	'type' => 'checkbox',
	'priority' => 20,
	));

	$wp_customize->add_setting( 'bunnypresslite_sp_titlelogo', array (
	'default' => '',
	'sanitize_callback' => 'bunnypresslite_sanitize_text',
	));
	$wp_customize->add_control( 'bunnypresslite_sp_titlelogo', array(
	'section' => 'spsetting',
	'settings' => 'bunnypresslite_sp_titlelogo',
	'label' => __( 'Logo width for mobile', 'bunnypresslite' ),
	'description' => __( 'Add px etc. Automatic adjustment of height.', 'bunnypresslite' ) . '<br />' . __( '(Valid only when logo is displayed.)', 'bunnypresslite' ),
	'type' => 'text',
	'priority' => 50,
	));

	$wp_customize->add_section( 'bunnypress', array (
	'title' => __( 'More customize', 'bunnypresslite' ),
	'priority' => 1000,
	));

	$wp_customize->add_setting( 'bunnypress_intro', array (
	'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control( new bunnypresslite_Custom_Content( $wp_customize, 'bunnypress_intro', array(
	'section' => 'bunnypress',
	'content' => '<div class="bunnypress">' . __( 'There is "Bunnypress" which added the function.', 'bunnypresslite' ) . '</div><p><a class="button button-primary button-large" href="https://yws.tokyo/demo/"  target="_blank">' . __( 'Go to Demo site', 'bunnypresslite' ) . '</a></p><p><a class="button button-primary button-large" href="https://yws.tokyo/blogtheme-bunnypress/" target="_blank">' . __( 'Click here for details', 'bunnypresslite' ) . '</a></p>',
	'priority' => 10,
	)));

	$wp_customize->get_control( 'custom_logo' )->section = 'design';
	$wp_customize->get_control( 'custom_logo' )->priority = 1;
	$wp_customize->get_section( 'colors' )->panel = 'bunnypresslite_design_and_display_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'none';
	$wp_customize->get_control( 'header_image' )->section = 'design';
	$wp_customize->get_control( 'header_image' )->priority = 44;
	$wp_customize->get_section( 'background_image' )->panel = 'none';
	$wp_customize->get_control( 'background_image' )->section = 'design';
	$wp_customize->get_control( 'background_image' )->priority = 45;
	$wp_customize->get_control( 'header_background_image' )->section = 'design';
	$wp_customize->get_section( 'static_front_page' )->panel = 'bunnypresslite_design_and_display_settings';
	$wp_customize->get_control( 'site_icon' )->section = 'design';
	$wp_customize->get_control( 'site_icon' )->priority = 999;
}
add_action('customize_register', 'bunnypresslite_theme_customizer_extension');

function bunnypresslite_ff() { return get_theme_mod( 'bunnypresslite_fontfamily','0' ); }
function bunnypresslite_ffo() { return get_theme_mod( 'bunnypresslite_fontfamily_other','' ); }
function bunnypresslite_sffo() { return get_theme_mod( 'bunnypresslite_sitefontfamily_other','' ); }
function bunnypresslite_tfs() { return get_theme_mod( 'bunnypresslite_titlefontsize','24px' ); }
function bunnypresslite_fdfs() { return get_theme_mod( 'bunnypresslite_h_d_fontsize','10px' ); }
function bunnypresslite_sptfs() { return get_theme_mod( 'bunnypresslite_sp_titlefontsize','20px' ); }
function bunnypresslite_display_header_description() { return get_theme_mod( 'bunnypresslite_display_header_description', '2' );}
function bunnypresslite_display_header_description_type() { return get_theme_mod( 'bunnypresslite_display_header_description_type', '3' );}
function bunnypresslite_display_single_category() { return get_theme_mod( 'bunnypresslite_display_single_category', true );}
function bunnypresslite_display_single_date() { return get_theme_mod( 'bunnypresslite_display_single_date', true );}
function bunnypresslite_display_single_update() { return get_theme_mod( 'bunnypresslite_display_single_update', true );}
function bunnypresslite_display_single_author() { return get_theme_mod( 'bunnypresslite_display_single_author', false );}
function bunnypresslite_display_single_thumbnail() { return get_theme_mod( 'bunnypresslite_display_single_thumbnail', true );}
function bunnypresslite_display_single_pagenav() { return get_theme_mod( 'bunnypresslite_display_single_pagenav', true );}
function bunnypresslite_display_page_date() { return get_theme_mod( 'bunnypresslite_display_page_date', true );}
function bunnypresslite_display_page_update() { return get_theme_mod( 'bunnypresslite_display_page_update', true );}
function bunnypresslite_display_page_author() { return get_theme_mod( 'bunnypresslite_display_page_author', false );}
function bunnypresslite_display_page_thumbnail() { return get_theme_mod( 'bunnypresslite_display_page_thumbnail', true );}
function bunnypresslite_display_list_img() { return get_theme_mod( 'bunnypresslite_display_list_img', true );}
function bunnypresslite_display_list_category() { return get_theme_mod( 'bunnypresslite_display_list_category', true );}
function bunnypresslite_display_list_date() { return get_theme_mod( 'bunnypresslite_display_list_date', true );}
function bunnypresslite_display_list_author() { return get_theme_mod( 'bunnypresslite_display_list_author', true );}
function bunnypresslite_display_list_comment() { return get_theme_mod( 'bunnypresslite_display_list_comment', true );}
function bunnypresslite_layout() {return get_theme_mod('bunnypresslite_layout', 'right');}
function bunnypresslite_listcard_pc() {return get_theme_mod('bunnypresslite_listcard_pc', '1');}
function bunnypresslite_listcard_sp() {return get_theme_mod('bunnypresslite_listcard_sp', '2');}
function bunnypresslite_listcard_exc_pc() {return get_theme_mod('bunnypresslite_listcard_exc_pc', '1');}
function bunnypresslite_listcard_exc_sp() {return get_theme_mod('bunnypresslite_listcard_exc_sp', '');}
function bunnypresslite_footerwidget() { return get_theme_mod( 'bunnypresslite_footerwidget','3' );}
function bunnypresslite_max_content_width() { return get_theme_mod( 'bunnypresslite_max_content_width','width1150' );}
function bunnypresslite_display_totop() { return get_theme_mod( 'bunnypresslite_display_totop', 'totop1' );}
function bunnypresslite_custom_logo() { return get_theme_mod( 'bunnypresslite_titlelogo_width','200px' );}
function bunnypresslite_title_width() { return get_theme_mod( 'bunnypresslite_title_width','300px' );}
function bunnypresslite_header_sticky() { return get_theme_mod( 'bunnypresslite_header_sticky','' );}
function bunnypresslite_dst() { return get_theme_mod( 'bunnypresslite_display_sitetitle','' );}
function bunnypresslite_custom_logo_sp() { return get_theme_mod( 'bunnypresslite_sp_titlelogo','' );}
function bunnypresslite_display_breadcrumb() { return get_theme_mod( 'bunnypresslite_display_breadcrumb', '2' );}
function bunnypresslite_amp() { return get_theme_mod( 'bunnypresslite_amp', '' );}
function bunnypresslite_amp_css_add() { return get_theme_mod( 'bunnypresslite_amp_css_add', '1' );}
function bunnypresslite_amp_only_css() { return get_theme_mod( 'bunnypresslite_amp_only_css', '' );}
function bunnypresslite_amp_only_header() { return get_theme_mod( 'bunnypresslite_amp_only_header', '' );}
function bunnypresslite_amp_only_body() { return get_theme_mod( 'bunnypresslite_amp_only_body', '' );}
function bunnypresslite_display_sitename() { return get_theme_mod( 'bunnypresslite_display_sitename', '1' );}
function bunnypresslite_fd_htaccess() { return get_theme_mod( 'bunnypresslite_fd_htaccess', '' );}
function bunnypresslite_hbg_color() { return get_theme_mod( 'bunnypresslite_hbg_color', '' );}
function bunnypresslite_bg_color() { return get_theme_mod( 'bunnypresslite_bg_color', '' );}
function bunnypresslite_fontcolor() { return get_theme_mod( 'bunnypresslite_fontcolor','#333333' );}
function bunnypresslite_hd_color() { return get_theme_mod( 'bunnypresslite_header_description_color','' );}
function bunnypresslite_st_color() { return get_theme_mod( 'bunnypresslite_site_title_color','' );}
function bunnypresslite_link_color() { return get_theme_mod( 'bunnypresslite_link_color','#0066cc');}
function bunnypresslite_linkh_color() { return get_theme_mod( 'bunnypresslite_link_hover_color','#cc0000');}
function bunnypresslite_fbg_color() { return get_theme_mod( 'bunnypresslite_footer_bg_color','' );}
function bunnypresslite_ff_color() { return get_theme_mod( 'bunnypresslite_footer_font_color','' );}
function bunnypresslite_fl_color() { return get_theme_mod( 'bunnypresslite_footer_link_color','' );}
function bunnypresslite_flh_color() { return get_theme_mod( 'bunnypresslite_footer_link_h_color','' );}
function bunnypresslite_g_analysis() { return get_theme_mod( 'bunnypresslite_g_analysis', '' ); }
function bunnypresslite_analysis() { return get_theme_mod( 'bunnypresslite_analysis', '' ); }
function bunnypresslite_smc() { return '#' . get_theme_mod( 'bunnypresslite_site_main_color','6b5344' );}
function bunnypresslite_sc() { return '#' . get_theme_mod( 'bunnypresslite_sitecolor','ff9999' );}
function bunnypresslite_smco() { return get_theme_mod( 'bunnypresslite_site_main_color_other','#000000' );}
function bunnypresslite_sco() { return get_theme_mod( 'bunnypresslite_sitecolor_other','#000000' );}
function bunnypresslite_schc() { return get_theme_mod( 'bunnypresslite_sitecolor_hc','' );}
function bunnypresslite_fs() { return get_theme_mod( 'bunnypresslite_fontsize','15' );}
function bunnypresslite_spfs() { return get_theme_mod( 'bunnypresslite_sp_fontsize','14' );}
function bunnypresslite_display_toppage() { return get_theme_mod( 'bunnypresslite_display_toppage_radio','' );}

function bunnypresslite_sanitize_checkbox( $bunnypresslite_checked ) {
	return ( ( isset( $bunnypresslite_checked ) && true == $bunnypresslite_checked ) ? true : false );
}

function bunnypresslite_sanitize_select( $bunnypresslite_input, $bunnypresslite_setting ) {
	$bunnypresslite_input = sanitize_key( $bunnypresslite_input );
	$bunnypresslite_choices = $bunnypresslite_setting->manager->get_control($bunnypresslite_setting->id)->choices;
	return ( array_key_exists( $bunnypresslite_input, $bunnypresslite_choices ) ? $bunnypresslite_input : $bunnypresslite_setting->default );
}

function bunnypresslite_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function bunnypresslite_sanitize_num( $input ) {
	return preg_replace('/[^0-9,]/', '', $input);
}

function bunnypresslite_sanitize_meta( $input ) {

	$allowed_html = array(
		'meta' => array( 'name' => array (), 'content' => array (), 'http-equiv' => array(), 'charset' => array() ),
		'link' => array( 'rel' => array (), 'href' => array (), 'type' => array (), 'id' => array (), 'media' => array (), 'title' => array () ),
		'script' => array( 'src' => array (), 'charset' => array (), 'type' => array (), 'id' => array (), 'title' => array (), 'async' => array (), 'defer' => array () ),
	);

	return wp_kses( $input , $allowed_html );
}

function bunnypresslite_sanitize_analysis( $input ) {

	$allowed_html = array(
		'a' => array( 'id' => array (), 'class' => array (), 'href' => array (), 'onclick' => array (), 'target' => array() ),
		'div' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'img' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array (), 'src' => array (), 'data-src' => array (), 'data-lazy-src' => array (), 'border' => array (), 'width' => array (), 'height' => array () ),
		'amp-img' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'layout' => array (), 'align' => array (), 'src' => array (), 'border' => array (), 'width' => array (), 'height' => array () ),
		'p' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'span' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'br' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'ul' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'ol' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'li' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'table' => array( 'id' => array (), 'class' => array (), 'border' => array (), 'width' => array (), 'cellspacing' => array (), 'cellpadding' => array() ),
		'tr' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'th' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'td' => array( 'id' => array (), 'class' => array (), 'style' => array (), 'align' => array () ),
		'noscript' => array( ),
		'script' => array( 'src' => array (), 'charset' => array (), 'type' => array (), 'id' => array (), 'title' => array (), 'async' => array (), 'defer' => array () ),
		'ins' => array( 'class' => array (), 'style' => array (), 'data-ad-layout' => array (), 'data-ad-format' => array (), 'data-ad-client' => array (), 'data-ad-slot' => array () ),
	);

	return wp_kses( $input , $allowed_html );
}
