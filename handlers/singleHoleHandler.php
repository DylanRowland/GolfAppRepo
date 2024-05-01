<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

    // Retrieve the submitted form data
    $score = $_POST['score'] ?? '';
    $putts = $_POST['putts'] ?? '';
    $fairway = $_POST['fairway'] ?? '';
    $green = $_POST['green'] ?? '';
    $penalties = $_POST['penalties'] ?? '';
    $note = $_POST['note'] ?? '';
    $holeID = $_POST['holeID'];









// echo '<pre>';
// var_dump($oldScore);
// echo '</pre>';

// echo '<pre>';
// var_dump($totalScore);
// echo '</pre>';

// echo '<pre>';
// var_dump($score);
// echo '</pre>';

// echo '<pre>';
// var_dump($oldScore);
// echo '</pre>';

// echo '<pre>';
// var_dump($updatedTotalScore);
// echo '</pre>';






$stmt = $pdo->prepare("UPDATE GA_holesPlayed SET 
score = :score, 
putts = :putts, 
fairway = :fairway,
green = :green,
penalties = :penalties,
note = :note
WHERE HolePlayedID = :HolePlayedID");


// Bind the parameters
$stmt->bindParam(':score', $score);
$stmt->bindParam(':putts', $putts);
$stmt->bindParam(':fairway', $fairway);
$stmt->bindParam(':green', $green);
$stmt->bindParam(':penalties', $penalties);
$stmt->bindParam(':note', $note);
$stmt->bindParam(':HolePlayedID', $holeID);

// Execute the statement
$stmt->execute();



// Prepare SQL statement to select only the HolePlayedID column
$sql = 'SELECT HolePlayedID FROM GA_holesPlayed WHERE roundID = :roundID';
$stmt = $pdo->prepare($sql);

// Bind parameter
$stmt->bindParam(':roundID', $_SESSION['pageData']['roundID']);

// Execute statement
$stmt->execute();

// Fetch all HolePlayedID values
$holePlayedIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Store the HolePlayedID values in the session
$_SESSION['pageData']['holePlayedIDs'] = $holePlayedIDs;




// Retrieve all hole scores for the current round
$stmt_select_hole_scores = $pdo->prepare("SELECT score FROM GA_holesPlayed WHERE roundID = :roundID");
$stmt_select_hole_scores->execute(array(':roundID' => $_SESSION['pageData']['roundID']));
$holeScores = $stmt_select_hole_scores->fetchAll(PDO::FETCH_COLUMN);

// Calculate the total score by summing up all hole scores
$totalScore = array_sum($holeScores);

// Prepare and execute PDO statement to update the total score for the round
$stmt_update_total_score = $pdo->prepare("UPDATE GA_rounds SET totalScore = :totalScore WHERE roundID = :roundID");
$stmt_update_total_score->execute(array(':totalScore' => $totalScore, ':roundID' => $_SESSION['pageData']['roundID']));




// echo '<pre>';
// var_dump($_SESSION['pageData']['holePlayedIDs']);
// echo '</pre>';


header('Location: /18holeForm.php');
exit();




?>