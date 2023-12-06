<?php
include('../connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedAnswers = json_decode(file_get_contents("php://input"), true);

    foreach ($selectedAnswers as $qstId => $selectedAnswer) {
        $content = $selectedAnswer; 

        $sqlInsert = "INSERT INTO reponse_student (content, qstID) VALUES ('$content', $qstId)";
        $resultInsert = mysqli_query($conn, $sqlInsert);

        if (!$resultInsert) {   
            die('Error: ' . mysqli_error($conn));
        }   
    }

    echo 'Votre reponses a éte sauvgarder avec succes!';
} else {
    echo 'Invalid request method.';
}
?>