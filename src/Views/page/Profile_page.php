<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Profile</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" href="\User\ChangeInfor" class="btn btn-sm btn-outline-secondary">Sửa thông tin</a>
            <a type="button" href="\User\ChangePassword" class="btn btn-sm btn-outline-secondary">Đổi mật khẩu</a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-6">
            <table class="table">

                <tbody>
                    <tr>
                        <th scope="row">Username:</th>
                        <td>
                            <?= $data['username'] ?? '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Fullname:</th>
                        <td>
                            <?= $data['fullname'] ?? '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Phone:</th>
                        <td>
                            <?= $data['phone'] ?? '' ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>