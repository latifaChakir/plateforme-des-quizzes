<?php

include('../connect.php');

$qst_edit = $_POST['qst_id'];



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


$sql_update_qst = "UPDATE questions SET qst_content='$name' WHERE qst_id='$qst_edit'";
if ($conn->query($sql_update_qst) === TRUE) {

    $sql_update_rep = "UPDATE reponses 
                      SET rep1='$rep1', rep2='$rep2', rep3='$rep3', rep4='$rep4', true_rep='$s_rep' 
                      WHERE qst_id='$qst_edit'";

    if ($conn->query($sql_update_rep) === TRUE) {
        $message = "La Question et les reponses ont été modifiées avec succès";

        $encodedMessage = urlencode($message);
        $url = "question.php?qst_id={$qst_edit}&msg={$encodedMessage}";

        header("Location: $url");
        exit();
    } else {
        echo "Error updating responses: " . $conn->error;
    }
} else {
    echo "Error updating question: " . $conn->error;
}

$conn->close();

?>
