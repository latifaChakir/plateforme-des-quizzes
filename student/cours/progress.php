<?php
include("../../connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the POST request
    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    $coursId = isset($_POST['coursId']) ? $_POST['coursId'] : null;
    $progress = isset($_POST['progress']) ? $_POST['progress'] : null;

   
    $checkExistingQuery = "SELECT * FROM progression WHERE user_id = $userId AND cours_id = $coursId";
    $existingResult = mysqli_query($conn, $checkExistingQuery);

    if (!$existingResult) {
        http_response_code(500);
        echo json_encode(['error' => 'Database Error']);
        exit();
    }

    // If the combination exists, update the progress; 
    if ($existingResult && mysqli_num_rows($existingResult) > 0) {
        $updateQuery = "UPDATE progression SET progress = $progress WHERE user_id = $userId AND cours_id = $coursId";
        $updateResult = mysqli_query($conn, $updateQuery);

        if (!$updateResult) {
            http_response_code(500);
            echo json_encode(['error' => 'Database Error']);
            exit();
        }
    } else {
        // Execute the SQL statement for insertion
        $insertQuery = "INSERT INTO progression (user_id, cours_id, progress) VALUES ($userId, $coursId, $progress)";
        $insertResult = mysqli_query($conn, $insertQuery);

        if (!$insertResult) {
            http_response_code(500);
            echo json_encode(['error' => 'Database Error']);
            exit();
        }
    }

    // Return a success JSON response
    header('Content-Type: application/json');
    echo json_encode(['success' => 'Progress saved successfully']);
} else {
    // If the script is called with an invalid request method
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>
