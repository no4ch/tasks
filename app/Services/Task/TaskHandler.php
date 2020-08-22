<?php


namespace app\Services\Task;


use RedBeanPHP\R;

class TaskHandler
{
    public static function make(): TaskHandler
    {
        return new static();
    }

    public function validation(string $name, string $email, string $text)
    {
        $errors = [];
        if (strlen($name) > 255 || strlen($name) < 1) {
            $errors[] = "Имя должно быть > 0";
        }
        if (!preg_match("/.+@.+\..+/i", $email) && strlen($email) < 255) {
            $errors[] = "Неверный формат или длинна почты";
        }
        if (strlen($text) < 1) {
            $errors[] = "Текст задачи должен быть заполнен";
        }
        return $errors;
    }

    public function addTask(string $name, string $email, string $text)
    {
        $task = R::dispense('tasks');
        $task->user_name = htmlspecialchars($name);
        $task->user_email = htmlspecialchars($email);
        $task->text = htmlspecialchars($text);
        $task->date = date("Y:m:d H:i:s");
        R::store($task);
    }

    public function hrefGenerator()
    {
        $href = '';
        if (isset($_GET["page"])){
            $href .= "&page=".$_GET["page"];
        }
        if (isset($_GET["sortBy"])){
            $href .= "&sortBy=".$_GET["sortBy"];
        }
        if (isset($_GET["sortType"])){
            $href .= "&sortType=".$_GET["sortType"];
        }
        return $href;
    }
}