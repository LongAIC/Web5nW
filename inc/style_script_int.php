<?php
$style_file = array(
	'animate'	=> 'css/animate.css',
	'magnific'	=>	'css/magnific-popup.css',
	'style'		=> 'style.css',
	'respon'	=>	'css/respon.css',
	'Bootstap'	=>	'css/Bootstap.css',
	'font-awesome.min'	=>	'fonts/font-awesome.min.css',
	'carousel'	=>	'css/owl.carousel.min.css',
	'default'	=>	'css/owl.theme.default.min.css',
);
$script_file = array(
    'wow'  =>  'js/wow.min.js',
    'jquery'  =>  'js/jquery.min.js',
	'Bootstap'  =>  'js/Bootstap.js',
    'magnific'  =>  'js/jquery.magnific-popup.js',
	'carousel'	=>	'js/owl.carousel.min.js',
    'iso'	=>	'js/iso.js',
);
function useAjaxInWp() {
	global $style_file,$script_file;
	//Style
	if(!DEVVN_DEV_MODE){
		wp_register_style( 'style', esc_url( trailingslashit( get_template_directory_uri() ) . 'style.css' ),array(), DEVVN_VERSION, 'all' );
	}else{	
		foreach ($style_file as $k=>$v){
			wp_register_style( $k, esc_url( trailingslashit( get_template_directory_uri() ) . $v ),array(), DEVVN_VERSION, 'all' );
		}
	}
	//Script
	if(!DEVVN_DEV_MODE){
		wp_register_script( 'devvn-main', esc_url( trailingslashit( get_template_directory_uri() ) . 'js/devvn.jquery.min.js' ), array( 'jquery' ), DEVVN_VERSION, true );
	}else{
		wp_register_script( 'devvn-main', esc_url( trailingslashit( get_template_directory_uri() ) . 'js/devvn_main.js' ), array( 'jquery' ), DEVVN_VERSION, true );
		foreach ($script_file as $k=>$v){
			wp_register_script( $k, esc_url( trailingslashit( get_template_directory_uri() ) . $v ),  array( 'jquery' ), DEVVN_VERSION, true );
		}	
	}
	$php_array = array( 
		'admin_ajax'		=>	admin_url( 'admin-ajax.php'),
		'home_url'			=>	home_url(),
		'tempURL'			=>	TEMP_URL,
	);
	wp_localize_script( 'devvn-main', 'devvn_array', $php_array );	
}
function enqueue_UseAjaxInWp() {
	global $style_file,$script_file;
	if(!DEVVN_DEV_MODE){
		wp_enqueue_style( 'style' );	
	}else{	
		foreach ($style_file as $k=>$v){
			wp_enqueue_style( $k );
		}
	}
	if(!DEVVN_DEV_MODE){
		wp_enqueue_script( 'devvn-main' );
	}else{
		foreach ($script_file as $k=>$v){
			wp_enqueue_script( $k );
		}
		wp_enqueue_script( 'devvn-main' );
	}
}
add_action( 'wp_enqueue_scripts', 'useAjaxInWp', 1 );
add_action( 'wp_enqueue_scripts', 'enqueue_UseAjaxInWp' );


function duan_func() {
    $labels = array(
        'name'                => _x( 'Kho Giao Di???n', 'Post Type General Name', 'bdw-theme' ),
        'singular_name'       => _x( 'Kho Giao Di???n', 'Post Type Singular Name', 'bdw-theme' ),
        'menu_name'           => __( 'Kho Giao Di???n', 'bdw-theme' ),
        'name_admin_bar'      => __( 'Kho Giao Di???n', 'bdw-theme' ),
        'parent_item_colon'   => __( 'Parent Item:', 'bdw-theme' ),
        'all_items'           => __( 'T???t c??? D??? ??n', 'bdw-theme' ),
        'add_new_item'        => __( 'Add New Item', 'bdw-theme' ),
        'add_new'             => __( 'Th??m m???i', 'bdw-theme' ),
        'new_item'            => __( 'New Item', 'bdw-theme' ),
        'edit_item'           => __( 'Edit Item', 'bdw-theme' ),
        'update_item'         => __( 'Update Item', 'bdw-theme' ),
        'view_item'           => __( 'View Item', 'bdw-theme' ),
        'search_items'        => __( 'Search Item', 'bdw-theme' ),
        'not_found'           => __( 'Not found', 'bdw-theme' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bdw-theme' ),
    );
    $rewrite = array(
        'slug'                => 'du-an',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'Kho Giao Di???n', 'bdw-theme' ),
        'description'         => __( 'Kho Giao Di???n', 'bdw-theme' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail','page-attributes' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-category',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => $rewrite,
        'capability_type'     => 'post'
    );
    register_post_type( 'du-an', $args );
}
// Hook into the 'init' action
add_action( 'init', 'duan_func', 0 );
// Register Custom Taxonomy
function cat_duan_func() {
    $labels = array(
        'name'                       => _x( 'Danh m???c D??? ??n', 'Taxonomy General Name', 'devvn' ),
        'singular_name'              => _x( 'Danh m???c D??? ??n', 'Taxonomy Singular Name', 'devvn' ),
        'menu_name'                  => __( 'Danh m???c D??? ??n', 'devvn' ),
        'all_items'                  => __( 'T???t c??? danh m???c', 'devvn' ),
        'parent_item'                => __( 'Parent Item', 'devvn' ),
        'parent_item_colon'          => __( 'Parent Item:', 'devvn' ),
        'new_item_name'              => __( 'New Item Name', 'devvn' ),
        'add_new_item'               => __( 'Th??m danh m???c m???i', 'devvn' ),
        'edit_item'                  => __( 'S???a danh m???c', 'devvn' ),
        'update_item'                => __( 'C???p nh???t danh m???c', 'devvn' ),
        'view_item'                  => __( 'Xem danh m???c', 'devvn' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'devvn' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'devvn' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'devvn' ),
        'popular_items'              => __( 'Popular Items', 'devvn' ),
        'search_items'               => __( 'Search Items', 'devvn' ),
        'not_found'                  => __( 'Not Found', 'devvn' ),
        
    );
    $rewrite = array(
        'slug'                       => 'danh-muc',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'danh-muc', array( 'du-an' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'cat_duan_func', 0 );
function tag_duan_func() 
{
  $labels = array(
    'name' => _x( 'Th??? D??? ??n', 'taxonomy general name' ),
    'singular_name' => _x( 'Th???', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Th???' ),
    'popular_items' => __( 'Popular Th???' ),
    'all_items' => __( 'T???t c??? Th???' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'S???a Th???' ), 
    'update_item' => __( 'C???p nh???t Th???' ),
    'add_new_item' => __( 'Th??m m???i Th???' ),
    'new_item_name' => __( 'T??n th??? m???i' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Th??? D??? ??n' ),
  ); 
  register_taxonomy('the','du-an',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'the-duan' ),
  ));
}
add_action( 'init', 'tag_duan_func', 0 );
