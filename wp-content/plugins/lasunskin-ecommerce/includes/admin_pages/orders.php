<?php
    $lassunskinOrder = new lasunskinOrder();
    $result = $lassunskinOrder->paginate(2);

    extract($result);

    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
    if ($action == 'trash') {
        $orderIds = $_REQUEST['post'];
        if (count($orderIds)) {
            foreach ($orderIds as $orderId) {
                $lassunskinOrder->trash($orderId);
            }
        }
        custom_redirect('admin.php?page=lasunskin-orders');
        exit();
    }

    if (isset ($_GET['order_id']) && $_GET['order_id'] != ''){
        include lasunskin_PATH.'includes/admin_pages/orders/edit.php';
    }
    else {
        include lasunskin_PATH.'includes/admin_pages/orders/list.php';
    }
?>


