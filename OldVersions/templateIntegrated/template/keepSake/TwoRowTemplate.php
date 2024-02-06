<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php'); 
//accessControll() ?>
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
    <link href="/startbootstrap-full-width-pics-gh-pages/css/styles.css" rel="stylesheet" />
    <style>
        /* Define your own background colors for the rows */
        .first-row {
            background-color: #FF0000; /* Light gray */
        }

        .second-row {
            background-color: #D3D3D3; /* Light gray */
        }
    </style>
</head>
<body>
    <!-- Responsive navbar-->
    <?php
        navTEST();
    ?>
    <!-- First Vertical Row: Header with User Profile Picture -->
    <div class="first-row py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
        <div class="text-center my-5">
            <!-- User profile picture starts here -->
            <?php
                // Check if the user array and its keys are defined
                if (isset($_SESSION['user']['profile']['picURL'])) {
                    $profilePicURL = $_SESSION['user']['profile']['picURL'];

                    if ($profilePicURL !== null) {
                        // If profile picture URL is not null, display the user's profile picture
                        echo '<img class="img-fluid rounded-circle mb-4" src="' . $profilePicURL . '" alt="User Profile Picture" />';
                    } else {
                        // If profile picture URL is null, display the default image
                        echo '<img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="Default Profile Picture" />';
                    }
                }
            ?>
            <!-- user profile pic ENDS here-->
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Friends List</h1><br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Check out your friends list</p>
        </div>
    </div>

    <!-- Second Vertical Row: Content Section 1 -->
    <div class="second-row py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Full Width Backgrounds</h2>
                    <p class="lead">A single, lightweight helper class allows you to add engaging, full width background images to sections of your page.</p>
                    <p class="mb-0">The universe is almost 14 billion years old, and, wow! Life had no problem starting here on Earth! I think it would be inexcusably egocentric of us to suggest that we're alone in the universe.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Third Vertical Row: Content Section 2 -->
    <div class="first-row py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Engaging Background Images</h2>
                    <p class="lead">The background images used in this template are sourced from Unsplash and are open source and free to use.</p>
                    <p class="mb-0">I can't tell you how many people say they were turned off from science because of a science teacher that completely sucked out all the inspiration and enthusiasm they had for the course.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="second-row py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
