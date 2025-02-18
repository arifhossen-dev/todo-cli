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

    public function getAllTasks()
    {
        $getTasks = $this->getTaskFile();

        foreach ($getTasks as $task) {
            echo $task["id"]." | ".$task["description"]." | ".$task["status"]." | ".$this->getDateOnly($task["created_at"])."\n";
        }

        return json_encode($getTasks);
    }

    public function updateTaskById(string $taskId, string $value) : void
    {
        $validTaskIndex = $this->getValidItem($taskId);
        
        if ($validTaskIndex == -1) {
            return;
        }

        $this->tasks[$validTaskIndex]["description"] = $value;

        $this->updateTaskFile($this->tasks);

        echo "\n ✅ Task updated successfully! \n";
    }


    public function taskMarkInProgress(int $taskId)
    {
        $validTaskIndex = $this->getValidItem($taskId);
        
        if ($validTaskIndex == -1) {
            return;
        }

        $this->tasks[$validTaskIndex]["status"] = "in-progress";

        $this->updateTaskFile($this->tasks);

        echo "\n ✅ Task marked as in-progress successfully! \n";
    }

    public function taskMarDone(int $taskId)
    {
        $validTaskIndex = $this->getValidItem($taskId);
        
        if ($validTaskIndex == -1) {
            return;
        }

        $this->tasks[$validTaskIndex]["status"] = "done";

        $this->updateTaskFile($this->tasks);

        echo "\n ✅ Task marked as done successfully! \n";
    }

    public function deleteTask(int $taskId) : void
    {
        $validTaskIndex = $this->getValidItem($taskId);
        if ($validTaskIndex == -1) {
            return;
        }

        unset($this->tasks[$validTaskIndex]);
        $this->updateTaskFile($this->tasks);

        echo "\n ✅ Task deleted successfully! \n";
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

    public function getValidItem(int $taskId): int
    {
        if ($taskId == 0 || $taskId == "" || $taskId < -1) {
            // throw new \InvalidArgumentException("Task with ID $taskId not found.");
            echo "\n🛑 Please provide a valide task ID.\n";
            return -1;
        }

        $seletedTask = [];
        $seletedTaskIndex = -1;

        foreach ( $this->tasks as $index => $task) {
            if ($task["id"] == $taskId) {
                $seletedTask[] = $task;
                $seletedTaskIndex = $index;
            }
        }

        if (count($seletedTask) <= 0) {
            echo "\n🛑 Task with ID $taskId not found.\n";
            return -1;
        }
        
        return $seletedTaskIndex;
    }

    public function getLastTaskId(): int|null
    {
        $lastTask = end($this->tasks);

        return $lastTask["id"]??null;
    }

    public function getDateOnly($date): string
    {
        return date('d M',strtotime($date));
    }   

}