<?php
// functions.php hoặc file tương tự
add_action( 'wp_ajax_lasunkin_order_change_status', 'lasunkin_order_change_status' );
add_action( 'wp_ajax_nopriv_lasunkin_order_change_status', 'lasunkin_order_change_status' );

function lasunkin_order_change_status() {
    if (isset($_REQUEST['order_id']) && isset($_REQUEST['status'])) {
        $order_id = $_REQUEST['order_id'];
        $status = $_REQUEST['status'];
        $nonce = $_REQUEST['_nonce'];

        if (wp_verify_nonce($nonce, 'lasunskin_save_order')) {
            $lassunskinOrder = new lasunskinOrder();
            $result = $lassunskinOrder->update($order_id, ['status' => $status]);
            $res = [
                'success' => true, // true or false
            ];
        }
        else {
            $res = [
                'success' => false, // true or false
            ];
        }

        // Trả về kết quả dưới dạng JSON
        wp_send_json($res);
    } else {
        // Trả về lỗi nếu thiếu tham số order_id hoặc status
        $res = [
            'success' => false,
            'error' => 'Missing order_id or status parameter.',
        ];
        wp_send_json($res);
    }
}