<?php
if (!function_exists('dd')) {
    function dd($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}

if (!function_exists('pr')) {
    function pr($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('custom_redirect')) {
    function custom_redirect($url) {
        echo "<script>window.location.href = '$url'</script>";
    }
}