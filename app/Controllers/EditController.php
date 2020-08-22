<?php


namespace app\Controllers;


use app\Models\Task;
use app\Services\Login\LoginHandler;
use app\Services\Task\TaskHandler;

class EditController extends AppController
{
    public function indexAction()
    {
        $authorized = LoginHandler::make()->checkAdminRole();
        if (!$authorized){
            header("Location: /login");
        }

        if (empty($_GET["taskId"])) {
            if (gettype($_GET["taskId"]) != "number") {
                header("Location: /");
            }
        }

        $errors = [];
        if (isset($_POST['submit']) && $authorized) {
            if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["text"])) {
                $errors = TaskHandler::make()->validation($_POST["name"], $_POST["email"], $_POST["text"]);
            } else {
                $errors[] = "Получены не все поля";
            }

            if (count($errors) < 1) {
                Task::make()->updateTask($_GET["taskId"], $_POST["name"], $_POST["email"], $_POST["text"]);
            }
        }

        $task = Task::make()->getTaskById($_GET["taskId"]);
        if (!$task) {
            header("Location: /");
        }

        $this->set(compact('task', 'errors'));

        $this->setMeta("Редактировать задачу");
    }
}