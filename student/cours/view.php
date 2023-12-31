<?php

include("../../connect.php");

session_start();

if(isset($_SESSION["user_id"])){
    $userId = $_SESSION['user_id'];}
    else{
        header('Location:../../index.php');
    }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;


    $sql = "SELECT * FROM cours WHERE cours_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $coursName = $row['cours_name'];
        $coursContent = $row['cours_content'];
    } else {

        die("Course not found");
    }
} else {
    die("Course ID not specified");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Above Multi-purpose Free Bootstrap Responsive Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://webthemez.com" />
    <!-- css -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="../../css/flexslider.css" rel="stylesheet" />
    <link href="../../css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 

    <script>
        var courseId = <?php echo json_encode($id); ?>;
        var loggedInUserId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>;

        $(document).ready(function () {
            // Retrieve saved progress when the page loads
            var savedProgressKey = 'userProgress_' + loggedInUserId + '_' + courseId;
            var savedProgress = localStorage.getItem(savedProgressKey) || 0;

            // Scroll to the saved position
            $(window).scrollTop(savedProgress);

            // Save progress on scroll
            $(window).scroll(function () {
                savedProgress = $(this).scrollTop();
            });

            // Save progress before closing the page
            $(window).on('beforeunload', function () {
                localStorage.setItem(savedProgressKey, savedProgress);
                saveProgressToServer(savedProgress, courseId, loggedInUserId); // Save progress when leaving the page
            });
        });

        function saveProgressToServer(progress, courseId, userId) {
            // Send progress to the server via AJAX
            $.ajax({
                url: 'progress.php',
                method: 'POST',
                data: { userId: userId, coursId: courseId, progress: progress },
                success: function (response) {
                    console.log('Progress saved successfully on the server.');
                },
                error: function (error) {
                    console.error('Error saving progress on the server:', error);
                }
            });
        }


        setInterval(function () {
            var currentProgress = $(window).scrollTop();
            var progressKey = 'userProgress_' + loggedInUserId + '_' + courseId;
            localStorage.setItem(progressKey, currentProgress);
            saveProgressToServer(currentProgress, courseId, loggedInUserId);
        }, 5000); 
    </script>



</head>

<body>
    <div id="wrapper">
        <?php include("nav.php") ?>
    </div>
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="pageTitle">
                        <?php echo $row['cours_name'] ?>
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section id="content">
        <div class="container" id="viewtext">
            <div class="cours-contenu">
                <h2>Contenu du cours</h2>
                <?php
                $coursContent = $row['cours_content'];

                $coursContentAvecStyles = str_replace('#', '<h3>', $coursContent);

                $coursContentAvecStyles = str_replace('$', '</h3>', $coursContentAvecStyles);

                echo "<p> $coursContentAvecStyles </p>" ;
                ?>


            </div>
        </div>
    </section>
    <div class="service_btn center" style="display:flex; justify-content:center;margin-bottom:20px">
        <a href="../question/question.php?id=<?php echo $row['cours_id']; ?>" style="border-radius: 10px;"
            class="btn btn-lg-square waves-effect waves-orange">Pass
            Quise
        </a>

    </div>
    <?php include("../../footer.php"); ?>



</body>

</html>