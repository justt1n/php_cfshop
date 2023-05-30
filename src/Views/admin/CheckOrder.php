<?php

use MVC\Models\Order;
use MVC\Models\Order_Items;
$Order = new Order();
$order = $Order->getOrderById($data['id']);
$OrderItem = new Order_Items();
$items = $Order_Items->getByOrderID($data['id']);
?>

<div>
    <h1>Order <?php $data['id'] ?> </h1>
    <span>
        <h2>Order ID: <?php echo $order->getOrder_id() ?>  </h2>
        <h2>Customer: <?php echo $order->getCustomerName() ?> </h2>
        <h2>Item:</h2>
        <br>
        <?php
            foreach ($items as $item) {
                $tmp = $item->getOrderItemsInfor();
                echo $tmp['product_id'];
                echo $tmp['quantity'];
            } 
        ?>
    </span>
</div>