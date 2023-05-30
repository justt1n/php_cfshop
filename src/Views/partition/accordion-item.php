<div class="accordion-item">
    <h2 class="accordion-header" id="heading<?= $order->getOrderInfor()['order_id'] ?>">
        <button class="accordion-button " type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse<?= $order->getOrderInfor()['order_id'] ?>" aria-expanded="false"
            aria-controls="collapse<?= $order->getOrderInfor()['order_id'] ?>">
            <div class="container">
                <div class="row">
                    <h4 class="col-md-6">Mã đơn hàng:
                        <?= $order->getOrderInfor()['order_id'] ?>
                    </h4>
                    <h5 class="col-md-3">Thành tiền:
                        <span class="price">
                            <?= $order->getTotal() ?>
                        </span>
                    </h5>
                    <h6 class="col-md-3">Trạng thái:
                        <?= $order->getStatusString() ?>
                    </h6>
                </div>
            </div>
        </button>
    </h2>
    <div id="collapse<?= $order->getOrderInfor()['order_id'] ?>" class="accordion-collapse collapse "
        aria-labelledby="heading<?= $order->getOrderInfor()['order_id'] ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <table id="shoppingCart" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th style="width:50%">Thức uống</th>
                        <th style="width:12%">Giá</th>
                        <th style="width:20%">Số lượng</th>
                        <th style="width:16%"></th>
                    </tr>
                </thead>
                <tbody id="root">
                    <?php
                    foreach ($order->getItems() as $item) {
                        $product = (new \MVC\Models\Product())->getProductById($item->getOrderItemsInfor()['product_id']);
                        include '../src/Views/partition/product_row.php';
                    }
                    ?>

                </tbody>
                <div>Địa chỉ:
                    <?= $order->getOrderInfor()['address'] ?>
                </div>
            </table>
        </div>
    </div>
</div>