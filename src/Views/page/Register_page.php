<section class="my-5" style="background-color">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: #0C713D">Đăng ký
                                </p>

                                <form id="register-form" class="mx-1 mx-md-4" action="/Register" method="POST">

                                    <div class="form-group mb-3">
                                        <div class="d-flex flex-row align-items-center ">
                                            <i class="fas fa-id-card fa-lg me-3 fa-fw" style="color: #0C713D"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="username">User Name</label>
                                                <input type="text" id="username" name="username" class="form-control" />

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
                                                <input type="text" id="fullname" name="fullname" class="form-control" />

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
                                                <input type="phone" id="phone" name="phone" class="form-control" />

                                            </div>

                                        </div>
                                        <span class="form-message">
                                            <?= (isset($data['errors']['phone'])) ? $data['errors']['phone'] : '' ?>
                                        </span>
                                    </div>

                                    <div class="form-group  mb-3">
                                        <div class="d-flex flex-row align-items-center">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="color: #0C713D"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control" />

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
                                                <label class="form-label" for="password_confirmation">Repeat your
                                                    password</label>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" class="form-control" />

                                            </div>

                                        </div>
                                        <span class="form-message">
                                            <?= (isset($data['errors']['password_confirmation'])) ? $data['errors']['password_confirmation'] : '' ?>
                                        </span>
                                    </div>



                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-lg"
                                            style="background-color: #0C713D; color: white">Đăng ký</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="/images/Register/draw1.webp" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/js/validator.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Mong muốn của chúng ta
        Validator({
            form: '#register-form',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.minLength('#username', 5),
                Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
                Validator.isPhone('#phone'),
                Validator.minLength('#password', 8),
                Validator.isRequired('#password_confirmation'),
                Validator.isConfirmed('#password_confirmation', function () {
                    return document.querySelector('#register-form #password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ],
            onSubmit: function () {
                // Call API
                document.getElementById('register-form').submit()
            }
        });
    });

</script>