<tr id="<?= $item->getOrderItemsInfor()['product_id'] ?>">
    <td data-th="Product">
        <div class="row">
            <div class="d-none">
                <?= $item->getOrderItemsInfor()['product_id'] ?>
            </div>
            <div class="col-md-3 text-left">
                <img src="<?= $product->getProductInfor()['image_path'] ?>" width="70px" height="70px"
                    style="object-fit: contain" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
            </div>
            <div class="col-md-9 text-left mt-sm-2">
                <h4 style="text-transform: capitalize;">
                    <?= $product->getProductInfor()['name'] ?>
                </h4>
            </div>
        </div>
    </td>
    <td data-th="Price">
        <?= $product->getProductInfor()['price'] ?>
    </td>
    <td data-th="Quantity">
        <span id="quantity${element.id}" class="mx-2">
            <?= $item->getOrderItemsInfor()['quantity'] ?>
        </span>
    </td>
    <td class="actions" data-th="">
        <!-- <div class="text-right">
            <button class="btn btn-white border-secondary bg-white btn-md mb-2" onclick="remove('${element.id}')">
                <i class="fas fa-trash"></i>
            </button>
        </div> -->
    </td>
</tr>