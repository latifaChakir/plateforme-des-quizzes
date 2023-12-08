<?php
include('../../connect.php');

session_start();
$user_id = $_SESSION["user_id"] ;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedAnswers = json_decode(file_get_contents("php://input"), true);

    foreach ($selectedAnswers as $qstId => $selectedAnswer) {
        $content = $selectedAnswer; 
        $sqlInsert = "INSERT INTO reponse_student (content, qstID , user_id) VALUES ('$content', $qstId , $user_id)";
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