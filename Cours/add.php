<?php
include('../connect.php');
$name = $_POST['cours_name'];
$url = $_POST['url'];
$progress=$_POST['progress'];

// Insert data into the database
$sql = "INSERT INTO cours (cours_name, cours_content,progress_cours) VALUES ('$name', '$url','$progress')";

if ($conn->query($sql) === TRUE) {
    header("Location: cours.php");
        exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>