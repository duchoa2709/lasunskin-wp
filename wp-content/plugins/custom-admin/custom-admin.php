<?php
/**
 * Plugin Name: Custom Admin
 * Plugin URI: #
 * Description: Custom Admin
 * Version: 1.0
 * Author: DucHoa
 * Author URI: #
 */

 /**
  * Add custom admin menu
  */

function dh_custom_logo() { ?>
    <style type="text/css">
    body {
        background-image: url(<?php echo plugins_url('images/bgaa.jpg', __FILE__); ?>) !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
    }

    #login h1 a {
        background-image: url(<?php echo plugins_url('images/Frame.svg', __FILE__); ?>);
        background-size: 100%;
    }

    #login form{
        box-shadow: 0 0 10px #000;
    }
    </style>
<?php 
}
add_action('login_enqueue_scripts', 'dh_custom_logo');
