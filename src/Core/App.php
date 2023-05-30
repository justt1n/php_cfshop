<?php

namespace MVC\Core;

class App
{

    function __construct()
    {
        $router = new Router();
        $controller = $router->getController();
        $action = $router->getAction();
        $params = $router->getParams();

        call_user_func_array([$controller, $action], $params);
    }


}