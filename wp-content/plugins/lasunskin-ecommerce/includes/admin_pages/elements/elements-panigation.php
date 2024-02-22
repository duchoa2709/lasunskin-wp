<?php 
$page = isset( $_REQUEST['paged']) ? $_REQUEST['paged'] : 1;
?>
<div class="tablenav-pages">
    <span class="displaying-num"><?= $total_items; ?> <?= __('Items', 'lasunskin-ecommerce'); ?></span>
    <span class="pagination-links">
        <?php if($page > 1): ?>
        <a class="prev-page button" href="admin.php?page=lasunskin-orders&paged=<?=$page - 1;?>">
            <span aria-hidden="true">‹</span>
        </a>
        <?php endif;?>
        <span class="screen-reader-text">Trang hiện tại</span>
        <span id="table-paging" class="paging-input">
            <span class="tablenav-paging-text"><?= $page; ?> <?= __('Of', 'lasunskin-ecommerce'); ?>
                <span class="total-pages"><?=$total_pages?></span>
            </span>
        </span>
        <?php
            if ($page < $total_pages):
        ?>
        <a class="next-page button" href="admin.php?page=lasunskin-orders&paged=<?=$page + 1;?>">
            <span aria-hidden="true">›</span>
        </a>
        <?php endif; ?>
    </span>
</div>