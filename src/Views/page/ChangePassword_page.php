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
    <h1 class="h2">Đổi mật khẩu</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" href="\User\Profile" class="btn btn-sm btn-outline-secondary">Thông tin</a>
            <a type="button" href="\User\ChangeInfor" class="btn btn-sm btn-outline-secondary">Sửa thông tin</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-6">

            <form id="ChangePass-form" class="mx-1 mx-md-4" action="/User/ChangePassword" method="POST">

                <div class="form-group mb-3">
                    <div class="d-flex flex-row align-items-center ">
                        <i class="fas fa-lock fa-lg me-3 fa-fw" style="color: #0C713D"></i>

                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="phone">Present Password:</label>
                            <input type="password" id="old_password" name="old_password" class="form-control" />

                        </div>

                    </div>
                    <span class="form-message">
                        <?= (isset($data['errors']['old_password'])) ? $data['errors']['old_password'] : '' ?>
                    </span>
                </div>

                <div class="form-group  mb-3">
                    <div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lock fa-lg me-3 fa-fw" style="color: #0C713D"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password">New Password</label>
                            <input type="password" id="password" name="password" class="form-control" />

                        </div>
                    </div>
                    <span class="form-message">
                        <?= (isset($data['errors']['password'])) ? $data['errors']['password'] : '' ?>
                    </span>
                </div>

                <div class="form-group mb-3">
                    <div class="d-flex flex-row align-items-center mb-0">
                        <i class="fas fa-key fa-lg me-3 fa-fw" style="color: #0C713D"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="password_confirmation">Repeat your new
                                password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" />

                        </div>

                    </div>
                    <span class="form-message">
                        <?= (isset($data['errors']['password_confirmation'])) ? $data['errors']['password_confirmation'] : '' ?>
                    </span>
                </div>



                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-lg" style="background-color: #0C713D; color: white">Đổi mật
                        khẩu</button>
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
            form: '#ChangePass-form',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.minLength('#password', 8),
                Validator.isRequired('#password_confirmation'),
                Validator.isConfirmed('#password_confirmation', function () {
                    return document.querySelector('#ChangePass-form #password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ],
            onSubmit: function () {
                // Call API
                document.getElementById('ChangePass-form').submit()
            }
        });
    });

</script>