<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
// accessControll()
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
    <link href="/resources/style.css" rel="stylesheet" />
    <style>
        /* Adjust the column width and margin for rounds */
        .Round-card {
            width: 15%; /* Adjust the width as needed */
            margin-right: 1%; /* Adjust the margin as needed */
        }
    </style>
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
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">View All Rounds</h1><br>
              <br></br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">check all the Rounds</p>
        </div>
    </header>
    <br>

    <div class="col-md-12 mb-3"> <!-- Adjust margin-bottom as needed -->
        <div class="row">

              <form id="searchForm">
                  <input type="text" id="searchInput" onkeyup="filterRounds()" placeholder="Search by name">
              </form>
              
            <?php
          $pageData = $_SESSION['pageData'];
          foreach ($pageData as $i => $data) {
              echo '<div class="col-md-2 mb-3 Round-card"> <!-- Adjust margin-bottom as needed -->
                                  <div class="card" style="width: 100%;">
                                      <!--<img src="https://placekitten.com/200/' . (200 + $i * 10) . '" class="card-img-top" alt="Round ' . $i . '" style="width: 100%; height: 275px;">-->
                                      <div class="card-body">
                                          <h5 class="card-title">Round: ' . $data['courseName'] . '</h5>
                                          <p class="card-text">Score: ' . $data['totalScore'] . '</p>
                                          <p class="card-text">Date Played: ' . $data['datePlayed'] . '</p>
                                       <a href="/handlers/editRoundsHandler.php?id=' . $data['roundID'] . '" class="btn btn-primary">View Round</a>
                                      </div>
                                  </div>
                              </div>';
          }
            ?>
        </div>
    </div>

    <!-- Image element - set the background image for the header in the line below-->
        <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
        <div style="height: 20rem"></div>
    </div>
    <!-- Content section-->


                </div>
            </div>
        </div>

  <script>
      function filterRounds() {
          var input, filter, cards, card, name, i;
          input = document.getElementById('searchInput');
          filter = input.value.toUpperCase();
          cards = document.getElementsByClassName('card-body');
          for (i = 0; i < cards.length; i++) {
              card = cards[i];
              name = card.querySelector('card-body').textContent.toUpperCase(); // Get the teacher's name from the flip-card-front element
              if (name.indexOf(filter) > -1) {
                  card.parentNode.style.display = ''; // Show the entire row
              } else {
                  card.parentNode.style.display = 'none'; // Hide the entire row
              }
          }
      }
  </script>
  
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
