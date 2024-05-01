<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
verifyLogin();



// HolePlayedID(create)(IN GA_holesPlayed)

// userID(already have)(IN ALL)
// ($_SESSION['user']['uid'])

// courseID(should already have, Static For now)(IN GA_holesPlayed)
$courseID = 1;

// roundID(should already have, Static For now)(IN GA_holesPlayed)
$roundID = 6;

// holeNumber(should be inputted, Static For now)(IN GA_holesPlayed)
$holeNumberPlayed = 8;
$holeNumberCurrent = 1

// score(should be inputted, Static For now)(IN GA_holesPlayed)
$score = 1;

// putts(should be inputted, Static For now)(IN GA_holesPlayed)
$putts = 1;

// fairway(should be inputted, Static For now)(IN GA_holesPlayed)
$fairway = 1;

// green(should be inputted, Static For now)(IN GA_holesPlayed)
$green = 1;

// penalties(should be inputted, Static For now)(IN GA_holesPlayed)
$penalties = 0;

// note(should be inputted, Static For now)(IN GA_holesPlayed)
$note = "Testing";

//totalScore(added to per redirect here)(IN GA_rounds)
if($totalScore = 0 || $totalScore = NULL){
  $totalScore = 0;
}else{
  $totalScore = $totalScore + $score;
}


try {


    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Find the highest holeID
    $query = "SELECT MAX(HolePlayedID) AS max_HolePlayedID FROM GA_holesPlayed";
    $stmt = $pdo->query($query);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nextHoleID = $row['max_holeID'] + 1;

    // Prepare the SQL statement for insertion
    $sql = "INSERT INTO GA_holesPlayed (HolePlayedID, userID, courseID, roundID, holeNumber, score, putts, fairway, green, penalties, note) 
            VALUES (:HolePlayedID, :userID, :courseID, :roundID, :holeNumber, :score, :putts, :fairway, :green, :penalties, :note)";

    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':HolePlayedID', $nextHoleID);
    $stmt->bindParam(':userID', $_SESSION['user']['uid']);
    $stmt->bindParam(':courseID', $courseID);
    $stmt->bindParam(':roundID', $roundID);
    $stmt->bindParam(':holeNumber', $holeNumberLeft);
    $stmt->bindParam(':score', $score);
    $stmt->bindParam(':putts', $putts);
    $stmt->bindParam(':fairway', $fairway);
    $stmt->bindParam(':green', $green);
    $stmt->bindParam(':penalties', $penalties);
    $stmt->bindParam(':note', $note);

    // Execute the statement
    $stmt->execute();

    echo "New record created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;





?>