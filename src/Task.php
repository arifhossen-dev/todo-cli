<?php

namespace TaskCli;

class Task 
{
    private string $status;
    private string $createdAt;
    private string $updatedAt;
    
    public function __construct(
        private int $id, 
        private string $description, 
    ){
        $this->status = "pending";
        $this->createdAt = date("Y-m-d H:i:s");
        $this->updatedAt = date("Y-m-d H:i:s");
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function create(): array
    {
        return [
            "id" => $this->id,
            "description" => $this->description,
            "status" => $this->status,
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt,
        ];
    }

    public function info()
    {
        return "Hi from task class"; // TODO: delete this line
    }
}