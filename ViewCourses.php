<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php'); 
// Access control logic

// Include this line to check if the user is logged in; add your logic as needed
// accessControll();

// Example: If you want to redirect users to the login page if they are not logged in
// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }


// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Golf Courses Chart - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/template/css/styles.css" rel="stylesheet" />
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Responsive navbar-->
    <?php
    navTEST();
    ?>

    <header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
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
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">View Courses</h1>
            <br></br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Explore the popularity of golf courses</p>
        </div>
    </header>

    <!-- Content section -->
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

    <br>


             <div class="container">
                  <div class="row">
                      <div class="col-4">
                          <center>

                            <a href="handlers/CoursesHandler2.php" class="btn btn-primary">View Other Courses</a>

                          </center>
                      </div>
              <div class="col-4">
                <center>
                   <img src="https://media.istockphoto.com/id/1003199512/vector/wings-and-a-golf-ball.jpg?s=612x612&w=0&k=20&c=0jPKQQD0AskQe0eqogUuW69eypuLHFwRzazrk8gnU3o=" alt="Course logo" style="border-radius: 50%; max-width: 75px;">
                </center>
              </div>
                      <div class="col-4">
                          <center>
                             <a href="handlers/coursesHandler.php" class="btn btn-primary">start playing</a>
                          </center>
                      </div>
                  </div>
              </div>


    <hr>
    <div class="row">
        <div class="column" style="text-align: center;">
            <!-- Display course information -->
            <table class="table" style="margin: auto;">
                <thead>
                    <tr>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Location</th>
                        <th scope="col">Total Par</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['courseData'])) {
                        $course = $_SESSION['courseData'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $course['courseName']; ?></th>
                        <td><?php echo $course['courseLocation']; ?></td>
                        <td><?php echo $course['totalPar']; ?></td>
                        <td><?php echo $course['courseDescription']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="column">
            <center>
                <h1>Course Media</h1>
                <br>
                <img src="<?php echo $course['courseLogo']; ?>" class="w3-round" alt="Norway">
            </center>
        </div>
    </div>
    <br><br><br>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>

</html>
