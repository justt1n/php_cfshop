<?php
namespace MVC\Controllers;

use \MVC\Core\Validator;

class User extends \MVC\Core\Controller
{
    private function checkAuthor()
    {
        if (!isset($_SESSION['islogin'])) {
            echo '<script>alert("Bạn phải đăng kí để sử dụng chức năng này");setTimeout(function(){window.location.href="/Home";}, 1000);</script>';
            exit;
        }
    }
    public function Profile()
    {
        $this->checkAuthor();
        $user = $this->model('User');
        $user->findById($_SESSION['user_id']);
        $this->view('user', [
            'page' => 'Profile',
            'username' => $user->getUserName(),
            'fullname' => $user->getFullName(),
            'phone' => $user->getPhone()
        ]);
    }

    public function ChangeInfor()
    {
        $this->checkAuthor();
        $user = $this->model('User');
        $user->findById($_SESSION['user_id']);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('user', [
                'page' => 'ChangeInfor',
                'username' => $user->getUserName(),
                'fullname' => $user->getFullName(),
                'phone' => $user->getPhone()
            ]);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator([
                'fullname' => 'isRequired',
                'phone' => 'isRequired | isPhone | unique: User, phone',
            ]);
            $validator->validate();
            $errors = $validator->getErrors();
            $value = $validator->getValidatedValue();
            if ($user->getPhone() === $value['phone']) {
                unset($errors['phone']);
            }
            if (!empty($errors)) {
                $this->view('user', [
                    'page' => 'ChangeInfor',
                    'errors' => $errors,
                    'username' => $user->getUserName(),
                    'fullname' => $user->getFullName(),
                    'phone' => $user->getPhone()
                ]);
            } else {
                $user->updateFullName($value['fullname']);
                $user->updatePhone($value['phone']);
                $_SESSION['user_fullname'] = $value['fullname'];
                echo '<script>alert("Cập nhật thành công");setTimeout(function(){window.location.href="/User/Profile";}, 1000);</script>';
            }
        }
    }

    public function ChangePassword()
    {
        $this->checkAuthor();
        $user = $this->model('User');
        $user->findById($_SESSION['user_id']);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('user', [
                'page' => 'ChangePassword'
            ]);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new Validator([
                'old_password' => 'isRequired',
                'password' => 'isRequired | minLength: 8',
                'password_confirmation' => 'isRequired | isSame: password'
            ]);
            $validator->validate();
            $errors = $validator->getErrors();
            $value = $validator->getValidatedValue();
            if (!$user->authenticate($user->getUserName(), $value['old_password'])) {
                $errors['old_password'] = 'Mật khẩu cũ không đúng';
            }
            if (!empty($errors)) {
                $this->view('user', [
                    'page' => 'ChangePassword',
                    'errors' => $errors
                ]);
            } else {
                $user->updatePasswordHash(password_hash($value['password'], PASSWORD_DEFAULT));
                echo '<script>alert("Đổi mật khẩu thành công, Vui lòng đăng nhập lại");setTimeout(function(){window.location.href="/Logout";}, 1000);</script>';
            }
        }
    }

    public function Order()
    {
        $orders = $this->model('Order')->getByCustomerID($_SESSION['user_id']);
        foreach ($orders as $order) {
            $items = $this->model('Order_Items')->getByOrderID($order->getOrderInfor()['order_id']);
            $order->setItems($items);
        }
        $this->view('user', [
            'page' => 'OrderUser',
            'orders' => $orders
        ]);
    }
}