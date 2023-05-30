<?php

namespace MVC\Core;

class Router
{
    private $controller = 'Home';
    private $action = 'Show';
    private $params;

    public function __construct()
    {
        $arr = $this->UrlProcess();

        // Xu li controller      
        if (isset($arr[0])) {
            if (class_exists('MVC\\Controllers\\' . $arr[0])) {
                $this->controller = $arr[0];
            }
            unset($arr[0]);
        }
        $this->controller = new('MVC\\Controllers\\' . $this->controller);
        // Xu li action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Xu ly params
        $this->params = $arr ? array_values($arr) : [];



    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function UrlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], "/")));
        }
    }

    public static function redirect($url)
    {
        header('Location: ' . $url);
    }
}