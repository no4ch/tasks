<?php


namespace app\Controllers;


class LogoutController extends AppController
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view = false;
    }

    public function indexAction()
    {
        setcookie("id", "", time() - 3600, "/");
        setcookie("hash", "", time() - 3600, "/");

        header("Location: /");
    }
}