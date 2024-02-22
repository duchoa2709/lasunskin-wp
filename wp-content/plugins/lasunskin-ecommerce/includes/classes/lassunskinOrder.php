<?php 
class lasunskinOrder{
        private $_orders = ""; // Biến để lưu trữ tên bảng "orders" của cơ sở dữ liệu WordPress
    
        public function __construct() {
            global $wpdb;
            $this->_orders = $wpdb->prefix . 'lasunskin_orders'; // Gán tên bảng "orders" vào biến $_orders, sử dụng tiền tố của cơ sở dữ liệu WordPress
            $this->_orders_detail = $wpdb->prefix . 'lasunskin_orders_detail'; // Gán tên bảng "orders" vào biến $_orders, sử dụng tiền tố của cơ sở dữ liệu WordPress
        }

    public function all() {
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders";
        $items = $wpdb->get_results($sql);
        return $items;
    }

    public function paginate($limit = 20 ) {
        global $wpdb;
        
        // pr($_REQUEST);
    
        $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
        $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : '';
        $paged = isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1;
    
        // Đếm tổng số record có trong bảng "orders" để tính số trang
        $sql_count = "SELECT COUNT(id) FROM $this->_orders WHERE deleted = 0";
        if ($s) {
            $sql_count .= " AND customer_name LIKE '%$s%' OR customer_phone LIKE '%$s%' OR customer_email LIKE '%$s%'";
        }
        if ($status) {
            $sql_count .= " AND status = '$status'";
        }
        $total_items = $wpdb->get_var($sql_count);

        
        // Tính số trang dựa trên số record và giới hạn số record trên mỗi trang
        $total_pages = ceil($total_items / $limit);
    
        // Tính giá trị offset để xác định phạm vi của trang hiện tại
        $offset = ($paged * $limit) - $limit;
    
        // Lấy dữ liệu từ bảng "orders" dựa trên giới hạn và offset
        $sql = "SELECT * FROM $this->_orders WHERE deleted = 0";
        if ($s) {
            $sql .= " AND customer_name LIKE '%$s%' OR customer_phone LIKE '%$s%' OR customer_email LIKE '%$s%'";
        }
        if ($status) {
            $sql .= " AND status = '$status'";
        }
        $sql .= " ORDER BY id DESC"; // Sắp xếp dữ liệu theo thứ tự giảm dần của trường "id"
        $sql .= " LIMIT $limit OFFSET $offset"; // Giới hạn số record trên mỗi trang và offset
    
        $items = $wpdb->get_results($sql);
    
        // Trả về thông tin về phân trang và dữ liệu trang hiện tại
        return [
            'total_pages'     => $total_pages,    // Tổng số trang      
            'total_items' => $total_items,      // Tổng số record có trong bảng "orders"
            'items'     => $items           // Dữ liệu trang hiện tại
        ];
    }
    
    

    public function find($id) {
        global $wpdb;
        $sql = "SELECT * FROM $this->_orders WHERE id = $id";
        return $wpdb->get_row($sql);
    }

    public function save($data){
        global $wpdb;
        $wpdb->insert($this->_orders,$data);
        $lastId = $wpdb->insert_id;
        $item = $this->find($lastId);
        return $item;
    }

    public function update($id,$data) {
        global $wpdb;
        $wpdb->update($this->_orders,$data,['id' => $id]);
        $item = $this->find($id);
        return $item;
    }

    public function destroy($id) {
        global $wpdb;
        $wpdb->delete($this->_orders,['id' => $id]);
        return true;
    }

    public function trash($id) {
        global $wpdb;
        $wpdb->update($this->_orders,
        [ 'deleted'  => 1 ],
        ['id' => $id]
        );
        return true;
    }

    public function change_status($order_id,$status) {
        global $wpdb;
        $wpdb->update($this->_orders,
        [ 'status'  => $status ],
        ['id' => $order_id]
        );
        return true;
    }

    public function order_items($order_id) {
        global $wpdb;
        $sql = "SELECT products.post_title as products_name, orders_detail.* FROM $this->_orders_detail AS orders_detail
        JOIN $wpdb->posts AS products ON products.ID = orders_detail.product_id
        WHERE orders_detail.order_id = $order_id
        ORDER BY orders_detail.id DESC";
        $items = $wpdb->get_results($sql);
        return $items;
    }
    
}