<?php

use App\Models\Order;


$order = new Order(); //tạo đối tượng
$id = $_REQUEST['id'];
$row = $order->order_row($id);
$new_status = ($row['status'] == 1) ? 2 : 1;
$data = array(
  'updated_at' => date('Y-m-d H:i:s'),
  'updated_by' => 1,
  'status' => $new_status
);
$order->order_update($data, $id);
header("location: index.php?option=order");