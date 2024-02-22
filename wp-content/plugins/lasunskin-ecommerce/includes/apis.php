<?php 
add_action('rest_api_init','lasunskin_apis');
function lasunskin_apis() {
    $namespace  = 'lasunskin/v1';
    $base       = 'orders';

    register_rest_route( $namespace,'/'.$base,[
        [
            'methods'   => WP_REST_Server::READABLE, //GET
            'callback'  => 'lasunskin_apis_order_all'
        ],
        [
            'methods'   => WP_REST_Server::CREATABLE, //POST
            'callback'  => 'lasunskin_apis_order_store'
        ]
    ]);
    register_rest_route( $namespace,'/'.$base.'/(?P<id>[\d]+)',[
        [
            'methods'   => WP_REST_Server::READABLE, //GET
            'callback'  => 'lasunskin_apis_order_show'
        ],
        [
            'methods'   => WP_REST_Server::EDITABLE, //PUT
            'callback'  => 'lasunskin_apis_order_update'
        ],
        [
            'methods'   => WP_REST_Server::DELETABLE, //DELETE
            'callback'  => 'lasunskin_apis_order_destroy'
        ]
    ]);

    register_rest_route($namespace,'/'.$base.'/(?P<id>[\d]+)/order_items',[
        [
            'methods'   => WP_REST_Server::READABLE, //GET
            'callback'  => 'lasunskin_apis_order_order_items'
        ]
    ]);
}
//GET  -/orders -lay toan bo orders
function lasunskin_apis_order_all($request) {
    $objLasunskinOrder = new lasunskinOrder();
    $result = $objLasunskinOrder->paginate();
    $data = [
        'success'    => true,
        'data'       => $result,
    ];
    return new WP_REST_Response($data,200);
}
//POST -/orders -tao moi 1 order
function lasunskin_apis_order_store($request) {
    $objLasunskinOrder = new lasunskinOrder();
    $saved = $objLasunskinOrder->save($_POST);
    $data = [
        'success'    => true,
        'data'       => $saved,
    ];
    return new WP_REST_Response($data,201);
}
//GET -/orders/{id} -lay 1 order theo tham so id
function lasunskin_apis_order_show($request) {
    $id = $request['id'];
    $objLasunskinOrder = new lasunskinOrder();
    $item = $objLasunskinOrder->find($id);
    $data = [
        'success'    => true,
        'data'       => $item,
    ];
    return new WP_REST_Response($data,200);
}

//PUT -/orders/{id} -cap nhat 1 order
function lasunskin_apis_order_update($request) {
    $id = $request['id'];
    $objLasunskinOrder = new lasunskinOrder();
    $update = $objLasunskinOrder->update($id,$_POST);
    $data = [
        'success'    => true,
        'data'       => $update,
    ];
    return new WP_REST_Response($data,200);
}

//DELETE -/orders/{id} -xoa 1 order
function lasunskin_apis_order_destroy($request) {
    $id = $request['id'];
    $objLasunskinOrder = new lasunskinOrder();
    $destroy = $objLasunskinOrder->destroy($id);
    $data = [
        'success'    => true
    ];
    return new WP_REST_Response($data,200);
}

//GET -/orders/{id}/order_items -lay toan bo order_items cua 1 order
function lasunskin_apis_order_order_items($request) {
    $id = $request['id'];
    $data = [
        'success'    => true,
        'message'    => 'order_items of order id = '.$id,
    ];
}