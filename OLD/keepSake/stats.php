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
    <title>Golf Stat Chart - Start Bootstrap Template</title>
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
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Golf Stat Chart</h1>
               <br></br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Analyze your golf statistics with interactive charts</p>
        </div>
    </header>

    <!-- Content section -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>View Your Golf Statistics</h2>
                    <p class="lead">Track your performance and analyze your golf statistics with interactive charts.</p>
                    <p class="mb-0">Whether it's your driving accuracy, putting average, or overall score, visualizing your data can help you improve your game.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Golf Stat Chart Section -->
    <section class="py-5">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Placeholder for Chart.js stat chart -->
                    <canvas id="golfStatChart" width="400" height="200"></canvas>

                    <script>
                        // Sample data for the chart
                        var ctx = document.getElementById('golfStatChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Driving', 'Putting', 'Overall'],
                                datasets: [{
                                    label: 'Your Golf Stats',
                                    data: [75, 90, 80],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.5)',
                                        'rgba(54, 162, 235, 0.5)',
                                        'rgba(255, 206, 86, 0.5)',
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
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
