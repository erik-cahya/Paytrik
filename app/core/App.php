<?php

namespace paytrik\app\core;

class App
{
    protected $controller = 'Login';
    protected $method = 'index';
    protected $parameter = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // CONTROLLER
        if (@file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $controller = '\\paytrik\\app\\controllers\\' . $this->controller;
        $this->controller = new $controller;

        // METHOD  
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // PARAMETER
        if (!empty($url)) {
            $this->parameter = array_values($url);
        }
        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}
