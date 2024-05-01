<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
verifyLogin(); 
resetPagedata();



$_SESSION['pageData']['courses'] = $_POST['courses'];
$_SESSION['pageData']['datePlayed'] = $_POST['datePlayed'];
$_SESSION['pageData']['holesPlayed'] = $_POST['holesPlayed'];



// Prepare the SQL query
$sql = 'SELECT MAX(roundID) as maxID FROM GA_rounds'; // Find the highest roundID
$stmt = $pdo->prepare($sql);
$stmt->execute();
$maxID = $stmt->fetchColumn();

// Increment the highest roundID by one
$newRoundID = $maxID + 1;

$totalScore = 0;

// Prepare the SQL query
$sql = 'INSERT INTO GA_rounds (
roundID, 
userID, 
courseID,
datePlayed,
totalScore
) VALUES (
:roundID, 
:userID, 
:courseID,
:datePlayed,
:totalScore
)';

// Bind the placeholders to the user values.
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':roundID', $newRoundID); // Use the new incremented roundID
$stmt->bindParam(':userID', $_SESSION['user']['uid']);
$stmt->bindParam(':courseID', $_SESSION['pageData']['courses']);
$stmt->bindParam(':datePlayed', $_SESSION['pageData']['datePlayed']);
$stmt->bindParam(':totalScore', $totalScore); // can not be a value, must be a variable.

// Execute the query
$stmt->execute(); // add user to DB
$uidLastInsert = $pdo->lastInsertId(); // gets the last ID inserted via this 

$_SESSION['pageData']['roundID'] = $newRoundID;



$sql = "INSERT INTO GA_holesPlayed (userID, roundID, courseID) VALUES (:userID, :roundID, :courseID)";

// Get the last inserted ID from the database
$stmt_max_id = $pdo->query("SELECT MAX(HolePlayedID) AS max_id FROM GA_holesPlayed");
$max_id = $stmt_max_id->fetch(PDO::FETCH_ASSOC)['max_id'];

// If there are no existing IDs, start from 1, otherwise increment the max ID
$new_id = ($max_id === null) ? 1 : $max_id + 1;
$i = 0;

// Initialize an array to store the generated IDs
$_SESSION['pageData']['savedHoleIds'] = array();

// Loop until you reach 18 IDs
while ($i < $_SESSION['pageData']['holesPlayed']) {
    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':userID', $_SESSION['user']['uid']);
    $stmt->bindParam(':roundID', $_SESSION['pageData']['roundID']);
    $stmt->bindParam(':courseID', $_SESSION['pageData']['courses']);

    // Execute the statement
    $stmt->execute();

    // Save the new ID into the session array
    $_SESSION['pageData']['savedHoleIds'][] = $new_id;

    // Increment the ID for the next iteration
    $new_id++;

    // Increment the loop counter
    $i++;
}

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';



// Redirect to another page after the loop completes
header('Location: /18holeForm.php');
exit(); // Make sure to exit after a redirect



// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';










?>