<?php
//đăng ký post_types và taxonomy
include_once lasunskin_PATH.'includes/post_types.php';

//đăng kí metaboxes
include_once lasunskin_PATH.'includes/metaboxes.php';

//Thêm các cột custom vào màn hình quản lý danh mục
include_once lasunskin_PATH.'includes/admin-columns.php';

//tao menu cho admin
include_once lasunskin_PATH.'includes/admin_menus.php';

//Tạo trang setting cho admin
include_once lasunskin_PATH.'includes/admin_settings.php';

//Làm việc với CSDL trong wp
include_once lasunskin_PATH.'includes/classes/lassunskinOrder.php';

//dang ki function
include_once lasunskin_PATH.'includes/functions.php';

//dang ki ajaxs
include_once lasunskin_PATH.'includes/admin_ajaxs.php';

//dang ki apis
include_once lasunskin_PATH.'includes/apis.php';
