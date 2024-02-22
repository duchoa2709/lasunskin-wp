<?php
add_action('admin_menu','lasunskin_admin_menu');
function lasunskin_admin_menu(){
    add_menu_page(
        __('Lasunskin Ecommerce','lasunskin-ecommerce'),
        __('Lasunskin Ecommerce','lasunskin-ecommerce'),
        'manage_options',
        'lasunskin-ecommerce',
        'lasunskin_admin_menu_page',
        'dashicons-menu',
        25
    );
        add_submenu_page(
        'lasunskin-ecommerce',  //parent slug 
        'Đơn Hàng',             //page title
        'đơn hàng',             //menu title
        'manage_options',       //capability
        'lasunskin-orders',      //menu slug,
        'lasunskin_order_page', //callback function
        26                      //position
    );

        add_submenu_page(
        'lasunskin-ecommerce',
        'Settings',
        'Setting',
        'manage_options',
        'lasunskin-settings',
        'lasunskin_setting_page',
        26
    );
}

function lasunskin_admin_menu_page() {
    include_once lasunskin_PATH.'includes/admin_pages/dashboard.php';
}

function lasunskin_order_page() {
    include_once lasunskin_PATH.'includes/admin_pages/orders.php';
}

function lasunskin_setting_page() {
    include_once lasunskin_PATH.'includes/admin_pages/settings.php';
}