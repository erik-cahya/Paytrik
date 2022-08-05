<?php

namespace paytrik\app\core;

class FlashMessages
{

    public static function setFlash($message, $action, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
            <strong>Sukses !</strong> Data ' . $_SESSION['flash']['message'] . ' ' . $_SESSION['flash']['action'] . '
           
          </div>
          ';

            unset($_SESSION['flash']);
        }
    }
}
