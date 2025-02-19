<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h2>Add a New Task</h2>
    <form action = "create.php" method = "POST">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description"placeholder="Task Description"></textarea>
        <button type="submit">Add Task</button>
    </form>

    <h2>All Tasks</h2>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM tasks");
        while ($row = $result->fetch_assoc() ) {
            echo "<tr>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a>
                        <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>

</body>
</html>