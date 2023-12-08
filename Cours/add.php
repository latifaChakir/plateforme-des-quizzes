<?php
include('../connect.php');
$name = $_POST['cours_name'];
$url = $_POST['url'];


// Insert data into the database
$sql = "INSERT INTO cours (cours_name, cours_content) VALUES ('$name', '$url')";

if ($conn->query($sql) === TRUE) {
    header("Location: cours.php");
        exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>