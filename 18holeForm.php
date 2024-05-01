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


if (isset($_SESSION['pageData']['holesPlayed'])) {
    $savedHoleIds = $_SESSION['pageData']['savedHoleIds'];

    // Array to store fetched hole data
    $holeDataArray = array();

    // Prepare SQL statement to select all columns from the table
    $sql = 'SELECT * FROM GA_holesPlayed WHERE HolePlayedID = :holePlayedID';

    // Collect hole data
    foreach ($savedHoleIds as $savedHoleId) {
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameter
        $stmt->bindParam(':holePlayedID', $savedHoleId);

        // Execute statement
        $stmt->execute();

        // Fetch all data associated with the HolePlayedID
        $holeDataArray[$savedHoleId] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <!-- CSS LINK -->
  <link href="/template/css/styles.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            <h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">18 hole game</h1>
          <br></br>
            <p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Get ready to play some golf.</p>
        </div>
    </header>

 <!-- Content section -->
              <style>
                  table {
                      font-family: Arial, sans-serif;
                      border-collapse: collapse;
                      width: 95%; /* Adjust table width */
                      margin: auto;
                  }

                  th, td {
                      border: 1px solid #dddddd;
                      text-align: left;
                      padding: 8px;
                  }



                  /* Darker blue background color for even rows */
                  tr:nth-child(even) td {
                      background-color: #cce0ff;
                  }

                  .center {
                      margin: auto;
                      width: 95%; /* Adjust form width */
                      padding: 20px;
                  }

                  /* Adjust column widths */
                  #scoreTable th:nth-child(1),
                  #scoreTable td:nth-child(1) {
                      width: 8%;
                  }

                  #scoreTable th:nth-child(2),
                  #scoreTable td:nth-child(2),
                  #scoreTable th:nth-child(3),
                  #scoreTable td:nth-child(3),
                  #scoreTable th:nth-child(4),
                  #scoreTable td:nth-child(4),
                  #scoreTable th:nth-child(5),
                  #scoreTable td:nth-child(5),
                  #scoreTable th:nth-child(6),
                  #scoreTable td:nth-child(6) {
                      width: 12%; /* Adjust widths of score, putts */
                  }

                  #scoreTable th:nth-child(7),
                  #scoreTable td:nth-child(7) {
                      width: 36%; /* Adjust width of note */
                  }

                  #scoreTable th:nth-child(8),
                  #scoreTable td:nth-child(8) {
                      width: 8%; /* Adjust width of action column */
                  }
              </style>

              <section class="py-5">
                  <div class="container my-5">
                      <div class="row justify-content-center">
                          <div class="col-lg-10 center">
                 <form action="/handlers/allRoundsHandler.php" method="post"> 
                                          <table id="scoreTable" class="mb-3">
                                              <thead>
                                                  <tr>
                                                      <th>Hole Number</th>
                                                      <th>Score</th>
                                                      <th>Putts</th>
                                                      <th>Fairway</th>
                                                      <th>Green</th>
                                                      <th>Penalties</th>
                                                      <th>Note</th>
                                                      <th>Edit Hole</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                if (isset($_SESSION['pageData']['holesPlayed']) && isset($holeDataArray)) {
                                                    $num_holes = intval($_SESSION['pageData']['holesPlayed']);
                                                    $savedHoleIds = $_SESSION['pageData']['savedHoleIds'];

                                                    for ($i = 1, $a = 0; $i <= $num_holes; $i++, $a++) {
                                                        $savedHoleId = $savedHoleIds[$a];
                                                        $holeData = $holeDataArray[$savedHoleId];

                                                        foreach ($holeData as $row) {
                                                            echo "<tr>
                                                                <td><input type='hidden' name='hole_number[]' value='$i'>$i</td>
                                                                <td><select name='score[]' class='form-control' />";
                                                                // Assuming 'score' is a column in your fetched data, add its value to the select options
                                                                echo "<option value='" . $row['score'] . "'>" . $row['score'] . "</option>";
                                                                echo "</select></td>
                                                                <td><select name='putts[]' class='form-control' />";
                                                                // Assuming 'putts' is a column in your fetched data, add its value to the select options
                                                                echo "<option value='" . $row['putts'] . "'>" . $row['putts'] . "</option>";
                                                                echo "</select></td>
                                                                <td><select name='fairway[]' class='form-control'>";



                                                          
                                                                // Assuming 'fairway' is a column in your fetched data, add its value to the select options
                                                                echo "<option value='" . $row['fairway'] . "'>" . (($row['fairway'] == '0')? 'N/A' : ($row['fairway'] == '1' ? 'Yes' : 'No')) . "</option>"; // Check if fairway is 0, display 'N/A' if true, otherwise check if fairway is 1, display "Yes" if true, otherwise display "No"
                                                                echo "</select></td>
                                                                <td><select name='green[]' class='form-control'>";

                                                          
                                                                // Assuming 'green' is a column in your fetched data, add its value to the select options
                                                                echo "<option value='" . $row['green'] . "'>" . (($row['green'] == '0')? 'N/A' : ($row['green'] == '1' ? 'Yes' : 'No')) . "</option>"; // Check if fairway is 0, display 'N/A' if true, otherwise check if fairway is 1, display "Yes" if true, otherwise display "No"
                                                                echo "</select></td>
                                                                <td><select name='penalties[]' class='form-control' />";
                                                                // Assuming 'penalties' is a column in your fetched data, add its value to the select options
                                                                echo "<option value='" . $row['penalties'] . "'>" . $row['penalties'] . "</option>";
                                                                echo "</select></td>
                                                                <td><select name='note[]' class='form-control' style='width: 100%;' />";
                                                                // Assuming 'note' is a column in your fetched data, add its value to the select options
                                                                echo "<option value='" . $row['note'] . "'>" . $row['note'] . "</option>";
                                                                echo "</select></td>
                                                                <td><a href='/singleHoleForm.php?id=$savedHoleId'><img src='https://cdn-icons-png.flaticon.com/512/5272/5272442.png' alt='Icon' width='20' height='20'></a></td> <!-- Action column -->
                                                            </tr>";
                                                        }
                                                    }
                                                }
                                                ?>
                                              </tbody>
                                          </table>

                                          <center>  <button type="submit" class="btn btn-primary btn-lg">Finalize</button> </center>
                              </form>
                          </div>
                      </div>
                  </div>
              </section>






<!-- Footer -->


<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS -->
<script src="js/scripts.js"></script>
</body>
</html>