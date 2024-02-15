<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php'); 
verifyLogin(); ?>
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
  <link href="/resources/style.css" rel="stylesheet" />
</head>
<body>
    <!-- Responsive navbar-->
    <?php
        navTEST();
    ?>
      <header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 55px; background-size: cover;">
      <div class="text-center my-5">
        <div class="text-center my-5">

              <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Golf App</h1>
              <br></br>
              <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Welcome to the golf app</p>
        </div>
    </header>

        landingPage.php

              <!-- Content section-->
              <section class="py-3"> <!-- Reduced padding from py-5 to py-3 -->
                  <div class="container my-5">
                      <div class="row">
                          <!-- Left column for Features -->
                          <div class="col-lg-6">
                              <h2>Features</h2>
                            <ul>
                                <li><strong>Comprehensive Course Catalog:</strong> Explore a vast selection of golf courses from around the globe. Whether you're seeking a challenging championship layout or a scenic resort course, our app has you covered.</li>
                              <br>
                                <li><strong>Interactive Scorecard:</strong> Keep track of every stroke with our intuitive scorecard feature. Record your scores, track your progress over time, and analyze your performance to identify areas for improvement.</li>
                              <br>
                                <li><strong>Social Networking:</strong> Connect with fellow golfers, create your own friends list, and join golfing communities based on shared interests and preferences. Share your latest achievements, discuss course strategies, and arrange tee times with ease.</li>
                              <br>
                                <li><strong>Personalized Profile:</strong> Showcase your golfing journey with a customizable profile. Highlight your achievements, display your favorite courses, and set personal goals to motivate your progress.</li>
                              <br>
                                <li><strong>Advanced Statistics:</strong> Dive deep into your game with detailed statistics and analytics. Gain insights into your strengths and weaknesses, identify trends in your performance, and make data-driven decisions to elevate your play.</li>
                            </ul>

                          </div>
                          <!-- Right column for Image -->
                          <div class="col-lg-6">
                              <!-- Image element - set the background image for the header in the line below--> <br><br>
                              <div class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/3440x1440p-golf-course-background-6tzgspt28d9ctnli.jpeg')">
                                  <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
                                  <div style="height: 20rem"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- Content section-->
<hr>
              <!-- Content section 2 -->
              <section class="py-3"> <!-- Reduced padding from py-5 to py-3 -->
                  <div class="container my-5">
                      <div class="row">
                          <!-- Left column for Image -->
                          <div class="col-lg-6">
                              <img src="https://assets.livgolf.com/transform/7c0756e4-3535-47cf-8fd2-cc0d40d190e2/LIV-Golf-Mayakoba?w=715&fm=webp" class="img-fluid" alt="Golf Image">
                          </div>
                          <!-- Right column for Features -->
                          <div class="col-lg-6">

<h3>Welcome</h3>

                              <p>Welcome to our golf app, your ultimate companion on the green! Whether you're a seasoned pro or just starting out, our app is here to elevate your golfing experience. Discover new courses, track your progress with detailed stats, and connect with fellow golf enthusiasts. From keeping score to showcasing your profile, our app offers everything you need to enhance your game. Get ready to tee off into a world of excitement and improvement with our innovative golfing platform. Let's make every swing count together!.</p>
                              <!-- content ends here -->
                              <div style="height: 20rem"></div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- Content Section 2 -->
<hr>
              <!-- Content section 3-->
              <section class="py-3"> <!-- Reduced padding from py-5 to py-3 -->
                  <div class="container my-5">
                      <div class="row">
                          <!-- Left column for Features -->
                          <div class="col-lg-6">
                              <h2>Credits</h2>

                            <section>
                              <h4>Front end folks:</h4>
                              <ul>
                                <li>Alan</li>
                                <li>Zain</li>
                                <li>Xavier</li>
                              </ul>
                            </section>

                            <section>
                              <h4>Database detailers:</h4>
                              <ul>
                                <li>Brandon</li>
                                <li>Quentin</li>

                              </ul>
                            </section>

                            <section>
                              <h4>PHP people:</h4>
                              <ul>
                                <li>Dylan</li>
                                <li>Allen</li>
                                <li>Gunnar</li>
                              </ul>
                            </section>

                          </div>
                          <!-- Right column for Image -->
                          <div class="col-lg-6">
                              <!-- Image element - set the background image for the header in the line below-->
                              <div class="py-5 bg-image-full" style="background-image: url('https://www.grandtraverseresort.com/images/hero/partial/golf-1.jpg')">
                                  <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
                                  <div style="height: 20rem"></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- Content section 3-->




        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">

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
