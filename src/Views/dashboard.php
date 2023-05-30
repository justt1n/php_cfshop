<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>User</title>


    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" media="all" href="<?= '/css/style.css' ?>"> -->

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        html {
            -webkit-font-smoothing: antialiased;
        }

        body {
            background-color: #111111;
            font-family: "Titillium Web", sans-serif;
        }

        @media screen and (min-width: 40em) {
            body {
                font-size: 1.25em;
            }
        }

        .form .button,
        .form .message,
        .customSelect,
        .form .select,
        .form .textarea,
        .form .text-input,
        .form .option-input+label,
        .form .checkbox-input+label,
        .form .label {
            padding: 0.75em 1em;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            line-height: normal;
            border-radius: 0;
            border: none;
            background: none;
            display: block;
        }

        .form .label {
            font-weight: bold;
            color: white;
            padding-top: 0;
            padding-left: 0;
            letter-spacing: 0.025em;
            font-size: 1.125em;
            line-height: 1.25;
            position: relative;
            z-index: 100;
        }

        .required .form .label:after,
        .form .required .label:after {
            content: " *";
            color: #E8474C;
            font-weight: normal;
            font-size: 0.75em;
            vertical-align: top;
        }

        .customSelect,
        .form .select,
        .form .textarea,
        .form .text-input,
        .number,
        .form .option-input+label,
        .form .checkbox-input+label {
            font: inherit;
            line-height: normal;
            width: 100%;
            box-sizing: border-box;
            background: #222222;
            color: white;
            position: relative;
        }

        .customSelect:placeholder,
        .form .select:placeholder,
        .form .textarea:placeholder,
        .form .text-input:placeholder,
        .form .option-input+label:placeholder,
        .form .checkbox-input+label:placeholder {
            color: white;
        }

        .customSelect:-webkit-autofill,
        .form .select:-webkit-autofill,
        .form .textarea:-webkit-autofill,
        .form .text-input:-webkit-autofill,
        .form .option-input+label:-webkit-autofill,
        .form .checkbox-input+label:-webkit-autofill {
            box-shadow: 0 0 0px 1000px #111111 inset;
            -webkit-text-fill-color: white;
            border-top-color: #111111;
            border-left-color: #111111;
            border-right-color: #111111;
        }

        .customSelect:not(:focus):not(:active).error,
        .form .select:not(:focus):not(:active).error,
        .form .textarea:not(:focus):not(:active).error,
        .form .text-input:not(:focus):not(:active).error,
        .form .option-input+label:not(:focus):not(:active).error,
        .form .checkbox-input+label:not(:focus):not(:active).error,
        .error .customSelect:not(:focus):not(:active),
        .error .form .select:not(:focus):not(:active),
        .form .error .select:not(:focus):not(:active),
        .error .form .textarea:not(:focus):not(:active),
        .form .error .textarea:not(:focus):not(:active),
        .error .form .text-input:not(:focus):not(:active),
        .form .error .text-input:not(:focus):not(:active),
        .error .form .option-input+label:not(:focus):not(:active),
        .form .error .option-input+label:not(:focus):not(:active),
        .error .form .checkbox-input+label:not(:focus):not(:active),
        .form .error .checkbox-input+label:not(:focus):not(:active) {
            background-size: 8px 8px;
            background-image: linear-gradient(135deg, rgba(232, 71, 76, 0.5), rgba(232, 71, 76, 0.5) 25%, transparent 25%, transparent 50%, rgba(232, 71, 76, 0.5) 50%, rgba(232, 71, 76, 0.5) 75%, transparent 75%, transparent);
            background-repeat: repeat;
        }

        .form:not(.has-magic-focus) .customSelect.customSelectFocus,
        .form:not(.has-magic-focus) .customSelect:active,
        .form:not(.has-magic-focus) .select:active,
        .form:not(.has-magic-focus) .textarea:active,
        .form:not(.has-magic-focus) .text-input:active,
        .form:not(.has-magic-focus) .option-input+label:active,
        .form:not(.has-magic-focus) .checkbox-input+label:active,
        .form:not(.has-magic-focus) .customSelect:focus,
        .form:not(.has-magic-focus) .select:focus,
        .form:not(.has-magic-focus) .textarea:focus,
        .form:not(.has-magic-focus) .text-input:focus,
        .form:not(.has-magic-focus) .option-input+label:focus,
        .form:not(.has-magic-focus) .checkbox-input+label:focus {
            background: #4E4E4E;
        }

        .form .message {
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 100;
            font-size: 0.625em;
            color: white;
        }

        .form .option-input,
        .form .checkbox-input {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .form .option-input+label,
        .form .checkbox-input+label {
            display: inline-block;
            width: auto;
            color: #4E4E4E;
            position: relative;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
        }

        .form .option-input:focus+label,
        .form .checkbox-input:focus+label,
        .form .option-input:active+label,
        .form .checkbox-input:active+label {
            color: #4E4E4E;
        }

        .form .option-input:checked+label,
        .form .checkbox-input:checked+label {
            color: white;
        }

        .form .button {
            font: inherit;
            line-height: normal;
            cursor: pointer;
            background: #0c703d;
            color: white;
            font-weight: bold;
            width: auto;
            margin-left: auto;
            font-weight: bold;
            padding-left: 2em;
            padding-right: 2em;
        }

        .form .button:hover,
        .form .button:focus,
        .form .button:active {
            color: white;
            border-color: white;
        }

        .form .button:active {
            position: relative;
            top: 1px;
            left: 1px;
        }

        body {
            padding: 2em;
        }

        .form {
            max-width: 40em;
            margin: 0 auto;
            position: relative;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-between;
            align-items: flex-end;
        }

        .form .field {
            width: 100%;
            margin: 0 0 1.5em 0;
        }

        @media screen and (min-width: 40em) {
            .form .field.half {
                width: calc(50% - 1px);
            }
        }

        .form .field.last {
            margin-left: auto;
        }

        .form .textarea {
            max-width: 100%;
        }

        .form .select {
            text-indent: 0.01px;
            text-overflow: "" !important;
        }

        .form .select::-ms-expand {
            display: none;
        }

        .form .checkboxes,
        .form .options {
            padding: 0;
            margin: 0;
            list-style-type: none;
            overflow: hidden;
        }

        .form .checkbox,
        .form .option {
            float: left;
            margin: 1px;
        }

        .customSelect {
            pointer-events: none;
        }

        .customSelect:after {
            content: "";
            pointer-events: none;
            width: 0.5em;
            height: 0.5em;
            border-style: solid;
            border-color: white;
            border-width: 0 3px 3px 0;
            position: absolute;
            top: 50%;
            margin-top: -0.625em;
            right: 1em;
            transform-origin: 0 0;
            transform: rotate(45deg);
        }

        .customSelect.customSelectFocus:after {
            border-color: white;
        }

        .magic-focus {
            position: absolute;
            z-index: 0;
            width: 0;
            pointer-events: none;
            background: rgba(255, 255, 255, 0.15);
            transition: top 0.2s, left 0.2s, width 0.2s;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transform-style: preserve-3d;
            will-change: top, left, width;
            transform-origin: 0 0;
        }

        #padtop {
            padding: 50px;
        }

        #sidebarMenu {
            padding-top: 80px;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" style="background-color: #0C713D;" href="/Home">DANG
            TIN TEE & COFFE</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" w-100 rounded-0 border-0">
            <span style="color: #ffffffff; font-size: 20px" class="me-2 ms-2">Xin chào,
                admin
            </span>
        </div>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" style="background-color: #0C713D;" href="/Logout">Đăng xuất</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky" id="sidebar-padtop">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" id="home">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="order">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="add-product">
                                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="customer">
                                <span data-feather=" users" class="align-text-bottom"></span>
                                Customers
                            </a>
                        </li>

                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <?php if (file_exists('../src/Views/admin/' . $data['page'] . '.php')) {
                    include '../src/Views/admin/' . $data['page'] . '.php';
                }
                ?>


            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <script type='text/javascript'>
        let baseURL = location.host + '/admin';
        jQuery(document).ready(function ($) {
            $("#home").click(function (event) {
                location.href = '/admin';
            });
            $("#add-product").click(function (event) {
                location.href = '/admin/ShowF/Product';
            });
            $("#order").click(function (event) {
                location.href = '/admin/ShowF/Order';
            });
            $("#customer").click(function (event) {
                location.href = '/admin/ShowF/Customer';
            });
        });
    </script>
</body>

</html>