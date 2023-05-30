<?php
namespace MVC\Controllers;

class Login extends \MVC\Core\Controller
{

    private function checkAuthor()
    {
        if (isset($_SESSION['islogin'])) {
            \MVC\Core\Router::redirect('/Home');
            exit;
        }
    }
    function Show()
    {
        $this->checkAuthor();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('template', [
                'page' => 'Login'
            ]);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validator = new \MVC\Core\Validator([
                'username' => 'isRequired',
                'password' => 'isRequired'
            ]);
            $errors = $validator->getErrors();
            if (!empty($errors)) {
                $this->view('template', [
                    'page' => 'Login',
                    'errors' => $errors
                ]);
            } else {
                $user = $this->model('User');
                $value = $validator->getValidatedValue();
                if ($user->authenticate($value['username'], $value['password'])) {
                    $_SESSION['islogin'] = 1;
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user_fullname'] = $user->getFullName();
                    if ($value['username'] === 'admin') {
                        echo '<script>alert("Đăng nhập admin thành công");setTimeout(function(){window.location.href="/admin/ShowF/Order";}, 1000);</script>';
                    } else {
                        echo '<script>alert("Đăng nhập thành công");setTimeout(function(){window.location.href="/Home";}, 1000);</script>';
                    }
                } else {
                    $this->view('template', [
                        'page' => 'Login',
                        'authenticate' => false
                    ]);
                }
            }
        }



    }
}