<?php

namespace paytrik\app\core;

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        $model2 = '\\paytrik\\app\\models\\' . $model;

        return new $model2;
    }
}
