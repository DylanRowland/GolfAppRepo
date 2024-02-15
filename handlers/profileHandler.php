<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 

verifyLogin();


// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT * FROM GA_profiles WHERE userUID = :userUID");
$stmt->execute(['userUID' => $_SESSION['user']['uid']]);
$profile = $stmt->fetch();


// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT * FROM GA_rounds WHERE userId = :userId");
$stmt->execute(['userId' => $_SESSION['user']['uid']]);
$rounds = $stmt->fetch();

// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT * FROM GA_courses WHERE courseID = :courseID");
$stmt->execute(['courseID' => $rounds['courseID']]);
$courses = $stmt->fetch();



$_SESSION['profile']['fname'] = $profile['first_name'];
$_SESSION['profile']['Lname'] = $profile['last_name'];
$_SESSION['profile']['pfp'] = $profile['profilePic'];
$_SESSION['profile']['bio'] = $profile['bio'];

$_SESSION['rounds']['datePlayed'] = $rounds['datePlayed'];
$_SESSION['rounds']['totalScore'] = $rounds['totalScore'];
$_SESSION['rounds']['holesPlayed'] = $rounds['holesPlayed'];

$_SESSION['courses']['courseMedia'] = $courses['courseMedia'];
$_SESSION['courses']['courseName'] = $courses['courseName'];
$_SESSION['courses']['scorecard'] = $courses['scorecard'];
$_SESSION['courses']['courseLogo'] = $courses['courseLogo'];
$_SESSION['courses']['courseDescription'] = $courses['courseDescription'];
$_SESSION['courses']['courseLocation'] = $courses['courseLocation'];
$_SESSION['courses']['totalPar'] = $courses['totalPar'];


// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// echo '<pre>';
// var_dump($profile);
// echo '</pre>';

// echo '<pre>';
// var_dump($rounds);
// echo '</pre>';


// echo '<pre>';
// var_dump($courses);
// echo '</pre>';


header('Location: /profile.php');
exit();




?>