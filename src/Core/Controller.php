<?php

namespace MVC\Core;

class Controller
{
    function model($model)
    {
        return new("\\MVC\Models\\" . $model);
    }

    function view($view, $data)
    {
        require_once '../src/Views/' . $view . '.php';
    }
}