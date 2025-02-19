<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql = "INSERT INTO tasks (title, description)
            VALUES ('$title' , '$description')";

    if($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: ". $conn->error;
    }
}

$conn->close();
?>