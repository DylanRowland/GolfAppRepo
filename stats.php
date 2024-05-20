<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php'); 


// Example data for average penalties and putts
$averagePenalties = $_SESSION['pageData']['roundedAvgPenalties'];
$averagePutts = $_SESSION['pageData']['roundedAvgPutts'];
$averageGreen = $_SESSION['pageData']['avgGreen'];
$averageFairway =  $_SESSION['pageData']['avgFairway'];

// Include this line to check if the user is logged in; add your logic as needed
// accessControll();
?>

<!-- please disregard any comments on this page. Glory to CSSistan! -->

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

            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Golf Stats</h1>
               <br></br>
        </div>
    </header>

  <div id="dataContainer">
      <!-- Data will be displayed here -->
  </div>

    <!-- Content section -->
  <!-- Content section -->
  <section class="py-5">
      <div class="container my-5">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <!-- Three vertical columns -->
                  <div class="row">
                      <div class="col-md-4">
                        <!-- Column 1 -->

                        <center>
                        <table class="table table-bordered"">

                            <tr style="background-color: ForestGreen;">
                              <th><center>Average Score</center></th>
                            </tr>

                            <tr>
                              <td><center><?php echo $_SESSION['pageData']['avgscore'];?></center></td>
                            </tr>

<!-- if youre reading this, please help me. Alan has me chained up in his basement and he forces me to write css for him. its been 2 days since hes fed me, and im scared. if i dont make it out, tell my wifeand kids i love them-->

                        </table>
                        </center>


                        <!-- Column 1 end -->
                      </div>
                      <div class="col-md-4">
                        <!-- Column 2 -->



                        <center>
                                                <table class="table table-bordered">

                        <tr style="background-color: #6CA971;">
                          <th><center>Total Holes Played</center></th>
                        </tr>

                                                  <tr>
                                                    <td><center><?php echo $_SESSION['pageData']['totalHolesPlayed'];?></center></td>
                                                  </tr>



                                                </table>
                                                </center>



                        <!-- Column 2 end -->
                      </div>
                      <div class="col-md-4">
                        <!-- Column 3 end -->



                        <center>
                <table class="table table-bordered"">

                        <tr style="background-color: ForestGreen;">
                          <th><center>Total Rounds Played</center></th>
                        </tr>

          <tr>
         <td><center><?php echo $_SESSION['pageData']['totalRoundsPlayed'];?></center></td>
         </tr>



                                                </table>
                                                </center>



                        <!-- Column 3 end -->
                      </div>
                  </div>



<!-- column row 2 -->







                <!-- Three vertical columns -->
                                  <div class="row">
                                      <div class="col-md-4">
                                        <!-- Column 1 -->

                                        <center>
                                        <table class="table table-bordered"">

                <tr style="background-color: #6CA971;">
                  <th><center>Average Round Score</center></th>
                </tr>

                                          <tr>
                                            <td><center><p>9 Holes: <?php echo $_SESSION['pageData']['avg9HoleScore'];?></p><p> 18 Holes: <?php echo $_SESSION['pageData']['avg18HoleScore'];?></p></center></td>
                                          </tr>

                <!-- if youre reading this, please help me. Alan has me chained up in his basement and he forces me to write css for him. its been 2 days since hes fed me, and im scared. if i dont make it out, tell my wifeand kids i love them-->

                                        </table>
                                        </center>


                                        <!-- Column 1 end -->
                                      </div>
                                      <div class="col-md-4">
                                        <!-- Column 2 -->



                                        <center>
                                                                <table class="table table-bordered">

                                        <tr style="background-color: ForestGreen;">
                                          <th><center>Worst Round Score</center></th>
                                        </tr>

                                                                  <tr>
                                                                    <td><center><?php echo $_SESSION['pageData']['worstRound'];?></center></td>
                                                                  </tr>



                                                                </table>
                                                                </center>



                                        <!-- Column 2 end -->
                                      </div>
                                      <div class="col-md-4">
                                        <!-- Column 3 end -->



                                        <center>
                                <table class="table table-bordered"">

                                        <tr style="background-color: #6CA971;">
                                          <th><center>Best Round Score</center></th>
                                        </tr>

                          <tr>
                         <td><center><?php echo $_SESSION['pageData']['bestRound'];?></center></td>
                         </tr>



                                                                </table>
                                                                </center>

                                        </div>
                                                      <div class="col-md-15">
                                                        <!-- Column 3 end -->



                                                        <center>
                                                <table class="table table-bordered"">

                                                        

                                          



                                                                                </table>
                                                                                </center>


                                        <!-- Column 3 end -->
                                      </div>
                                  </div>








<!-- column row 2 end

                  <hr>
                  <!-- Placeholder for Chart.js stat chart -->
                  <canvas id="golfStatChart" width="400" height="200"></canvas> <!-- Change the height or width of the chart -->

                  <script>
                      // Sample data for the chart
                      var ctx = document.getElementById('golfStatChart').getContext('2d');
                      var myChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                              labels: ['Green (%)', 'Fairway (%)', 'Average Penalties', 'Average Putts'],
                              datasets: [{
                                  label: 'Your Golf Score',
                                  data: <?php echo json_encode([$averageGreen, $averageFairway, $averagePenalties, $averagePutts]); ?>, //change it if needed
                                  backgroundColor: [
                                      'rgba(60, 200, 113, 0.5)', // Light green color for green
                                      'rgba(120, 192, 120, 0.5)', // Lighter green color for fairway
                                      'rgba(60, 200, 113, 0.5)', // Lightest green color for Average Penalties
                                      'rgba(120, 192, 120, 0.5)', // Lightest green color for Average Putts
                                  ],
                                  borderColor: [
                                      'rgba(120, 192, 120, 1)',
                                      'rgba(60, 179, 113, 1)',
                                      'rgba(120, 192, 120, 1)',
                                      'rgba(60, 179, 113, 1)',
                                  ],
                                  borderWidth: 2
                              }]
                          },
                          options: {
                              scales: {
                                  y: {
                                      beginAtZero: true,
                                      max: 100, // Set the maximum value to 100%
                                  }
                              },
                              plugins: {
                                  legend: {
                                      display: false,
                                      onClick: (e) => e.preventDefault(),
                                  },
                              }
                          }
                      });
                  </script>
              </div>
          </div>
      </div>
  </section>


  <script>
      document.addEventListener('DOMContentLoaded', function() {
          goBackToOldData();
      });
  </script>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
    <script src="/resources/script.js"></script>
</body>


</html>