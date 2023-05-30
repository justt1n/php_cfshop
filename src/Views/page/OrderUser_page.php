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


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Thông tin đơn hàng</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <!-- <a type="button" href="\User\ChangeInfor" class="btn btn-sm btn-outline-secondary">Sửa thông tin</a>
            <a type="button" href="\User\ChangePassword" class="btn btn-sm btn-outline-secondary">Đổi mật khẩu</a> -->
        </div>
    </div>
</div>


<div class="container">
    <div class="accordion" id="accordionExample">
        <?php
        foreach ($data['orders'] as $order) {
            include '../src/Views/partition/accordion-item.php';
        }
        ?>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('.price').toArray().forEach(element => {

            $(element).text(formatMoney($(element).text()))
        })
    }
    )
</script>