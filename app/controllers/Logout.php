<?php

namespace paytrik\app\controllers;

use paytrik\app\core\Controller;


class Logout extends Controller
{

    public function __construct()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();
        header('Location:' . ROOT . '');
        exit;
    }
}
