<div class="container mt-5" style="min-height: 560px;">
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">GIỎ HÀNG</h3>
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


                        </tbody>
                    </table>
                    <div class="float-right text-right">
                        <h4 style="text-transform: none ;">Tổng cộng:</h4>
                        <h1 id="total"></h1>
                    </div>
                </div>
            </div>
            <form id="order-form" action="/Cart/Order" method="post">
                <label for="address" class="form-label">Địa chỉ:</label>
                <input id="address" name="address" type="text" class="form-control w-100" required>
                <div class="row mt-4 d-flex align-items-center">
                    <div class="col-sm-6 order-md-2 text-right">
                        <input id="cart-infor" type="text" name="cart" class="d-none" value="">
                        <button class="btn mb-4 btn-lg pl-5 pr-5"
                            style="background-color: #0C713D; color: #ffffffff">Đặt hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    function formatMoney(money) {
        if (typeof money === 'number' && Number.isInteger(money)) {
            money = money.toString()
        }
        pos = 3;
        while (pos < money.length) {
            money = money.slice(0, -pos) + '.' + money.slice(-pos, money.length)
            pos += 4
        }
        return money
    }

    function increment(id) {
        const quantityInput = $(`#quantity${id}`);
        let quantity = parseInt(quantityInput.text());
        quantityInput.text(quantity + 1);
        let cart = JSON.parse(localStorage.getItem('cart'))
        cart.forEach(element => {
            if (element.id === id) {
                element.quan = quantityInput.text()
            }
        })
        localStorage.setItem('cart', JSON.stringify(cart))
        total()
    }

    function decrement(id) {
        const quantityInput = $(`#quantity${id}`);
        let quantity = parseInt(quantityInput.text());
        if (quantity > 1) {
            quantityInput.text(quantity - 1);
        }
        let cart = JSON.parse(localStorage.getItem('cart'))
        cart.forEach(element => {
            if (element.id === id) {
                element.quan = quantityInput.text()
            }
        })
        localStorage.setItem('cart', JSON.stringify(cart))
        total()
    }

    function render() {
        $('#root').text('')
        let cart = JSON.parse(localStorage.getItem('cart'))

        cart.forEach(element => {
            let pattern = `
            <tr id="${element.id}">
                <td data-th="Product">
                    <div class="row">
                        <div class="d-none">${element.id}</div>
                        <div class="col-md-3 text-left">
                            <img src="${element.img}" width="250px" height="250px"
                                style="object-fit: contain" alt=""
                                class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                        </div>
                        <div class="col-md-9 text-left mt-sm-2">
                            <h4 style="text-transform: capitalize;">${element.name}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">${element.price}</td>
                <td data-th="Quantity">
                    <button class="btn btn-outline-dark" onclick="decrement('${element.id}')">-</button>
                    <span id="quantity${element.id}" class="mx-2">${element.quan}</span>
                    <button class="btn btn-outline-dark" onclick="increment('${element.id}')">+</button>
                </td>
                <td class="actions" data-th="">
                    <div class="text-right">
                        <button class="btn btn-white border-secondary bg-white btn-md mb-2" onclick="remove('${element.id}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `
            $('#root').append(pattern)
        });
        total()
    }

    function total() {
        let total = 0;
        let cart = JSON.parse(localStorage.getItem('cart'))

        cart.forEach(element => {
            total += parseInt(element.price.replace('.', '')) * element.quan
        })
        total = formatMoney(total)
        $('#total').text(total + " VNĐ")
    }

    function remove(tag) {
        $(`#${tag}`).remove()
        let cart = JSON.parse(localStorage.getItem('cart'))
        cart = cart.filter((item) => {
            return item.id !== tag;
        })
        localStorage.setItem('cart', JSON.stringify(cart))
        total()
    }

    document.querySelector('#order-form').addEventListener('submit', (event) => {
        event.preventDefault()
        let cart = localStorage.getItem('cart');
        $('#cart-infor').attr('value', cart)
        if (cart !== "[]" && cart !== "" && cart !== null) {
            document.querySelector('#order-form').submit()
            // console.log(cart);
        }
    })

    $(document).ready(() => {
        render()
    })

    window.onstorage = () => {
        render()
    }

</script>