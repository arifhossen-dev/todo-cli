#! /usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use TaskCli\TaskManager;

$taskManger = new TaskManager();

$command = $argv[1] ?? null;
$arg1 = $argv[2] ?? null;
$arg2 = $argv[3] ?? null;

switch ($command) {
    case 'add':
        $taskManger->addTask($arg1);
        break;
    case 'list':
        $taskManger->getAllTasks();
        break;
    case 'delete':
        $taskManger->deleteTask($arg1);
        break;
    case 'update':
        $taskManger->updateTaskById($arg1, $arg2);
        break;
    case 'mark-in-progress':
        $taskManger->taskMarkInProgress($arg1);
        break;
    case 'mark-done':
        $taskManger->taskMarDone($arg1);
        break;
    default:
        echo "Invalid command\n";
        break;
}