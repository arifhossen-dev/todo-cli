<?php

class Task 
{

    public function info()
    {
        return "Hi from task class"; // TODO: delete this line
    }

    public function createTaskFileIfNotExist(): void
    {
        if (!file_exists("task.json") || filesize("task.json") == 0) {
            file_put_contents("task.json","[]");
        }
    }

    public function getTaskFile()
    {
        $this->createTaskFileIfNotExist();

        return json_decode(file_get_contents("task.json"),true);
    }

    public function updateTaskFile($tasks) : void {
        file_put_contents("task.json",json_encode($tasks));

        json_decode(file_get_contents("task.json"),true);
    }

    public function addTask(string $description): void
    {
        $getTask = $this->getTaskFile();

        $currentTaskId = $this->getLastTaskId($getTask) + 1;

        $getTask[] = [
            "id" => $currentTaskId,
            "description" => $description,
            "status" => "todo",
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => null
        ];
        
        $this->updateTaskFile($getTask);

        echo "\n ✅ Task added successfully! \n";
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

    public function getLastTaskId($taskFile): int|null
    {
        $lastTask = end($taskFile);

        return $lastTask["id"];
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