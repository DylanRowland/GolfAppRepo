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
    <link href="/startbootstrap-full-width-pics-gh-pages/css/styles.css" rel="stylesheet" />
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
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Golf Courses Chart</h1>
          <br></br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Explore the popularity of golf courses</p>
        </div>
    </header>

    <!-- Content section -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Discover Popular Golf Courses</h2>
                    <p class="lead">Explore the popularity or ratings of different golf courses with an interactive chart.</p>
                    <p class="mb-0">Whether it's a famous golf resort or a hidden gem, see how golfers rate and choose their favorite courses.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Golf Courses Chart Section -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Placeholder for Chart.js golf courses chart -->
                    <canvas id="golfCoursesChart" width="400" height="200"></canvas>

                    <script>
                        // Sample data for the chart
                        var ctx = document.getElementById('golfCoursesChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Course A', 'Course B', 'Course C', 'Course D', 'Course E'],
                                datasets: [{
                                    label: 'Popularity/Ratings',
                                    data: [4.5, 4.2, 4.8, 4.0, 4.6],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.5)',
                                        'rgba(54, 162, 235, 0.5)',
                                        'rgba(255, 206, 86, 0.5)',
                                        'rgba(75, 192, 192, 0.5)',
                                        'rgba(153, 102, 255, 0.5)',
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 5 // Assuming the rating scale is from 0 to 5
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>

</html>
