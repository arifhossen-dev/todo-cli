#! /usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use TaskCli\TaskManager;

$taskManger = new TaskManager();

$command = $argv[1] ?? null;
$arg1 = $argv[2] ?? null;
$arg2 = $argv[3] ?? null;

match ($command) {
    'add' => $taskManger->addTask($arg1),
    'list' => $taskManger->getAllTasks(),
    'delete'=> $taskManger->deleteTask($arg1),
    'update'=> $taskManger->updateTaskById($arg1, $arg2),
    'mark-in-progress' => $taskManger->taskMarkInProgress($arg1),
    'mark-done'=>$taskManger->taskMarDone($arg1),
    default => print "⚠️ Invalid command\n",
};