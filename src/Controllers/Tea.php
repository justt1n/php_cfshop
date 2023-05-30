<?php

namespace MVC\Controllers;


class Tea extends \MVC\Core\Controller
{
    public function Show()
    {
        $model = $this->model('Product');
        $products = [];
        foreach ($model->getAllProducts() as $product) {
            $product = $product->getProductInfor();
            if ($product['type'] === 'tea') {
                $products[] = $product;
            }
        }
        $this->view('template', [
            'page' => 'Tea',
            'products' => $products
        ]);
    }


}