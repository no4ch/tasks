<?php

namespace app\Controllers;

use app\Models\Task;
use app\Models\User;
use app\Services\Task\TaskHandler;

class MainController extends AppController
{
    public function indexAction()
    {
        if (!empty($_GET["page"])) {
            $tasks = Task::make()->getTasksByGetParameters($_GET["page"], 3);
        } else {
            $tasks = Task::make()->getTasksByGetParameters(0, 3);
        }

        $countTasks = Task::make()->getCountTasks();

        $this->setMeta('Главная', 'Описание');

        $user = false;
        if (isset($_COOKIE['id']) && isset($_COOKIE["hash"])) {
            $userFromDB = User::make()->getUserById($_COOKIE["id"]);
            if ($userFromDB->hash == $_COOKIE["hash"]) {
                $user = $userFromDB;
            }
        }

        $errors = [];

        if (isset($_POST['submit'])) {
            if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["text"])) {
                $errors = TaskHandler::make()->validation($_POST["name"], $_POST["email"], $_POST["text"]);
            } else {
                $errors[] = "Получены не все поля";
            }

            if (count($errors) < 1) {
                TaskHandler::make()->addTask($_POST["name"], $_POST["email"], $_POST["text"]);
                header("Location: /");
            }
        }

        $this->set(compact('user', 'tasks', 'countTasks', 'errors'));

    }

    public function __construct($route)
    {
        parent::__construct($route);
    }
}