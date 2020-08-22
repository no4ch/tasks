<?php


namespace app\Controllers;


use app\Services\Login\LoginHandler;

class LoginController extends AppController
{
    public function indexAction()
    {
        if (isset($_COOKIE["id"]) && isset($_COOKIE["hash"])) {
            header("Location: /");
        }

        $this->setMeta('Вход');
        $errors = [];

        //проверка на отправку формы
        if (isset($_POST['submit'])) {
            $errors = LoginHandler::make()->validation($_POST["login"], $_POST["password"]);

            if (count($errors) < 1) {
                //передаем данные для уменьшения связанности, тк метод входа может изменяться
                if (!LoginHandler::make()->login($_POST["login"], $_POST["password"])) {
                    $errors[] = "Пользователь не найден";
                } else {
                    header('Location: /');
                }
            }
        }
        $this->set(compact('errors'));
//        debug($_COOKIE);

    }
}