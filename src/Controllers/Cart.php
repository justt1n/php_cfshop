<?php

namespace MVC\Controllers;

class Cart extends \MVC\Core\Controller
{

    public function Show()
    {
        $this->view('template', [
            'page' => 'Cart'
        ]);
    }

    public function Order()
    {
        if (!isset($_SESSION['islogin'])) {
            echo '<script>alert("Bạn phải đăng nhập để đặt hàng");setTimeout(function(){window.location.href="/Cart";}, 1000);</script>';
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // echo "<pre>";
            $cart = json_decode($_POST['cart'], true);
            // foreach ($cart as $item) {
            //     var_dump($item);
            // }
            // echo $_POST['address'];
            // echo "</pre>";
            $order = $this->model('Order');
            $order->fill([
                'customer_id' => $_SESSION['user_id'],
                'address' => $_POST['address']
            ]);
            $order->save();
            foreach ($cart as $item) {
                $order_items = $this->model('Order_Items');
                $order_items->fill([
                    'order_id' => $order->getOrderInfor()['order_id'],
                    'product_id' => $item['id'],
                    'quantity' => $item['quan']
                ]);
                $order_items->save();
            }
            echo '<script>localStorage.removeItem("cart");</script>';
            echo '<script>alert("Đặt hàng thành công");setTimeout(function(){window.location.href="/Cart";}, 1000);</script>';
            // \MVC\Core\Router::redirect('/Cart');
        }
    }
}