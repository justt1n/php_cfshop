<?php

namespace MVC\Controllers;


class Home extends \MVC\Core\Controller
{
    function Show()
    {

        $this->view('template', [
            'page' => 'Home'
        ]);
    }

    function huhu()
    {
        echo "hhi";
        var_dump('1');
        die();
    }
}