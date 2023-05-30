<div id="<?= $product['id'] ?? '' ?>" class="card col-xl-3 col-lg-4 col-sm-6 my-2 mx-2" style="width: 18rem;">
    <div class="d-flex justify-content-center mt-3">
        <img id="img<?= $product['id'] ?? '' ?>" src="<?= $product['image_path'] ?? '' ?>" width="60%" class=""
            alt="...">
    </div>
    <div class="card-body ">
        <div id="id<?= $product['id'] ?? '' ?>" class="d-none"><?= $product['id'] ?? '' ?></div>
        <h5 id="name<?= $product['id'] ?? '' ?>" class="card-title text-center"><?= $product['name'] ?? '' ?></h5>
        <h5 id="price<?= $product['id'] ?? '' ?>" class="text-center my-3 productPrice" style="color: #0C713D"><?= $product['price'] ?? '' ?></h5>
        <div class="d-flex justify-content-center">
            <button type="button" onclick="setValue(<?= $product['id'] ?? '' ?>)" class="btn button"
                data-bs-toggle="modal" data-bs-target="#productModal">
                Thêm vào giỏ hàng
            </button>
        </div>
    </div>
</div>