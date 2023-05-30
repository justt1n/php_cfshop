<?php

namespace MVC\Controllers;

class Cafe extends \MVC\Core\Controller
{
    function Show()
    {
        $model = $this->model('Product');
        $products = [];
        foreach ($model->getAllProducts() as $product) {
            $product = $product->getProductInfor();
            if ($product['type'] === 'Coffee') {
                $products[] = $product;
            }
        }
        $this->view('template', [
            'page' => 'Cafe',
            'products' => $products
        ]);
    }
}