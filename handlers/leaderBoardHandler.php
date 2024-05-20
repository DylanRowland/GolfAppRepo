<?php 
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
verifyLogin();

// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT userID, courseID, datePlayed, totalScore, numberOfHoles FROM GA_rounds");
  $stmt->execute();

  // Fetch the first row only (assuming you want only one row)
  $round = $stmt->fetchAll(PDO::FETCH_ASSOC);



$_SESSION['pageData'] = $round;



// // Query the database for the courses
// $stmt = $pdo->prepare("SELECT * FROM GA_courses");
// $stmt->execute();
// $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// // Initialize an empty array to store the top 5 users for each course
// $topUsersPerCourse = [];

// // Query the database to get the top 5 users for each course
// foreach ($courses as $course) {
//     $courseID = $course['courseID'];

//     // For 9-hole rounds
//     $stmt = $pdo->prepare("
//         SELECT 
//             r.userID, 
//             r.courseID, 
//             u.username, 
//             r.totalScore, 
//             r.numberOfHoles
//         FROM 
//             GA_rounds r
//         JOIN 
//             GA_users u ON r.userID = u.uid
//         WHERE 
//             r.courseID = :courseID AND r.numberOfHoles >= 9 AND r.numberOfHoles < 18 AND r.totalScore > 0
//         ORDER BY 
//             r.totalScore ASC
//         LIMIT 
//             5
//     ");
//     $stmt->execute(['courseID' => $courseID]);
//     $topUsersPerCourse['9_holes'][$courseID] = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     // For 18-hole rounds
//     $stmt = $pdo->prepare("
//         SELECT 
//             r.userID, 
//             r.courseID, 
//             u.username, 
//             r.totalScore, 
//             r.numberOfHoles
//         FROM 
//             GA_rounds r
//         JOIN 
//             GA_users u ON r.userID = u.uid
//         WHERE 
//             r.courseID = :courseID AND r.numberOfHoles >= 18 AND r.totalScore > 0
//         ORDER BY 
//             r.totalScore ASC
//         LIMIT 
//             5
//     ");
//     $stmt->execute(['courseID' => $courseID]);
//     $topUsersPerCourse['18_holes'][$courseID] = $stmt->fetchAll(PDO::FETCH_ASSOC);
// }


// echo '<pre>';
// var_dump($_SESSION['pageData']);
// echo '</pre>';


header('Location: /leaderBoardPage.php');
exit();

?>