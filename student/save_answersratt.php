<?php
include('../connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedAnswers = json_decode(file_get_contents("php://input"), true);

    foreach ($selectedAnswers as $qstId => $selectedAnswer) {
        // Check if the question ID exists in the database
        $checkSql = "SELECT qstID FROM reponse_student WHERE qstID = $qstId";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            $content = $selectedAnswer;
            $sqlUpdate = "UPDATE reponse_student SET ratt = '$content' WHERE qstID = $qstId";
            $resultUpdate = mysqli_query($conn, $sqlUpdate);

            if (!$resultUpdate) {
                die('Error updating record: ' . mysqli_error($conn));
            }
        } else {
            echo "Error: Question with ID $qstId does not exist.";
        }
    }

    echo 'Vos réponses ont été mises à jour avec succès!';
} else {
    echo 'Invalid request method.';
}
?>
