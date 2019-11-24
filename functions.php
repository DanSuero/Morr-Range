<?php
    function MorrRange_setup(){
        load_theme_textdomain('morrRange');

        add_theme_support( 'title-tag' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

		add_image_size('front-page', 255,191, true);
		add_image_size('store-page', 253,189, true);

        register_nav_menus( array(
        	'main-menu' => 'Main Menu',
	        'main-menu-mobile' => 'Main Menu Mobile'
        ));
    }
    add_action( 'after_setup_theme', 'MorrRange_setup' );

    function MorrRange_scripts(){
        wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,300i,400i,500,500i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Cardo:400,400i,700');
        wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/assets/css/bootstrap.min.css" );
        wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/assets/css/font-awesome.min.css" );
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_script( 'jQuery', get_template_directory_uri().'/assets/js/jquery.min.js' );
		wp_enqueue_script( 'jQuery-Migrate', get_template_directory_uri().'/assets/js/jquery-migrate.min.js' );
        wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.js' );
        wp_enqueue_script( 'bootstrapjs', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js' );
        wp_enqueue_script('script.js', get_template_directory_uri().'/assets/js/script.js');
    }
    add_action( 'wp_enqueue_scripts', 'MorrRange_scripts' );

    class b4st_walker_nav_menu extends Walker_Nav_menu {
        function start_lvl( &$output, $depth = 0, $args = array() ){ // ul
            $indent = str_repeat("\t",$depth); // indents the outputted HTML
            $submenu = ($depth > 0) ? ' sub-menu' : '';
            $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
        }

        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span
            $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
            $li_attributes = '';
            $class_names = $value = '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
            $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
            $classes[] = 'nav-item';
            $classes[] = 'nav-item-' . $item->ID;

            if( $depth && $args->walker->has_children ){
                $classes[] = 'dropdown-menu dropdown-menu-right';
            }

            $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr($class_names) . '"';

            $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
            $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

            $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
            $attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle text-center px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link px-3 text-center"';

            $item_output = $args->before;
            $item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    // Register Custom Post Type
    function custom_post_type() {

        $labels = array(
            'name'                  => 'New/Used Guns',
            'singular_name'         => 'New/Used Gun',
            'menu_name'             => 'New/Used Guns',
            'name_admin_bar'        => 'New/Used Guns',
            'archives'              => 'Gun Archives',
            'attributes'            => 'Gun Attributes',
            'parent_item_colon'     => 'Parent Item:',
            'all_items'             => 'All Guns',
            'add_new_item'          => 'Add New/Used Gun',
            'add_new'               => 'Add New/Used Gun',
            'new_item'              => 'New Gun',
            'edit_item'             => 'Edit Gun',
            'update_item'           => 'Update Gun',
            'view_item'             => 'View Item',
            'view_items'            => 'View Guns',
            'search_items'          => 'Search Gun',
            'not_found'             => 'Gun Not found',
            'not_found_in_trash'    => 'Gun Not found in Trash',
            'featured_image'        => 'Featured Image',
            'set_featured_image'    => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image'    => 'Use as featured image',
            'insert_into_item'      => 'Insert into gun listing',
            'uploaded_to_this_item' => 'Uploaded to listing',
            'items_list'            => 'Guns list',
            'items_list_navigation' => 'Gun list navigation',
            'filter_items_list'     => 'Filter Guns list',
        );
        $rewrite = array(
            'slug'                  => 'newandusedguns',
            'with_front'            => true,
        );
        $args = array(
            'label'                 => 'New/Used Gun',
            'description'           => 'New & Used Gun for sale',
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        register_post_type( 'gun', $args );

    }
    add_action( 'init', 'custom_post_type', 0 );

    function wpdocs_custom_excerpt_length( $length ) {
		return 10;
    }
    add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

    function adding_gun_metaboxes (){
        add_meta_box('new-used-guns','Gun Details','gun_details_inputs', 'gun', 'normal');
    }
    add_action('add_meta_boxes', 'adding_gun_metaboxes');

    function gun_details_inputs($post){
        wp_nonce_field('gun_details_saving_data','gun_details_nonce');
        require get_template_directory().'/assets/inc/gunDetails.php';
    }

    function gun_details_saving_data($post_id){
        if(!isset($_POST["gun_details_nonce"])){
            return;
        }
        if(!wp_verify_nonce($_POST["gun_details_nonce"],'gun_details_saving_data')){
            return;
	    }
        if(!current_user_can('edit_post', $post_id)){
            return;
	    }

        $getData = ['gun-price', 'gun-buy-local', 'gun-ebay-link', 'gun-gunBroker-link'];

        foreach($getData as $value ){
            $gun_data[] .= $_POST[$value];
        }

	   update_post_meta($post_id, '_gun_detials', $gun_data);
       update_post_meta($post_id, '_gun_featured', $_POST['feature-gun']);
    }
    add_action('save_post', 'gun_details_saving_data');

	function setting_gun_columns(){
		$columns = array('cb' => '<input type="checkbox" />', 'title' => 'Title', 'author' => 'Author', 'date' => 'Date');
		return $columns;
	}
	add_filter('manage_gun_posts_columns', 'setting_gun_columns' );

    function b4st_pagination() {
		global $wp_query;
		$big = 999999999; // This needs to be an unlikely integer
		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 5,
			'prev_next' => True,
			'prev_text' => __('<i class="fa fa-angle-left"></i> Newer'),
			'next_text' => __('Older <i class="fa fa-angle-right"></i>'),
			'type' => 'list'
		) );

		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination'>", $paginate_links );
		$paginate_links = str_replace( "<li><span aria-current='page' class='page-numbers current'>", '<li class="page-item active"><a class="page-link" href="#">', $paginate_links );
    	$paginate_links = str_replace( "<li>", "<li class='page-item'>", $paginate_links );
		$paginate_links = str_replace( "<a", "<a class='page-link' ", $paginate_links );
		$paginate_links = str_replace( "</span>", "</a>", $paginate_links );
		$paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo $paginate_links;
		}
	}

	add_filter( 'gform_field_container', 'add_bootstrap_container_class', 10, 6 );
    function add_bootstrap_container_class( $field_container, $field, $form, $css_class, $style, $field_content ) {
      $id = $field->id;
      $field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";
      return '<li id="' . $field_id . '" class="' . $css_class . 'form-group">{FIELD_CONTENT}</li>';
    }
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function create_post_type() {
    register_post_type( 'rentals',
        array(
            'labels' => array(
                'name'=> _('Rental Guns'),
                'singular_name' => _('Rental Guns')
             ),
            'public' => true,
            'has_archive' => true,
			'taxonomies'          => array( 'category', 'post_tag' ),
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ) 

        )
    );
	    register_post_type( 'team',
        array(
            'labels' => array(
                'name'=> _('Team'),
                'singular_name' => _('Team')
             ),
            'public' => true,
            'has_archive' => true,
			'taxonomies'          => array( 'category', 'post_tag' ),
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ) 

        )
    );
}
add_action( 'init', 'create_post_type' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Alert Bar',
		'menu_title'	=> 'Alert Bar',
		'menu_slug' 	=> 'alert-bar',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	

	
}
?>