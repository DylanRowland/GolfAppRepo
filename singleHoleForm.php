<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary functions and templates

// Example: Retrieve previously saved data for editing (replace with your logic)
$hole_number = 1; // Assuming we are editing hole number 1
if(isset($_SESSION['hole_data'][$hole_number])) {
    $hole_data = $_SESSION['hole_data'][$hole_number];
} else {
    // If no data found, initialize empty data
    $hole_data = [
        'score' => '',
        'putts' => '',
        'fairway' => '',
        'green' => '',
        'penalties' => '',
        'note' => ''
    ];
}
?>
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
              <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Edit Hole</h1>
              <br></br>
              <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Edit your holes</p>
        </div>
    </header>



        <!-- Content section-->

              <section class="py-5">
                  <div class="container my-5">
                      <div class="row justify-content-center">
                          <div class="col-lg-8"> <!-- Adjust column size as needed -->
                           <form method="post" id="scoreForm" action="handlers/singleHoleHandler.php">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>Hole Number</th>
                                              <th>Score</th>
                                              <th>Putts</th>
                                              <th>Fairway</th>
                                              <th>Green</th>
                                              <th>Penalties</th>
                                              <th>Note</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                            <tr>
                                <td><?php echo $hole_number; ?></td>
                                <td>
                                    <input type="hidden" name="holeID" value="<?php echo $_GET['id']; ?>">
                                    <input type="number" name="score" class="form-control" value="<?php echo $hole_data['score']; ?>">
                                </td>
                                <td><input type="number" name="putts" class="form-control" value="<?php echo $hole_data['putts']; ?>"></td>
                                <td>
                                    <select name="fairway" class="form-control">
                                        <option value="1" <?php if($hole_data['fairway'] == 'Yes') echo 'selected'; ?>>Yes</option>
                                        <option value="2" <?php if($hole_data['fairway'] == 'No') echo 'selected'; ?>>No</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="green" class="form-control">
                                        <option value="1" <?php if($hole_data['green'] == 'Yes') echo 'selected'; ?>>Yes</option>
                                        <option value="2" <?php if($hole_data['green'] == 'No') echo 'selected'; ?>>No</option>
                                    </select>
                                </td>
                                <td><input type="number" name="penalties" class="form-control" value="<?php echo $hole_data['penalties']; ?>"></td>
                                <td><input type="text" name="note" class="form-control" value="<?php echo $hole_data['note']; ?>"></td>
                         
                            </tr>

                                      </tbody>
                                  </table>
                                  <div class="text-center">
                                      <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </section>


              
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



