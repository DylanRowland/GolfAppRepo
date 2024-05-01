<?php 
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
verifyLogin();

// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT * FROM GA_courses");
$stmt->execute();
$courses = $stmt->fetchAll();



// Outputting data
// echo $courses['courseID'] . "<br>";
// echo $courses['courseName'] . "<br>";
// echo $courses['totalPar'] . "<br>";
// echo $courses['scorecard'] . "<br>";
// echo $courses['courseLogo'] . "<br>";
// echo $courses['courseDescription'] . "<br>";
// echo $courses['courseMedia'] . "<br>";
// echo $courses['courseLocation'] . "<br>";


$_SESSION['pageData'] = $courses;

// echo $_SESSION['pageData'];

// Debugging output

// echo '<pre>';
// var_dump($_SESSION['pageData']);
// echo '</pre>';

// Redirect after all output is done
header('Location:/Courses.php');
exit();
?>
