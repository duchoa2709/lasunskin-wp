<?php
//tao bang
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
//dbDelta($sql);
global $wpdb;
$charset_collate = $wpdb->get_charset_collate();
$tbl_orders = $wpdb->prefix.'lasunskin_orders';//wp_lsk_lasunskin_orders
$tbl_orders_detail = $wpdb->prefix.'lasunskin_orders_detail';//wp_lsk_lasunskin_orders_detail

$sql = "CREATE TABLE `$tbl_orders` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `created` date DEFAULT NULL,
    `total` double DEFAULT NULL,
    `status` varchar(255) DEFAULT 'pending',
    `payment_method` varchar(255) DEFAULT NULL,
    `customer_name` varchar(255) DEFAULT NULL,
    `customer_phone` varchar(255) DEFAULT NULL,
    `customer_address` text DEFAULT NULL,
    `customer_email` varchar(25) DEFAULT NULL,
    `note` text DEFAULT NULL,
    `deleted` tinyint(4) NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`)
) ".$charset_collate.";";   
dbDelta($sql);

$sql = "CREATE TABLE `$tbl_orders_detail` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `order_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `price` double NOT NULL,
    PRIMARY KEY (`id`)
) ".$charset_collate.";";
dbDelta($sql);