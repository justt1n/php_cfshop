<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: #0C713D">
                    ĐĂNG NHẬP <br />
                    <span style="color: #0C713D">VÀO DANG TIN NGAY</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">

                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass">
                    <div class="card-body px-4 py-5 px-md-5">
                        <form id="login-form" action="/Login" method="POST">
                            <!-- username input -->
                            <div class="form-group mb-3">
                                <div class="form-outline my-0">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" />

                                </div>
                                <span class="form-message">
                                    <?= (isset($data['errors']['username'])) ? $data['errors']['username'] : '' ?>
                                </span>
                            </div>

                            <!-- Password input -->
                            <div class="form-group mb-3">
                                <div class="form-outline my-0">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" />

                                </div>
                                <span class="form-message">
                                    <?= (isset($data['errors']['password'])) ? $data['errors']['password'] : '' ?>
                                </span>
                            </div>

                            <!-- Submit button -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <button type="submit" class="btn btn-block mb-4"
                                    style=" background-color: #0C713D; color: white">
                                    Đăng nhập
                                </button>

                            </div>
                            <div class="form-group">
                                <span class="form-message">
                                    <?= (isset($data['authenticate']) && $data['authenticate'] === false) ? 'Username hoặc password không chính xác' : '' ?>
                                </span>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->

<script src="/js/validator.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Mong muốn của chúng ta
        Validator({
            form: '#login-form',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#username'),
                Validator.isRequired('#password'),
            ],
            onSubmit: function () {
                // Call API
                document.getElementById('login-form').submit()
            }
        });
    });

</script>