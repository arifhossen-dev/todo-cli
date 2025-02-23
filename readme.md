# Todo list - CLI application

## Available commands
```
# Adding a new task ✅
    ./src/cli.php add "Buy groceries"
# Output: Task added successfully (ID: 1)

# Updating and deleting tasks
    ./src/cli.php update 1 "Buy groceries and cook dinner"
    ./src/cli.php delete 1

# Marking a task as in progress or done
    ./src/cli.php mark-in-progress 1
    ./src/cli.php mark-done 1

# Listing all tasks
    ./src/cli.php list

# Listing tasks by status
    ./src/cli.php list done
    ./src/cli.php list todo
    ./src/cli.php list in-progress
```
