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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET['id'];
        $nom = htmlspecialchars($_POST["cours_name"]);
        $url = htmlspecialchars($_POST["url"]);
        $sqlUpdate = "UPDATE cours SET cours_name = '$nom', cours_content=' $url' WHERE cours_id='$id'";
        $result = mysqli_query($conn, $sqlUpdate);

        if ($result) {
            header("Location: cours.php");

        } else {
            die("Erreur lors de l'enregistrement des modifications: " . mysqli_error($conn));
        }
    }

    $conn->close();
    ?>
    <div class="container mt-5">
        <form id="coursForm" method="post">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="cours_name" value="<?php echo $row['cours_name'] ?>"
                    required>
            </div>
            <div class="form-group">
                <label>Contenu du cours</label>
                <textarea class="form-control" type="text" name="url"
                    required><?php echo $row['cours_content']; ?></textarea>
            </div>


            <div class="modal-footer">
                <a href="cours.php"><input type="button" class="btn btn-default" data-bs-dismiss="modal"
                        value="Cancel"></a>
                <input type="submit" class="btn btn-success" value="Add">
            </div>
        </form>
    </div>


</body>

</html>