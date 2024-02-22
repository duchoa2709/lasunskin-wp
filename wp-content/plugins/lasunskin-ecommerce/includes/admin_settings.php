<?php
add_action('admin_init', 'lasunskin_settings_init');
function lasunskin_settings_init() {
    register_setting('lasunskin_settings_page', 'lasunskin_settings_options');

    add_settings_section(
        'lasunskin_settings_section_shop_info',
        'Thông tin cửa hàng',
        'lasunskin_settings_section_shop_info_cb',
        'lasunskin_settings_page'
    );

        add_settings_field(
            'lasunskin_settings_field_name',
            'Tên cửa hàng',
            'lasunskin_settings_field_render',
            'lasunskin_settings_page',
            'lasunskin_settings_section_shop_info', // Thay 'lasunskin_section_shop_info' bằng 'lasunskin_settings_section_shop_info'
            [
                'label_for' => 'lasunskin_settings_field_name',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );

        add_settings_field(
            'lasunskin_settings_field_phone',
            'Số điện thoại',
            'lasunskin_settings_field_render',
            'lasunskin_settings_page',
            'lasunskin_settings_section_shop_info', // Thay 'lasunskin_section_shop_info' bằng 'lasunskin_settings_section_shop_info'
            [
                'label_for' => 'lasunskin_settings_field_phone',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
        
        add_settings_field(
            'lasunskin_settings_field_email',
            'Email',
            'lasunskin_settings_field_render',
            'lasunskin_settings_page',
            'lasunskin_settings_section_shop_info', // Thay 'lasunskin_section_shop_info' bằng 'lasunskin_settings_section_shop_info'
            [
                'label_for' => 'lasunskin_settings_field_email',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );

    add_settings_section(
            'lasunskin_settings_section_payment',
            'Thông tin thanh toán',
            'lasunskin_settings_section_payment_cb',
            'lasunskin_settings_page'
        );

        add_settings_field(
            'lasunskin_settings_field_bank_name',
            'Tên ngân hàng',
            'lasunskin_settings_field_render',
            'lasunskin_settings_page',
            'lasunskin_settings_section_payment',
            [
                'label_for' => 'lasunskin_settings_field_bank_name',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
        add_settings_field(
            'lasunskin_settings_field_bank_number',
            'Số tài khoản',
            'lasunskin_settings_field_render',
            'lasunskin_settings_page',
            'lasunskin_settings_section_payment',
            [
                'label_for' => 'lasunskin_settings_field_bank_number',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
        add_settings_field(
            'lasunskin_settings_field_bank_user',
            'Tên chủ tài khoản',
            'lasunskin_settings_field_render',
            'lasunskin_settings_page',
            'lasunskin_settings_section_payment',
            [
                'label_for' => 'lasunskin_settings_field_bank_user',
                'type'      => 'text',
                'class'     => 'form-control'
            ]
        );
}

function lasunskin_settings_section_shop_info_cb() {
    echo '<p>Nhập thông tin cửa hàng của bạn</p>';
}

function lasunskin_settings_field_render($args) {
    $type  = isset($args['type']) ? $args['type'] : 'text';
    $option = get_option('lasunskin_settings_options');
    switch ($type) {
        case 'text':
            ?>
            <input type="text" name="lasunskin_settings_options[<?= $args['label_for']; ?>]" id="<?= $args['label_for']; ?>" value="<?= $option[$args['label_for']]; ?>">
            <?php
            break;
        case 'password':
            ?>
            <input type="password" name="lasunskin_settings_options[<?= $args['label_for']; ?>]" id="<?= $args['label_for']; ?>" value="<?= $option[$args['label_for']]; ?>">
            <?php
            break;
    }
}


function lasunskin_settings_section_payment_cb() {
    echo '<p>Nhập thông tin thanh toán của bạn</p>';
}

