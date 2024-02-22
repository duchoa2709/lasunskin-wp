<?php
    $orderId = isset($_GET['order_id']) ? $_GET['order_id'] : '';
    if ($orderId != '') {
        $objLasunskinOrder = new lasunskinOrder();
        $order = $objLasunskinOrder->find($orderId);
        $orderItems = $objLasunskinOrder->order_items($orderId);
    }

    if (isset ($_POST['lasunskin_save_order'])) {
        check_admin_referer('lasunskin_save_order');
            $order_status = isset($_REQUEST['order_status']) ? $_REQUEST['order_status'] : '';
            $note = isset($_REQUEST['note']) ? $_REQUEST['note'] : '';
            $objLasunskinOrder->update($orderId,[
                'status' => $order_status,
                'note' => $note
            ]);
    
            custom_redirect('admin.php?page=lasunskin-orders&order_id='.$orderId);
            exit();
        
    }
?>

<style>
    table.form-table.bordered th,table.form-table.bordered td {
        border: 1px solid #ccc;
        text-align: center;
    }
</style>
<div class="wrap">
    <h1 class="wp-heading-inline">Chi tiết đơn hàng số: <?=$order->id;?> </h1>
    <form id="posts-filter" method="post">
        <?php wp_nonce_field('lasunskin_save_order'); ?>
        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <!-- Left columns -->
                <div id="post-body-content">
                    <!-- Thông tin đơn hàng -->
                    <div class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle ui-sortable-handle">Thông tin đơn hàng</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table  ">
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <td> <?=$order->id;?> </td>
                                </tr>
                                <tr>
                                    <td>Ngày đặt hàng</td>
                                    <td> <?=date ('d-m-Y',strtotime($order->created));?> </td>
                                </tr>
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td> <?=$order->customer_name;?> </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td><?=$order->customer_phone;?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?=$order->customer_email;?></td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td> <?=$order->customer_address;?> </td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td>
                                        <textarea name="note" rows="5" class="large-text" ><?=$order->note;?></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- Chi tiết đơn hàng -->
                    <div class="postbox ">
                        <div class="postbox-header">
                            <h2 class="hndle">Chi tiết đơn hàng</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table bordered">
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                                <?php foreach ($orderItems as $orderItems): ?>
                                <tr>
                                    <td><?=$orderItems->product_id;?></td>
                                    <td><?=$orderItems->products_name;?></td>
                                    <td><?=$orderItems->quantity;?></td>
                                    <td><?=number_format($orderItems->price);?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Right columns -->
                <div id="postbox-container-1">
                    <div class="postbox">
                        <div class="postbox-header">
                            <h2 class="hndle">Hành động</h2>
                        </div>
                        <div class="inside">
                            <div class="submitbox">
                                <p>
                                    <select name="order_status" class="large-text ">
                                        <option <?= $order->status == 'pending' ? 'selected' : '';?> value="pending"><?= __('Order Pending', 'lasunskin-ecommerce'); ?></option>
                                        <option <?= $order->status == 'completed' ? 'selected' : '';?> value="completed"><?= __('Order Completed', 'lasunskin-ecommerce'); ?></option>
                                        <option <?= $order->status == 'canceled' ? 'selected' : '';?> value="canceled"><?= __('Order Canceled', 'lasunskin-ecommerce'); ?></option>
                                    </select>
                                </p>
                                <p>
                                    <input type="submit" name="lasunskin_save_order" id="submit" class="button button-primary"
                                    value="Lưu thay đổi">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>