<?php
// Đăng ký loại post mới
add_action('init', 'lasunskin_custom_post_type');

function lasunskin_custom_post_type() {
    register_post_type('product',
        array(
            'labels' => array(
                'name' => __('Các Sản Phẩm', 'lasunskin-ecommerce'), // Tên gọi nhiều sản phẩm
                'singular_name' => __('Sản Phẩm', 'lasunskin-ecommerce'), // Tên gọi một sản phẩm
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        )
    );
}

//dang ki loai taxonomy
add_action('init', 'lasunskin_custom_taxonomy');

function lasunskin_custom_taxonomy() {
    $labels = array(
        'name'              => _x( 'Danh Mục', 'taxonomy general name' ),
        'singular_name'     => _x( 'Danh Mục', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Danh Mục' ),
        'all_items'         => __( 'All Danh Mục' ),
        'parent_item'       => __( 'Parent Danh Mục' ),
        'parent_item_colon' => __( 'Parent Danh Mục:' ),
        'edit_item'         => __( 'Edit Danh Mục' ),
        'update_item'       => __( 'Update Danh Mục' ),
        'add_new_item'      => __( 'Add New Danh Mục' ),
        'new_item_name'     => __( 'New Danh Mục Name' ),
        'menu_name'         => __( 'Danh Mục' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [ 'slug' => 'course' ],
    );
    register_taxonomy( 'product_cat', [ 'product' ], $args );
}


//---------------------------------------------------------------------------------------------

add_action('init', 'lasunskin_custom_order_type'); // gọi hàm tạo post type

function lasunskin_custom_order_type() { // hàm tạo post type
    register_post_type('product',
        array(
            'labels' => array(
                'name' => __('Các Đơn Hàng', 'lasunskin-orders'), // Tên gọi nhiều sản phẩm
                'singular_name' => __('Đơn Hàng', 'lasunskin-order'), // Tên gọi một sản phẩm
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        )
    );
}

// //dang ki loai taxonomy
// add_action('init', 'lasunskin_order_taxonomy');

// function lasunskin_order_taxonomy() {
//     $labels = array(
//         'name'              => _x( 'Danh Mục', 'taxonomy general name' ),
//         'singular_name'     => _x( 'Danh Mục', 'taxonomy singular name' ),
//         'search_items'      => __( 'Search Danh Mục' ),
//         'all_items'         => __( 'All Danh Mục' ),
//         'parent_item'       => __( 'Parent Danh Mục' ),
//         'parent_item_colon' => __( 'Parent Danh Mục:' ),
//         'edit_item'         => __( 'Edit Danh Mục' ),
//         'update_item'       => __( 'Update Danh Mục' ),
//         'add_new_item'      => __( 'Add New Danh Mục' ),
//         'new_item_name'     => __( 'New Danh Mục Name' ),
//         'menu_name'         => __( 'Danh Mục' ),
//     );
//     $args   = array(
//         'hierarchical'      => true, // make it hierarchical (like categories)
//         'labels'            => $labels,
//         'show_ui'           => true,
//         'show_admin_column' => true,
//         'query_var'         => true,
//         'rewrite'           => [ 'slug' => 'course' ],
//     );
//     register_taxonomy( 'product_order', [ 'product' ], $args );
// }