<?php

namespace TaskCli;

class Task 
{
    private string $status = "pending";
    private string $createdAt;
    private string $updatedAt;
    
    public function __construct(
        private int $id, 
        private string $description, 
    ){
        $this->createdAt = date("Y-m-d H:i:s");
        $this->updatedAt = date("Y-m-d H:i:s");
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
}