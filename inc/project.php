<?php
// Register Custom Post Type

function create_project_post_type() {

	$labels = array(
		'name'                  => _x( 'Project', 'Post Type General Name', 'linkhay' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'linkhay' ),
		'menu_name'             => __( 'All Project', 'linkhay' ),
		'name_admin_bar'        => __( 'Project', 'linkhay' ),
		'archives'              => __( 'Item Archives', 'linkhay' ),
		'attributes'            => __( 'Item Attributes', 'linkhay' ),
		'parent_item_colon'     => __( 'Parent Item:', 'linkhay' ),
		'all_items'             => __( 'Tất cả dự án', 'linkhay' ),
		'add_new_item'          => __( 'Thêm dự án mới', 'linkhay' ),
		'add_new'               => __( 'Thêm mới', 'linkhay' ),
		'new_item'              => __( 'Thêm dự án mới', 'linkhay' ),
		'edit_item'             => __( 'Chỉnh sửa dự án', 'linkhay' ),
		'update_item'           => __( 'Cập nhật dự án', 'linkhay' ),
		'view_item'             => __( 'Xem dự án', 'linkhay' ),
		'items_list'            => __( 'Items list', 'linkhay' ),
		'items_list_navigation' => __( 'Items list navigation', 'linkhay' ),
		'filter_items_list'     => __( 'Filter items list', 'linkhay' ),
	);
	$args = array(
		'label'                 => __( 'Dự án', 'linkhay' ),
		'description'           => __( 'Post Type Description', 'linkhay' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'parent', 'thumbnail', 'comments'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'create_project_post_type', 0 );

?>