<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
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
  <link href="/template/css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Responsive navbar-->
    <?php
        navTEST();
    ?>
      <header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 56px; background-size: cover;">
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
              <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Profile</h1>
              <br></br>
              <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Check out your profile!</p>
        </div>
    </header>



        <!-- Content section-->
              <section class="py-5">
                  <div class="container my-5">
                      <div class="row justify-content-center">
                          <div class="col-lg-6">
                            <div class="card mb-4" style="max-width: 700px; height: 500px; padding: 20px;">
              <h5 class="card-title"> Username: <?php echo $_SESSION['pageData']['username']; ?></h5>
                              <div class="row g-10">
                                <div class="col-md-4">
                                 <img src="<?php echo $_SESSION['pageData']['pfp']; ?>" class="img-thumbnail">
                                 <div class="ms-4" style="width: 200px;">
                                    First Name: <?php echo $_SESSION['pageData']['fname']; ?> <br>
                                    Last Name: <?php echo $_SESSION['pageData']['Lname']; ?><br>
                                    Email: <?php echo $_SESSION['pageData']['email']; ?><br>
                                    Location: <?php echo $_SESSION['pageData']['location']; ?><br>
                                   
                                   
                                   
                                  </div>
                                </div>
                               
                                <div class="col-md-8">
                                  <div class="card-body">
                                    <p class="card-text">  Bio: <?php echo $_SESSION['pageData']['bio']; ?></p>   
                                  <a href="/handlers/statshandler.php" class="btn btn-primary">View your stats!</a>
                                  </div>                                   
                                  </div>                                 
                                </div> <a href="/editProfile.php" class="btn btn-primary mt-auto">Edit profile!</a>
                              </div> 
                            </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- Image element - set the background image for the header in the line below-->
              <div class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/3440x1440p-golf-course-background-6tzgspt28d9ctnli.jpeg')">
                  <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
                  <div style="height: 20rem"></div>
              </div>
              
        <!-- Content section--
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

