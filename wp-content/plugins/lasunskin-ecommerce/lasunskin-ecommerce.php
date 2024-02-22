<?php
/**
 * Plugin Name: lasunsin-ecommerce
 * Plugin URI: #
 * Description: lasunsin-ecommerce plugin
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: DucHoa
 * Author URI: #
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: #
 * Text Domain: lasunskin-ecommerce
 * Domain Path: /languages
 */
//plugin_dir_path(__FILE__) => C:\xampp\htdocs\wordpress\wp-content\plugins\lasunskin-ecommerce\
define('lasunskin_PATH', plugin_dir_path(__FILE__));
//plugin_dir_url(__FILE__) => http://localhost/wordpress/wp-content/plugins/lasunskin-ecommerce/
define('lasunskin_URL', plugin_dir_url(__FILE__));

add_action( 'init', 'lasunskin_load_textdomain' );
function lasunskin_load_textdomain() {
    load_plugin_textdomain( 'lasunskin-ecommerce', false, lasunskin_PATH . '/languages' );
}

function lasunskin_load_textdomain_mofile( $mofile, $domain ) {
    // var_dump(lasunskin_PATH);
    // die();
	if ( 'lasunskin-ecommerce' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
		$locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
		$mofile = lasunskin_PATH . '/languages/' . $domain . '-' . $locale . '.mo';
        // var_dump($mofile);
        // die();
        // C:\xampp\htdocs\wordpress\wp-content\plugins\lasunskin-ecommerce\languages\lasunskin-ecommerce-vi_VN.mo
	}
	return $mofile;
}
add_filter( 'load_textdomain_mofile', 'lasunskin_load_textdomain_mofile', 10, 2 );

register_activation_hook(__FILE__, 'lasunsin_ecommerce_activation');
function lasunsin_ecommerce_activation()
{
    //Tạo cơ sở dữ liệu
    include_once lasunskin_PATH.'includes/db/migration.php';
    //Tạo dữ liệu mẫu
    include_once lasunskin_PATH.'includes/db/seeder.php';
    //Tạo option
    update_option('lasunskin_settings_options',[]);
}

register_deactivation_hook(__FILE__, 'lasunsin_ecommerce_deactivation');
function lasunsin_ecommerce_deactivation()
{
    //Xóa cơ sở dữ liệu
    //include_once lasunskin_PATH.'includes/db/migration-rollback.php';
    //Xóa option
    //delete_option('lasunskin_settings_options');
}

include_once lasunskin_PATH.'includes/includes.php';
?>
