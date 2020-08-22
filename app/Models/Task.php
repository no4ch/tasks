<?php

namespace app\Models;

use RedBeanPHP\R;

class Task extends AppModel
{
    public $table = "tasks";
    public $sortType = ["asc", "desc"];
    public $sortBy = [
        "name" => "user_name",
        "email" => "user_email",
        "status" => "completed"
    ];

    public static function make(): Task
    {
        return new static();
    }

    public function getTasks(int $start, int $count, $sortBy = 'id', $sortType = 'desc')
    {
        $start = $start == 0 ? $start : $start * 3 - 3;
        return R::find($this->table, "ORDER BY `$sortBy` $sortType LIMIT ?,?", [$start, $count]);
    }

    public function getCountTasks()
    {
        return R::count('tasks');
    }

    public function getTasksByGetParameters(int $start, int $count)
    {
        if (isset($_GET["sortBy"])) {
            $sortBy = (in_array($_GET["sortBy"], array_keys($this->sortBy)))
                ? $this->sortBy[$_GET["sortBy"]]
                : 'id';
        } else {
            $sortBy = 'id';
        }

        if (isset($_GET["sortType"])) {
            $sortType = (in_array($_GET["sortType"], $this->sortType))
                ? $_GET["sortType"]
                : 'desc';
        } else {
            $sortType = 'desc';
        }

        return $this->getTasks($start, $count, $sortBy, $sortType);
    }

    public function getTaskById($id)
    {
        return R::findOne($this->table, "WHERE `id` = ?", [$id]);
    }

    public function updateTask($id, string $name, string $email, string $text)
    {
        $task = $this->getTaskById($id);
        $task->user_name = htmlspecialchars($name);
        $task->user_email = htmlspecialchars($email);
        $task->text = htmlspecialchars($text);
        $task->edited_by_admin = true;

        return R::store($task);
    }

    public function performTaskById(int $id)
    {
        $task = $this->getTaskById($id);
        $task->completed = true;
        R::store($task);
    }
}