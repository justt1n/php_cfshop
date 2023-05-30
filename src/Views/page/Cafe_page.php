<script>
    function formatMoney(money) {
        if (typeof money === 'number' && Number.isInteger(money)) {
            money = money.toString()
        }
        money = money.trim();
        pos = 3;
        while (pos < money.length) {
            money = money.slice(0, -pos) + '.' + money.slice(-pos, money.length)
            pos += 4
        }
        return money
    }
</script>
<div>
    <img class="img-fluid w-100" src="/images/Cafe/cafe.jpg" alt="banner">
</div>

<h2 class="mt-3">THỨC UỐNG</h2>
<div class="">
    <img src="/images/Tea/icon_tealeaves.png" alt="" class="d-block mx-auto">
</div>
<h3 class="text-center my-4">Cà phê</h3>
<div class="container">
    <div class="row d-flex justify-content-center">
        <?php
        foreach ($data['products'] as $product) {
            include('../src/Views/partition/Product_card.php');
        }
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tùy chọn đặt hàng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container">
                <div class="row">
                    <div id="idModal" class="d-none"></div>
                    <div class="col-md-5 ">
                        <div class="d-flex justify-content-center mt-3">
                            <img id="imgModal" src="" width="60%" class="" alt="...">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5 id="nameModal" class="text-center"></h5>
                        <h5 id="priceModal" class="text-center my-3" style="color: #0C713D"></h5>
                        <div class="text-center">
                            <span>Số lượng: </span>
                            <button class="btn btn-outline-dark" onclick="decrement()">-</button>
                            <span id="quantity" class="mx-2">1</span>
                            <button class="btn btn-outline-dark" onclick="increment()">+</button>

                        </div>
                        <div class="text-center mt-3">
                            <span>Giá: </span> <span id="total"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn" data-bs-dismiss="modal"
                    style="background-color: #0C713D; color: #ffffffff" onclick="addCart()">Thêm vào
                    giỏ</button>
            </div>
        </div>
    </div>
</div>

<script>

    function total() {
        money = parseInt($('#priceModal').text().replace('.', '')) * parseInt($('#quantity').text())
        $('#total').text(formatMoney(money))
    }

    function setValue(id) {
        $('#imgModal').attr('src', $(`#img${id}`).attr('src'))
        $('#idModal').text($(`#id${id}`).text())
        $('#nameModal').text($(`#name${id}`).text())
        $('#priceModal').text($(`#price${id}`).text())
        $('#quantity').text(1)
        total()
    }

    function increment() {
        const quantityInput = $('#quantity');
        let quantity = parseInt(quantityInput.text());
        quantityInput.text(quantity + 1);
        total()
    }

    function decrement() {
        const quantityInput = $('#quantity');
        let quantity = parseInt(quantityInput.text());
        if (quantity > 1) {
            quantityInput.text(quantity - 1);
        }
        total()
    }


    $(document).ready(() => {
        $('.productPrice').toArray().forEach(element => {

            $(element).text(formatMoney($(element).text()))
        })
    }
    )

    function addCart() {
        let cart = []
        let product = {
            img: $('#imgModal').attr('src'),
            id: $('#idModal').text(),
            name: $('#nameModal').text(),
            price: $('#priceModal').text(),
            quan: parseInt($('#quantity').text())
        }
        if (localStorage.getItem('cart') !== null) {
            cart = JSON.parse(localStorage.getItem('cart'))
        } else {
            cart = []
        }
        let flag = 0
        cart.forEach(element => {
            if (element.id === product.id) {
                element.quan += product.quan
                flag = 1
            }
        })
        if (flag === 0) {
            cart.push(product)
        }
        cart = JSON.stringify(cart)
        localStorage.setItem('cart', cart)
    }

</script>