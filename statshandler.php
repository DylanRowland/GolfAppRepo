<?php
require($_SERVER['DOCUMENT_ROOT'].'/functions.php');
verifyLogin();
resetPagedata();


$uid = $_SESSION['user']['uid'];

try {
    // Establish a database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query to fetch all data from GA_holesPlayed for the specific user
    $stmt = $pdo->prepare("SELECT * FROM GA_holesPlayed WHERE userID = :uid");
    $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch all rows as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Output the result (you can use var_dump, print_r, or any other method)


  //Fairway Count Start
    $fairwayCount = 0;


    foreach ($data as $hole) {
        if ($hole['fairway'] == 1) {
            $fairwayCount++;
        }
    }
  $_SESSION['pageData']['avgFairway'] = $fairwayCount / count($data) * 100;

  //Green Count Start
  $greenCount = 0;


    foreach ($data as $hole) {
        if ($hole['green'] == 1) {
            $greenCount++;
        }
    }
  $_SESSION['pageData']['avgGreen']= $greenCount / count($data) * 100;

  // Calculate the average putts
  $puttCounts = 0;
  $holeCount = 0;

  foreach ($data as $hole) {
    $puttCounts += $hole['putts'];
    $holeCount++;
  }


      $averagePutts = $puttCounts / $holeCount;
  $_SESSION['pageData']['roundedAvgPutts']= round($averagePutts, 2);

  // Calculate the average penalties
  $penaltyCounts = 0;
  $holeCount = 0;

  foreach ($data as $hole) {
    $penaltyCounts += $hole['penalties'];
    $holeCount++;
  }

      $averagePenalties = $penaltyCounts / $holeCount;
  $_SESSION['pageData']['roundedAvgPenalties']= round($averagePenalties, 2);


    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';

} 
catch (PDOException $e) {
    // Handle database connection errors
}



// Close the database connection
$pdo = null;
header('Location: /stats.php');
?>
