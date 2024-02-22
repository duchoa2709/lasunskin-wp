<?php 
//Hiển thị các cột posttype sản phẩm
add_filter('manage_product_posts_columns', 'lasunskin_product_filter_column');
function lasunskin_product_filter_column($comlumn){
    $comlumn['product_price'] = __('Giá sản phẩm');
    $comlumn['product_price_sale'] = __('Giá khuyến mãi');
    $comlumn['product_stock'] = __('Số lượng');
    return $comlumn;
}

//Hiển thị dữ liệu cho các cột
add_action('manage_product_posts_custom_column','lasunskin_product_render_column',10,2);
function lasunskin_product_render_column($comlumn,$post_id){

    switch ($comlumn) {
        case 'product_price':
            $product_price = get_post_meta($post_id,'product_price',true);
            echo number_format($product_price);
            break;
        case 'product_price_sale':
            $product_price_sale = get_post_meta($post_id,'product_price_sale',true);
            echo number_format($product_price_sale);
            break;
        case 'product_stock':
            echo get_post_meta($post_id,'product_stock',true);
            break;
    }
}  

//Hien thi cac cot taxonomy product_cat
add_filter('manage_edit-product_cat_columns', 'lasunskin_product_cat_filter_column');
function lasunskin_product_cat_filter_column($comlumn){
    $comlumn['image'] = __('Ảnh');
    return $comlumn;
}

//Hien thi gia tri cot image
add_action('manage_product_cat_custom_column','lasunskin_product_cat_render_column',10,3);
function lasunskin_product_cat_render_column($comlumn,$comlumn_name,$term_id){
    if($comlumn_name == 'image'){
        $image = get_term_meta($term_id,'image',true);
        echo $image;
    }
}

