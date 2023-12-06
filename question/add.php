<?php

include('../connect.php');

$name = $_POST['qst_name'];
$rep1 = $_POST['rep1'];
$rep2 = $_POST['rep2'];
$rep3 = $_POST['rep3'];
$rep4 = $_POST['rep4'];



if (isset($_POST["s_rep1"])) {
    $s_rep = "rep1";
} else if (isset($_POST["s_rep2"])) {
    $s_rep = "rep2";
} else if (isset($_POST["s_rep3"])) {
    $s_rep = "rep3";
} else if (isset($_POST["s_rep4"])) {
    $s_rep = "rep4";
}

$sql = "INSERT INTO questions (qst_content) VALUES ('$name')";
if ($conn->query($sql) === TRUE) {
    $lastInsertedID = $conn->insert_id;

    $sql_rep = "INSERT INTO reponses (qst_id, rep1, rep2, rep3, rep4, true_rep) 
    VALUES ('$lastInsertedID', '$rep1', '$rep2', '$rep3', '$rep4', '$s_rep')";

    if ($conn->query($sql_rep) === TRUE) {
        if (isset($_POST["sub1"])) {
        
            $message = "La Question et les reponse A éte Ajouter Avec Succes";

            $encodedMessage = urlencode($message); 
            $url = "addquestion.php?msg={$encodedMessage}";

            header("Location: $url");
            exit();

        } elseif (isset($_POST["sub2"])) {
            $message = "La Question et les reponse A éte Ajouter Avec Succes";

            $encodedMessage = urlencode($message); 
            $url = "question.php?msg={$encodedMessage}";

            header("Location: $url");
            exit();
        }
    } else {
        echo "Error: " . $sql_rep . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





$conn->close();

?>
