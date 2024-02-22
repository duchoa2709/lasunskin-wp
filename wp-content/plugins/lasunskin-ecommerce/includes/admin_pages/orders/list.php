<div class="wrap">
    <h1 class="wp-heading-inline"><?=__('Manage Orders', 'lasunskin-ecommerce');?></h1>
    <hr class="wp-header-end">
    <ul class="subsubsub">
        <li class="all"><a href="admin.php?page=lasunskin-orders"
                class="current"><?= __('All', 'lasunskin-ecommerce'); ?>
                <span class="count"> (<?= $total_items; ?>) </span></a>
            |</li>
        <li class="publish"><a
                href="admin.php?page=lasunskin-orders&status=pending"><?= __('New Orders', 'lasunskin-ecommerce'); ?></a>
            |</li>
        <li class="publish"><a
                href="admin.php?page=lasunskin-orders&status=completed"><?= __('Complete Orders', 'lasunskin-ecommerce'); ?></a>
            |
        </li>
        <li class="publish"><a
                href="admin.php?page=lasunskin-orders&status=canceled"><?= __('Canceled Orders', 'lasunskin-ecommerce'); ?></a>
        </li>
    </ul>
    <form id="posts-filter" method="get">
        <input type="hidden" name="page" value="lasunskin-orders">
        <!-- <input type="hidden" name="paged" value="1"> -->
        <p class="search-box">
            <label class="screen-reader-text"
                for="post-search-input"><?= __('Search Orders', 'lasunskin-ecommerce'); ?></label>
            <input type="search" id="post-search-input" name="s" value="" placeholder="<?= __('Search Order', 'lasunskin-ecommerce'); ?>">
            <input type="submit" id="search-submit" class="button"
                value="<?= __('Search Orders', 'lasunskin-ecommerce'); ?>">
        </p>
        <div class="tablenav top">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action" id="bulk-action-selector-top">
                    <option value="-1"><?= __('Action', 'lasunskin-ecommerce'); ?></option>
                    <option value="trash"><?= __('Delete', 'lasunskin-ecommerce'); ?></option>
                </select>
                <input type="submit" id="doaction" class="button action" value="<?= __('Apply', 'lasunskin-ecommerce'); ?>">
            </div>
            <div class="alignleft actions">
                <label class="screen-reader-text" for="cat">Lọc theo danh mục</label>
                <select name="status" id="cat" class="postform">
                    <option value="0"><?= __('All Categories', 'lasunskin-ecommerce'); ?></option>
                    <option class="level-0" value="pending"><?= __('Order Pending', 'lasunskin-ecommerce'); ?></option>
                    <option class="level-0" value="completed"><?= __('Order Completed', 'lasunskin-ecommerce'); ?></option>
                    <option class="level-0" value="canceled"><?= __('Order Canceled', 'lasunskin-ecommerce'); ?></option>
                </select>
                <input type="submit" id="post-query-submit" class="button" value="<?= __('Filter', 'lasunskin-ecommerce'); ?>">
            </div>

            <?php include lasunskin_PATH.'includes/admin_pages/elements/elements-panigation.php'; ?>
            <br class="clear">
        </div>
        <h2 class="screen-reader-text">Danh sách bài viết</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">
            <thead>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text"
                            for="cb-select-all-1">Chọn toàn bộ</label><input id="cb-select-all-1" type="checkbox"></td>
                    <th class="manage-column column-primary"><?= __('ID', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Total', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Customer', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Phone', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Status', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Time', 'lasunskin-ecommerce'); ?></th>
                </tr>
            </thead>
            <tbody id="the-list">
                <?php foreach ($items as $item): ?>
                <tr id="post-<?= $item->id;?>"
                    class="iedit author-self level-0 post-<?= $item->id;?> status-publish hentry">

                    <th scope="row" class="check-column">
                        <input id="cb-select-<?= $item->id;?>" type="checkbox" name="post[]" value="<?= $item->id;?>">
                    </th>
                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Tiêu đề">
                        <strong>
                            <a class="row-title" href="admin.php?page=lasunskin-orders&order_id=<?= $item->id; ?>">#
                                <?= $item->id;  ?></a>
                        </strong>
                    </td>
                    <td><?= number_format($item->total);  ?></td>
                    <td><?= $item->customer_name; ?></td>
                    <td><?= $item->customer_phone; ?></td>
                    <td>
                        <select data-order-id="<?php echo $item->id; ?>" name="" id="" class="order_status">
                            <option <?= $item->status == 'pending' ? 'selected' : '';?> value="pending"><?= __('Order Pending', 'lasunskin-ecommerce'); ?>
                            </option>
                            <option <?= $item->status == 'completed' ? 'selected' : '';?> value="completed"><?= __('Order Completed', 'lasunskin-ecommerce'); ?></option>
                            <option <?= $item->status == 'canceled' ? 'selected' : '';?> value="canceled"><?= __('Order Canceled', 'lasunskin-ecommerce'); ?></option>
                        </select>
                    </td>
                    <td class="date column-date"><?= date('d-m-Y',strtotime($item->created)) ; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text"
                            for="cb-select-all-1">Chọn toàn bộ</label><input id="cb-select-all-1" type="checkbox"></td>
                    <th class="manage-column column-primary"><?= __('ID', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Total', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Customer', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Phone', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Status', 'lasunskin-ecommerce'); ?></th>
                    <th class="manage-column"><?= __('Time', 'lasunskin-ecommerce'); ?></th>
                </tr>
            </tfoot>
        </table>
        <div class="tablenav bottom">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-bottom" class="screen-reader-text">Lựa chọn thao tác hàng loạt</label>
                <select name="action2" id="bulk-action-selector-bottom">
                    <option value="-1"><?= __('Action', 'lasunskin-ecommerce'); ?></option>
                    <option value="edit" class="hide-if-no-js"><?= __('Edit', 'lasunskin-ecommerce'); ?></option>
                    <option value="trash"><?= __('Delete', 'lasunskin-ecommerce'); ?></option>
                </select>
                <input type="submit" id="doaction2" class="button action" value="<?= __('Apply', 'lasunskin-ecommerce'); ?>">
            </div>
            <div class="alignleft actions">
            </div>

            <?php include lasunskin_PATH.'includes/admin_pages/elements/elements-panigation.php'; ?>

            <br class="clear">
        </div>
    </form>
</div>
<script>
    // Đường dẫn xử lý ajax
    let nonce = '<?= wp_create_nonce('lasunskin_save_order'); ?>';
    let ajax_url = '<?= admin_url('admin-ajax.php'); ?>';
    jQuery(document).ready(function(){
        jQuery('.order_status').on('change',function(){
            var orderId = jQuery(this).attr("data-order_id"); // Sửa thuộc tính từ "data-order-id" thành "data-order_id"
            let status = jQuery(this).val();
            
            jQuery.ajax({
                url     : ajax_url,
                method  : 'POST',
                dataType: 'json',
                data: {
                    action  : 'lasunkin_order_change_status',
                    order_id: orderId,
                    status  : status,
                    _nonce   : nonce
                },
                success : function(res){
                    alert('Cập nhật trạng thái thành công'); // Sửa "arlet" thành "alert"
                },
                error   : function(error){
                    alert('Cập nhật trạng thái thất bại'); // Sửa "arlet" thành "alert"
                }
            })
        })
    })
</script>
