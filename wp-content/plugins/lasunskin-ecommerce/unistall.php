<?php
//dinh nghia cac hanh dong khi plugin bi go

// if uninstall.php is not called by WordPress, die
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

//xoa csdl
include_once lasunskin_PATH.'includes/db/migration-rollback.php';
//xoa option
delete_option('lasunskin_settings_options');
