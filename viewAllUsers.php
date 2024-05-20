<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Full Width Pics - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="template/css/styles.css" rel="stylesheet" />
    <!-- Adjust the column width and margin for users -->
    <style>
        .user-card {
            width: 15%;
            margin-right: 1%;
            margin-left: 3%;
        }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <?php navTEST(); ?>
    <header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
        <div class="text-center my-5">
            <!-- User profile picture starts here -->
            <?php
            if (isset($_SESSION['user']['profile']['picURL'])) {
                $profilePicURL = $_SESSION['user']['profile']['picURL'];

                if ($profilePicURL !== null) {
                    echo '<img class="img-fluid rounded-circle mb-4" src="' . $profilePicURL . '" alt="User Profile Picture" />';
                } else {
                    echo '<img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="Default Profile Picture" />';
                }
            }
            ?>
            <!-- user profile pic ENDS here-->
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">View All Users</h1><br>
            <br></br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Check out the users</p>
        </div>
    </header>
    <br>

    <div class="col-md-12 mb-3">
        <div class="row">
            <?php
            if (isset($_SESSION['pageData']) && is_array($_SESSION['pageData'])) {
                $users = $_SESSION['pageData'];

                foreach ($users as $user) {
                    echo '<div class="col-md-2 mb-3 user-card">
                            <div class="card" style="width: 100%;">
                                <img src="' . $user['profilePic'] . '" class="card-img-top" alt="User" style="width: 100%; height: 275px;">
                                <div class="card-body">
                                    <h5 class="card-title">' . $user['username'] . '</h5>
                                    <p class="card-text">' . $user['fName'] . ' ' . $user['lName'] . '</p>

                                    <a href="#" onclick="addFriend(' . $user['uid'] . ')" class="btn btn-primary">Add Friend</a>
                                    <br>
                                    <br>
                                    <a href="#" onclick="viewProfile(' . $user['uid'] . ')" class="btn btn-primary">View Profile</a>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo "<p>No user data available.</p>";
            }
            ?>
        </div>
    </div>

    <div style="height: 10rem"></div>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Engaging Background Images</h2>
                    <p class="lead">The background images used in this template are sourced from Unsplash and are open source and free to use.</p>
                    <p class="mb-0">I can't tell you how many people say they were turned off from science because of a science teacher that completely sucked out all the inspiration and enthusiasm they had for the course.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy Your Website 2023</p>
        </div>
    </footer>

    <!-- JavaScript to handle adding friend -->
    <script>
        function addFriend(userId) {
            window.location.href = "/send_friend_request.php?user_id=" + userId;
        }

        function viewProfile(userId) {
            window.location.href = "/FrindsProfile.php?user_id=" + userId;
        }
    </script>

    <!-- Bootstrap core JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
