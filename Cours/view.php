<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>


    <?php
    if (isset($_GET['id'])) {
        include("../connect.php");
        $id = $_GET['id'];
        $sql = "SELECT * FROM cours WHERE cours_id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

    }


    $conn->close();
    ?>
    <div class="container mt-5">
        <form id="coursForm" method="post">
            <div class="form-group">
                <h1><?php echo isset($row["cours_name"]) ? $row["cours_name"] : ''; ?></h1>
            
            </div>
            <div class="form-group">

                <p><?php echo isset($row["cours_content"]) ? $row["cours_content"] : ''; ?></p>
            </div>
            <div class="form-group">
                <label>Progress du cours</label>
                <input type="number" class="form-control" name="progress"  value="<?php echo isset($row["progress_cours"]) ? $row["progress_cours"] : ''; ?>"
                    required>
            </div>
            <div class="modal-footer">
                <a href="cours.php"><input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel"></a>
            </div>
        </form>
    </div>


</body>

</html>