<?php

// REGISTER POST TYPE: PROJECT
function create_post_type(){
    $label = array(
        'name' => __('Project', 'linkhay'),
    	'singular_name' => __('project', 'linkhay'),
    	'add_new' => __('Thêm project mới', 'linkhay'),
    	'add_new_item' => __('Thêm project mới', 'linkhay'),
    	'edit_item' => __('Chỉnh sửa project', 'linkhay'),
    	'new_item' => __('Project', 'linkhay'),
    	'view_item' => __('Xem project', 'linkhay'),
    	'search_items' => __('Tìm project', 'linkhay'),
    	'not_found' => __('Không có project nào', 'linkhay'),
    	'not_found_in_trash' => __('Không có project nào trong thùng rác', 'linkhay'),
    	'all_items' => __('Tất cả project', 'linkhay'),
    	'menu_name' => __('project', 'linkhay'),
    	'name_admin_bar' => __('project', 'linkhay'),
    );
 
    $args = array(
        'labels'              => $label,
        'description'         => __('Tất cả project', 'linkhay'),
        'supports'            => array( 'title', 'editor', 'parent', 'revisions', 'thumbnail', 'comments'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true, 
        'show_in_menu'        => false,
        'show_in_nav_menus'   => true, 
        'show_in_admin_bar'   => true,
        'menu_position'       => 5, 
        'menu_icon'           => '', 
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post'
    );
 
    register_post_type('project', $args);
}
add_action( 'init', 'create_post_type' );

// taxonomy tacgia
// function projet_add_author(){

// 	$args = array(
// 		'labels'            => array(
// 			'name'      => __('Tác giả', 'linkhay'),
// 			'singular'  => __('Tác giả', 'linkhay'),
// 			'menu-name' => __('Tác giả', 'linkhay')
// 		),
// 		'hierarchical'      => false,
// 		'public'            => true,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'show_tagcloud'     => true,
// 		'show_in_nav_menus' => true,
// 		'rewrite'           => array( 'slug' => 'tac-gia' )
// 	);

// 	register_taxonomy('tac-gia', 'post', $args);

// }
// add_action('init', 'projet_add_author', 0);