<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
verifyLogin(); 
resetPagedata();

$_SESSION['pageData']['roundID'] = $_GET['id'];

// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT * FROM GA_rounds WHERE roundID = :roundID");
$stmt->execute(['roundID' => $_SESSION['pageData']['roundID']]);
$roundInfo = $stmt->fetch();

$_SESSION['pageData']['courses'] = $roundInfo['courseID'];
$_SESSION['pageData']['datePlayed'] = $roundInfo['datePlayed'];





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
$_SESSION['pageData']['savedHoleIds'] = $holePlayedIDs;

$_SESSION['pageData']['holesPlayed'] = count($_SESSION['pageData']['savedHoleIds']);

// echo '<pre>';
// var_dump($_SESSION['pageData']['holePlayedIDs']);
// echo '</pre>';

header('Location: /18holeForm.php');
exit();


?>