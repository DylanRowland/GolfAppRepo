<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

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
              <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Holes</h1>
              <br></br>
              <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Fill out your hole sheet!</p>
        </div>
    </header>
<br> <center>

<form>
 
              <style>
                .form-group {
                  display: inline-block;
                  margin-right: 20px; /* Adjust spacing between form groups */
                }
              </style>

              <div class="form-group">
                <label for="par1">Par:</label>
                <input type="number" id="par1" name="par1" min="0" value="" disabled>
              </div>

              <div class="form-group">
                <label for="par2">Red Yards:</label>
                <input type="number" id="par2" name="par2" min="0" disabled>
              </div>

              <div class="form-group">
                <label for="par3">White Yards:</label>
                <input type="number" id="par3" name="par3" min="0" disabled>
              </div>

              <div class="form-group">
                <label for="par3">Blue Yards:</label>
                <input type="number" id="par3" name="par3" min="0" disabled>

                <!-- userID --> <input type="hidden" id="userID" name="userID" value="CHANGE THIS">
                <!-- courseID --> <input type="hidden" id="courseID" name="courseID" value="CHANGE THIS">
                <!-- roundID --><input type="hidden" id="roundID" name="roundID" value="CHANGE THIS">
               <!-- holeNumber --> <input type="hidden" id="holeNumber" name="holeNumber" value="CHANGE THIS">
               
              </div>

<!-- hole description starts here -->
  <hr>
  <style>
    .large-textarea {
      width: 90%; /* Adjust width as needed */
      height: 150px; /* Adjust height as needed */
    }
  </style>
Hole Description: <br>
  <textarea class="large-textarea" readonly disabled>From GA_Holes</textarea>
<hr>

  <style>
      .row {
          display: flex;
          width: 100%;
      }

      .column {
          flex: 1;
          position: relative;
          display: flex; /* Added to center the image */
          align-items: center; /* Added to center the image */
          justify-content: center; /* Added to center the image */
      }
  </style>

  <div class="row">
      <div class="column">
          <label for="score">score: </label>
          <input type="number" id="score" name="score" min="0">
      </div>

      <div class="column">
          <label for="par2">Fairway: </label>
          <select id="par2" name="par2">
              <option value="yes">Yes</option>
              <option value="no">No</option>
          </select>
      </div>

      <div class="column">
        <label for="par2">Green: </label>
        <select id="par2" name="par2">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
      </div>

      <div class="column">
          <label for="par2">Penalties: </label>
          <input type="number" id="par2" name="par2" min="0">
      </div>
  </div>
<hr>
  <div class="row">
      <div class="column">
          <center>
              <img src="https://via.placeholder.com/250" alt="Placeholder Image" style="width: 250px; height: 250px;">
          </center>
      </div>
      <div class="column">
          <label for="w3review">Note: </label>
          <textarea id="w3review" name="w3review" rows="4" cols="50">TEXT AREA</textarea>
      </div>
  </div>



  </form>
  </center>

              <div class="row">
                <div class="column"></div>
                <div class="column"></div>
              </div>

            <center>  <button type="button" class="btn btn-primary">Submit</button> </center>
       <br><br>
     
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