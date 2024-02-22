<?php
//xoa csdl
global $wpdb;
$tbl_orders = $wpdb->prefix.'lasunskin_orders';//wp_lsk_lasunskin_orders
$tbl_orders_detail = $wpdb->prefix.'lasunskin_orders_detail';//wp_lsk_lasunskin_orders_detail

$sql = "DROP TABLE IF EXISTS $tbl_orders_detail";
$wpdb->query($sql);

$sql = "DROP TABLE IF EXISTS $tbl_orders";
$wpdb->query($sql);