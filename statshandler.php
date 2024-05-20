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
    $stmt = $pdo->prepare("SELECT hp.*, r.* FROM GA_holesPlayed hp JOIN GA_rounds r ON hp.roundID = r.roundID WHERE hp.userID = :uid;");
    $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch all rows as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // Initialize variables to keep track of the best round
    $bestRoundScore = 10000000000; // Set to a very high value to ensure any score will be lower
    $bestRoundID = null;



    // Initialize variables to keep track of the total scores and counts for 9-hole and 18-hole rounds
    $total9HoleScore = 0;
    $total18HoleScore = 0;
    $count9HoleRounds = 0;
    $count18HoleRounds = 0;
    $processedRoundIDs = []; // Array to store processed round IDs

    // Loop through the data to calculate total scores and counts for each type of round
    foreach ($data as $row) {
        // Extract the round ID from the data
        $roundID = $row['roundID'];

        // Check if we've already processed this round
        if (in_array($roundID, $processedRoundIDs)) {
            continue; // Skip processing this round if it's already processed
        }

        // Add the round ID to the list of processed round IDs
        $processedRoundIDs[] = $roundID;

        // Extract the round type from the data (assuming you have a column named 'numberOfHoles')
        $numberOfHoles = $row['numberOfHoles'];
        // Calculate the score of the round (assuming you have a column named 'totalScore')
        $roundScore = $row['totalScore'];

        // Check the round type and update the corresponding total score and count
        if ($numberOfHoles == 9) {
            $total9HoleScore += $roundScore;
            $count9HoleRounds++;
        } elseif ($numberOfHoles == 18) {
            $total18HoleScore += $roundScore;
            $count18HoleRounds++;
        }
    }
    //Calculate the average score for 9-hole rounds rounded to one decimal place
    $average9HoleScore = round($count9HoleRounds > 0 ? $total9HoleScore / $count9HoleRounds : 0, 1);
    $_SESSION['pageData']['avg9HoleScore'] = $average9HoleScore;
    // Calculate the average score for 18-hole rounds rounded to one decimal place
    $average18HoleScore = round($count18HoleRounds > 0 ? $total18HoleScore / $count18HoleRounds : 0, 1);
    $_SESSION['pageData']['avg18HoleScore'] = $average18HoleScore;

    // Now $average9HoleScore contains the average score for 9-hole rounds
    // And $average18HoleScore contains the average score for 18-hole rounds



    
    // Loop through the data to find the best round
    foreach ($data as $row) {
        // Calculate the score of the round (assuming you have a column named 'score')
        $roundScore = $row['totalScore'];
        // Check if the current round's score is better than the previous best round
        if ($roundScore < $bestRoundScore) {
            // Update the best round score and UID
            $bestRoundScore = $roundScore;
            $bestRoundID = $row['roundID'];
        }
    }

    // Now $bestRoundUID contains the userID of the player's best round
    $_SESSION['pageData']['bestRound'] = $bestRoundScore;


    
    // Initialize variables to keep track of the worst round
    $worstRoundScore = -1; // Set to a very low value to ensure any score will be higher
    $worstRoundID = null;

    // Loop through the data to find the worst round
    foreach ($data as $row) {
        // Calculate the score of the round (assuming you have a column named 'totalScore')
        $roundScore = $row['totalScore'];
        // Check if the current round's score is worse than the previous worst round
        if ($roundScore > $worstRoundScore) {
            // Update the worst round score and ID
            $worstRoundScore = $roundScore;
            $worstRoundID = $row['roundID'];
        }
    }

    // Now $worstRoundID contains the roundID of the user's worst round
    $_SESSION['pageData']['worstRound'] = $worstRoundScore;


//average score
    $holeCount = 0;
    $scoreCount = 0;

        foreach ($data as $hole) {
                $scoreCount += $hole['score'];
                $holeCount++;
            
        }
      $scoreAvg = $scoreCount / $holeCount;
    $_SESSION['pageData']['avgscore'] = round($scoreAvg, 1);


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



    
  
    // Initialize variables to keep track of the total number of holes and rounds played
    $totalHolesPlayed = count($data);
    $_SESSION['pageData']['totalHolesPlayed'] = $totalHolesPlayed;
    $totalRoundsPlayed = count(array_unique(array_column($data, 'roundID')));
    $_SESSION['pageData']['totalRoundsPlayed'] = $totalRoundsPlayed;
    
    
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
