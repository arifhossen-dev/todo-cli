<?php

namespace TaskCli;


class TaskManager
{
    private array $tasks;
    private int $nextId;

    private string $taskStore = "./store/task.json";

    public function __construct()
    {
        $this->tasks = $this->getTaskFile();
        $this->nextId = $this->getLastTaskId() + 1;
    }

    public function addTask(string $description): void
    {
        $task = new Task($this->nextId, $description);

        array_push($this->tasks, $task->create());
        
        $this->updateTaskFile($this->tasks);

        echo "\n ✅ Task added successfully! \n";
    }

    public function createTaskFileIfNotExist(): void
    {
        if (!file_exists($this->taskStore) || filesize($this->taskStore) == 0) {
            file_put_contents($this->taskStore,"[]");
        }
    }

    public function getTaskFile()
    {
        $this->createTaskFileIfNotExist();

        return json_decode(file_get_contents($this->taskStore),true);
    }

    public function updateTaskFile($tasks) : void 
    {
        file_put_contents($this->taskStore,json_encode($tasks));

        json_decode(file_get_contents($this->taskStore),true);
    }

    // TODO: implement this method
    public function deleteTask(string $taskId) : void
    {
        //
    }

    // TODO: implement update task by id
    public function updateTask(string $taskId) : void
    {
        //
    }

    public function getLastTaskId(): int|null
    {
        $lastTask = end($this->tasks);

        return $lastTask["id"]??null;
    }

    public function getAllTasks()
    {
        $getTasks = $this->getTaskFile();

        foreach ($getTasks as $task) {
            echo $task["id"]." | ".$task["description"]." | ".$task["status"]." | ".$this->getDateOnly($task["created_at"])."\n";
        }

        return json_encode($getTasks);
    }

    public function getDateOnly($date): string
    {
        return date('d M',strtotime($date));
    }   

}