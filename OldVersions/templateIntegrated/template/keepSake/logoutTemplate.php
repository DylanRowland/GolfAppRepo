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
</head>
<body>
    <!-- Responsive navbar-->
    <?php
        navTEST();
    ?>
      <header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
      <div class="text-center my-5">
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
              <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Logout</h1><br>
              <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">log out of your account</p>
        </div>
    </header>
 <!-- CHANGE THE VALUE OF USERNAME ONCE WE GET ACCESS TO THE DATABASE -->
<?php $username = "temporary value"; ?>
<center>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2>Logout</h2>
                        <p> Goodbye <?php echo $username ?>! see you soon.</p>

<!-- Button starts here -->


                      <button type="button" class="btn btn-primary btn-lg" onclick="logout()">Logout</button>

                      <script>
                          function logout() {
                              // Perform any additional logout-related actions here
                              // For example, you may want to make an AJAX request to a logout endpoint on the server

                              // Unset the session (assuming you're using PHP sessions)
                              // This will destroy the session data on the server
                              <?php session_unset(); ?>

                              // Redirect to index.php
                              window.location.href = 'index.php';
                          }
                      </script>



<!-- ends here -->
                      </center>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image element - set the background image for the header in the line below-->
        
        <!-- Content section-->
        <!-- Footer-->
        <footer class="py-5 bg-dark fixed-bottom">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

