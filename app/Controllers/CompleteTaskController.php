<?php


namespace app\Controllers;


use app\Models\Task;
use app\Services\Task\TaskHandler;

class CompleteTaskController extends AppController
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view = false;
    }

    public function indexAction()
    {
        if ($_GET["id"]) {
            Task::make()->performTaskById($_GET["id"]);
        }

        $href = TaskHandler::make()->hrefGenerator();

        header("Location: /".$href);
    }
}