<?php

namespace MVC\Controllers;

class Intro extends \MVC\Core\Controller
{
    function Show()
    {
        $this->view('template', [
            'page' => 'Intro'
        ]);
    }
}