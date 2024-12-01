<?php
require 'db.php';

// Fetch tasks from the database
$stmt = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>

        <form action="add_task.php" method="POST">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>
        </form>

        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <span class="<?= $task['is_completed'] ? 'completed' : '' ?>">
                        <?= htmlspecialchars($task['task']) ?>
                    </span>
                    <?php if (!$task['is_completed']): ?>
                        <a href="mark_complete.php?id=<?= $task['id'] ?>">Complete</a>
                    <?php endif; ?>
                    <a href="delete_task.php?id=<?= $task['id'] ?>" onclick="return confirm('Delete this task?');">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
