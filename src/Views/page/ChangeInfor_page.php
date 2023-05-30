<style>
    .form-message {
        text-align: left;
    }

    .form-group .form-message {
        color: #f33a58;
    }

    .form-message {
        font-size: 0.8rem;
        line-height: 1rem;
        margin-left: 10%;
        margin-top: 0%;
        padding: 4px 0 0;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Sửa thông tin</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" href="\User\Profile" class="btn btn-sm btn-outline-secondary">Thông tin</a>
            <a type="button" href="\User\ChangePassword" class="btn btn-sm btn-outline-secondary">Đổi mật khẩu</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-6">

            <form id="ChangeInfor-form" class="mx-1 mx-md-4" action="/User/ChangeInfor" method="POST">

                <div class="form-group mb-3">
                    <div class="d-flex flex-row align-items-center ">
                        <i class="fas fa-id-card fa-lg me-3 fa-fw" style="color: #0C713D"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="username">User Name</label>
                            <input type="text" id="username" name="username" class="form-control" disabled
                                value="<?= $data['username'] ?? '' ?>" />

                        </div>
                    </div>
                    <span class="form-message">
                        <?= (isset($data['errors']['username'])) ? $data['errors']['username'] : '' ?>
                    </span>
                </div>
                <div class="form-group  mb-3">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-user fa-lg me-3 fa-fw" style="color: #0C713D"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" class="form-control"
                                value="<?= $data['fullname'] ?? '' ?>" />

                        </div>

                    </div>
                    <span class="form-message">
                        <?= (isset($data['errors']['fullname'])) ? $data['errors']['fullname'] : '' ?>
                    </span>
                </div>

                <div class="form-group mb-3">
                    <div class="d-flex flex-row align-items-center ">
                        <i class="fas fa-phone fa-lg me-3 fa-fw" style="color: #0C713D"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="phone">Your Phone</label>
                            <input type="phone" id="phone" name="phone" class="form-control"
                                value="<?= $data['phone'] ?? '' ?>" />

                        </div>

                    </div>
                    <span class="form-message">
                        <?= (isset($data['errors']['phone'])) ? $data['errors']['phone'] : '' ?>
                    </span>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-lg" style="background-color: #0C713D; color: white">Sửa
                        đổi</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="/js/validator.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Mong muốn của chúng ta
        Validator({
            form: '#ChangeInfor-form',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.minLength('#username', 5),
                Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
                Validator.isPhone('#phone')
            ],
            onSubmit: function () {
                // Call API
                document.getElementById('ChangeInfor-form').submit()
            }
        });
    });

</script>