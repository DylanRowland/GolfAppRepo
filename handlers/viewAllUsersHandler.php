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
  // Prepare the SQL query 
  $sql = "SELECT GA_users.*, GA_profiles.* FROM GA_users JOIN GA_profiles ON GA_users.uid = GA_profiles.userUID WHERE GA_users.uid != :uid";
   // Prepare the statement 
  $stmt = $pdo->prepare($sql);
   // Bind the parameter value 
  $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);

  $stmt->execute();

  // Fetch all rows as an associative array
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);



} 
catch (PDOException $e) {
    // Handle database connection errors
}




// Store the combined data in the session variable $_SESSION['pageData']
$_SESSION['pageData'] = $data;

// echo '<pre>';
// var_dump($data);
// echo '</pre>';


// Close the database connection
$pdo = null;

header('Location: /viewAllUsers.php');
?>