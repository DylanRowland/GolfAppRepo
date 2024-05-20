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
  <link href="/template/css/styles.css" rel="stylesheet" />
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
              <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Edit your profile!</h1>
              <br></br>
              <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Fill this page with your content</p>
        </div>
    </header>



        <!-- Content section-->

              <br>
              <div class="container header">
                  <div class="row">
                    <div class="col-md-6 header-left">

                      <!-- <img src="imagefolder/golf-ball-icon-simple-illustration-of-golf-ball-vector-icon-for-web-design-isolated-on-white-background-W2JD17.png" alt="Example Image" width="100" height="100"> -->

                    </div>
                    <div class="col-md-6 header-center">                    
                    </div>
                  </div>		
                </div>
                <div class="container content">
                    <div class="form-content">
                      <form action="/handlers/editProfileHandler.php" method="post"> 
                      <center> <div class="card text-bg-light mb-3 mb-3 row justify-content-center" style="max-width: 100rem;">
                        <div class="card-header"></div>
                        <div class="card-body">


                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="username" id="basic-addon1">Username</span>
                        </div>
                        <input type="*" class="form-control" name="username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_SESSION['pageData']['username']; ?>">
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="fname" id="basic-addon1">First Name</span>
                        </div>
                        <input type="*" name="fname" class="form-control" aria-label="fName" aria-describedby="basic-addon1" value="<?php echo $_SESSION['pageData']['fName']; ?>">
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="lName" id="basic-addon1">Last Name</span>
                        </div>
                        <input type="*" name="lname" class="form-control" aria-label="lName" aria-describedby="basic-addon1" value="<?php echo $_SESSION['pageData']['lName']; ?>">
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="location" id="basic-addon1">Location</span>
                        </div>
                        <input type="*" name="location" class="form-control" aria-label="Location" aria-describedby="basic-addon1" value="<?php echo $_SESSION['pageData']['location']; ?>">
                      </div>



                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="email" id="basic-addon1">Email</span>
                        </div>
                        <input type="email" name="email" class="form-control" aria-label="email" aria-describedby="basic-addon1" value="<?php echo $_SESSION['pageData']['email']; ?>">
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="bio" id="basic-addon1">Bio</span>
                        </div>
                        <textarea type="*" name="bio" class="form-control" aria-label="Bio" aria-describedby="basic-addon1" ><?php echo $_SESSION['pageData']['bio']; ?></textarea>
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="pfp" id="basic-addon1">Profile Picture URL</span>
                        </div>
                        <input type="*" name="pfp" class="form-control" aria-label="ProfilePicURL" aria-describedby="basic-addon1" value="<?php echo $_SESSION['pageData']['pfp']; ?>">
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" name="password" id="basic-addon2">Password</span>
                        </div>
                        <input type="password" name="password" class="form-control" aria-label="Password" aria-describedby="basic-addon2" value="<?php echo $_SESSION['pageData']['password']; ?>">
                      </div>


                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" name="phone" id="basic-addon1">Phone Number:</span>
                            </div>
                            <input type="*" name="phone" class="form-control" aria-label="ProfilePicURL" aria-describedby="basic-addon1" value="<?php echo $_SESSION['pageData']['phone']; ?>">
                          </div>

                          


                      </div>

                      <div class="input-group mb-3">
                        <!-- <a href="profile.php" class="form-control">Submit</a> -->
                         <button type="submit" class="form-control"> Submit </button>

                        <!-- <h5 class="card-title">Dark card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                          </div>
                        </div> </center>
                      </form>

                      </div>
                    </div>
                  </div>
        <!-- Content section-->

        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2></h2>
                        <p class="lead"></p>
                        <p class="mb-0"></p>
                    </div>
                </div>
            </div>
        </section>
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

                  