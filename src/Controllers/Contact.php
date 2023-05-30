<?php

namespace MVC\Controllers;

class Contact extends \MVC\Core\Controller
{
    function Show()
    {
        $this->view('template', [
            'page' => 'Contact'
        ]);
    }
}