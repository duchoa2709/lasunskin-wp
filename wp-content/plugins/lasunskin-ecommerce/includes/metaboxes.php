<?php
//product screen: màn hình chỉnh sửa, thêm sản phẩm
// đăng kí metebox cho sp
add_action( 'add_meta_boxes', 'lasunskin_meta_box_product');

// lưu dữ liệu vào db
add_action( 'save_post', 'lasunskin_save_product' );

function lasunskin_meta_box_product() {
    add_meta_box(
        'lasunskin_product_price',
        __('Giá sản phẩm', 'lasunskin-ecommerce'),
        'lasunskin_product_price_html',
        'product',
    );
}

function lasunskin_save_product($post_id) {
    if (isset($_POST['post_type']) && $_POST['post_type'] == 'product') {
        $product_price      = isset($_POST['product_price']) ? $_POST['product_price'] : '';
        $product_price_sale = isset($_POST['product_price_sale']) ? $_POST['product_price_sale'] : '';
        $product_stock      = isset($_POST['product_stock']) ? $_POST['product_stock'] : '';
        // Lưu vào CSDL
        update_post_meta($post_id, 'product_price', $product_price);
        update_post_meta($post_id, 'product_price_sale', $product_price_sale);
        update_post_meta($post_id, 'product_stock', $product_stock);
    }
}


function lasunskin_product_price_html() {
    include_once lasunskin_PATH.'includes/templates/meta_box_product.php';
}

//category screen: màn hình chỉnh sửa, thêm danh mục
// đăng kí metebox cho sp
add_action( 'product_cat_add_form_fields', 'lasunskin_meta_box_product_cat_add');

// form lúc chỉnh sửa
add_action( 'product_cat_edit_form_fields', 'lasunskin_meta_box_product_cat_edit',10,2);

function lasunskin_meta_box_product_cat_add() {
    include_once lasunskin_PATH.'includes/templates/meta_box_product_cat_add.php';
}

function lasunskin_meta_box_product_cat_edit($tag, $taxonomy) {
    include_once lasunskin_PATH.'includes/templates/meta_box_product_cat_edit.php';
}


add_action('create_product_cat', 'lasunskin_meta_box_product_cat_save',10,1);
add_action('edit_product_cat','lasunskin_meta_box_product_cat_save',10,1);

function lasunskin_meta_box_product_cat_save($term_id){
    $image = $_POST['image'];
    update_term_meta($term_id, 'image', $image);
}
