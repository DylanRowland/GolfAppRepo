<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php'); 
verifyLogin();
resetPagedata();




// Check if course ID parameter is set
if (isset($_GET['id'])) {
    $courseID = $_GET['id'];

    // Query the database to fetch course details based on the ID
    $stmt = $pdo->prepare("SELECT * FROM GA_courses WHERE courseID = :courseID");
    $stmt->execute(['courseID' => $courseID]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if course data is found
    if ($course) {
        // Store the course data in the session
        $_SESSION['courseData'] = $course;
      header('Location: /ViewCourses.php');
    } else {
        // Handle the case when no course is found with the provided ID
        echo "Course not found.";
        exit;
      header('Location: Courses.php');
    }
} else {
    // Handle the case when no course ID is provided
    echo "Course ID is missing.";
    exit;
  header('Location: /Courses.php');
}



echo '<pre>';
var_dump($_SESSION);
echo '</pre>';


?>