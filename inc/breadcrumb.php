<?php function bunnypresslite_breadcrumb(){
if( !is_single() ) { ?>
<ul id="breadcrumb" class="bunnypresslite_bc" itemscope itemtype="https://schema.org/BreadcrumbList">
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list breadcrumb_home"><a href="<?php echo esc_url( home_url() ); ?>" itemprop="item"><span itemprop="name"><?php esc_html_e( 'Home' , 'bunnypresslite'); ?></span></a><meta itemprop="position" content="1" /></li>
<?php }
	
	if( is_single() ) {

		$catdata = get_the_category();
		for ( $i = 0; $i < count($catdata); $i++){ ?>
<ul id="breadcrumb<?php echo absint( $i ); ?>" class="bunnypresslite_bc" itemscope itemtype="https://schema.org/BreadcrumbList">
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list breadcrumb_home"><a href="<?php echo esc_url( home_url() ); ?>" itemprop="item"><span itemprop="name"><?php esc_html_e( 'Home' , 'bunnypresslite'); ?></span></a><meta itemprop="position" content="1" /></li>
		<?php
		$catdata = get_the_category();
		$cat_id = $catdata[$i]->cat_ID;
		$cats = array($cat_id);

		while( $cat_id ) {
			$get_cat = get_category($cat_id);
			$cat_id = $get_cat->parent;
			array_push($cats, $cat_id);
		}

		array_pop($cats);
		$cats = array_reverse($cats);
		$j=1;
		foreach( $cats as $cat_id ): $j++; ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_category_link($cat_id) ); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html( get_cat_name($cat_id) ); ?></span></a><meta itemprop="position" content="<?php echo absint( $j ); ?>" /></li>
		<?php endforeach; ?>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php the_title(); ?></span></a><meta itemprop="position" content="<?php echo absint( $j+1 ); ?>" /></li></ul>
		<?php }
	
	} elseif( is_author() ) { ?>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html( get_the_author_meta('display_name', get_query_var('author') ) ); ?></span></a><meta itemprop="position" content="2" /></li>
	<?php } elseif( is_tax() ) {

        $query_obj = get_queried_object();
        $post_types = get_taxonomy( $query_obj->taxonomy )->object_type;
        $cpt = $post_types[0]; ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_post_type_archive_link( $cpt ) ); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html( get_post_type_object( $cpt )->label ); ?></span></a><meta itemprop="position" content="2" /></li>
		<?php
        $taxonomy = get_query_var( 'taxonomy' );
        $term = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
        if ( is_taxonomy_hierarchical( $taxonomy ) && $term->parent != 0 ) {
            $ancestors = array_reverse( get_ancestors( $term->term_id, $taxonomy ) );
			$j=2;
            foreach ( $ancestors as $ancestor_id ) { ++$j;

                $ancestor = get_term( $ancestor_id, $taxonomy ); ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_term_link( $ancestor, $term->slug ) ); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html( $ancestor->name ); ?></span></a><meta itemprop="position" content="<?php echo absint( $j ); ?>" /></li>
            <?php }
        } ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html($term->name); ?></span></a><meta itemprop="position" content="<?php echo absint( $j+1 ); ?>" /></li>
	<?php } elseif( is_category() || is_tag() ) {
		
		$cat_id = get_query_var('cat');
		$cats = array();

		while( $cat_id != 0 ) {
			$get_cat = get_category($cat_id);
			$cat_id = $get_cat->parent;
			array_push($cats, $cat_id);
		}

		array_pop($cats);
		$cats = array_reverse($cats);
		$j=1;
		foreach($cats as $cat_id): $j++; ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_category_link($cat_id) ); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html( get_cat_name($cat_id) ); ?></span></a><meta itemprop="position" content="<?php echo absint( $j ); ?>" /></li>
		<?php endforeach; ?>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php single_cat_title(); ?></span></a><meta itemprop="position" content="<?php echo absint( $j+1 ); ?>" /></li>
	<?php } elseif( is_archive() ) { ?>

		<?php if(is_day()) { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_year_link(get_the_date('Y')) ); ?>" itemprop="item"><span itemprop="name"><?php /* translators: %s: year */ printf( esc_html__( 'Year:%s','bunnypresslite' ), get_the_date('Y') ); ?></span></a><meta itemprop="position" content="2" /></li>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_month_link( get_query_var('year'), get_query_var('monthnum') ) ); ?>" itemprop="item"><span itemprop="name"><?php /* translators: %s: month */ printf( esc_html__( 'Month:%s','bunnypresslite' ), get_the_date('n') ); ?></span></a><meta itemprop="position" content="3" /></li>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php /* translators: %s: day */ printf( esc_html__( 'Day:%s','bunnypresslite' ), get_the_date('j') ); ?></span></a><meta itemprop="position" content="4" /></li>
		<?php }elseif(is_month()) { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_year_link(get_the_date('Y')) ); ?>" itemprop="item"><span itemprop="name"><?php /* translators: %s: year */ printf( esc_html__( 'Year:%s','bunnypresslite' ), get_the_date('Y') ); ?></span></a><meta itemprop="position" content="2" /></li>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php /* translators: %s: month */ printf( esc_html__( 'Month:%s','bunnypresslite' ), get_the_date('n') ); ?></span></a><meta itemprop="position" content="3" /></li>
		<?php }elseif(is_year()) { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php /* translators: %s: year */ printf( esc_html__( 'Year:%s','bunnypresslite' ), get_the_date('Y') ); ?></span></a><meta itemprop="position" content="2" /></li>
		<?php }else{ ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php the_archive_title(); ?></span></a><meta itemprop="position" content="2" /></li>
		<?php } ?>

	<?php } elseif( is_search() ) { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php /* translators: %s: search term */ printf( esc_html__( 'Search results for "%s"','bunnypresslite' ), get_search_query( '',false ) ); ?></span></a><meta itemprop="position" content="2" /></li>
	<?php } elseif( is_404() ) { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php esc_html_e('Error 404 Not Found','bunnypresslite'); ?></span></a><meta itemprop="position" content="2" /></li>
	
	<?php } elseif( is_home() || is_front_page() ) { ?>

	<?php } elseif(is_page()) { ?>
		<?php global $post; if( $post->post_parent ) { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_list"><a href="<?php echo esc_url( get_page_link($post->post_parent) ); ?>" itemprop="item"><span itemprop="name"><?php echo esc_html( get_the_title($post->post_parent) ); ?></span></a><meta itemprop="position" content="2" /></li>
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php the_title(); ?></span></a><meta itemprop="position" content="3" /></li>
		<?php } else { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php the_title(); ?></span></a><meta itemprop="position" content="2" /></li>
		<?php } ?>
	<?php } else { ?>
<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumb_last"><a href="<?php echo esc_url( bunnypresslite_get_url() ); ?>" itemprop="item"><span itemprop="name"><?php the_title(); ?></span></a><meta itemprop="position" content="2" /></li>
<?php }
if( !is_single() ) echo '</ul>';
}
if( bunnypresslite_display_breadcrumb() == '1' ) echo wp_kses_post( bunnypresslite_breadcrumb() );
if( bunnypresslite_display_breadcrumb() == '2' ) { if( !is_home() && !is_front_page() ) echo wp_kses_post( bunnypresslite_breadcrumb() ); }
?>
