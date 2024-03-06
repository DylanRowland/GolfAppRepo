<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 

verifyLogin();

$uid = $_SESSION['user']['uid']; // all
$fName = $_POST['fname'];  // profiles
$lName = $_POST['lname'];  // profiles
$bio = $_POST['bio'];  // profiles
$pfp = $_POST['pfp'];  // profiles
$location = $_POST['location'];  // profiles
$username = $_POST['username'];  // users
$email = $_POST['email'];  // users
$phoneNum = $_POST['phone'];  // users
$pWord = $_POST['password'];  // users


// Prepare the UPDATE statement
$stmt = $pdo->prepare("UPDATE GA_users SET 
username = :username, 
password = :pWord, 
email = :email,
phone = :phone
WHERE uid = :uid");

// Bind the parameters
$stmt->bindParam(':username', $username);
$stmt->bindParam(':pWord', $pWord);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phoneNum);
$stmt->bindParam(':uid', $uid);

// Execute the statement
$stmt->execute();


// Prepare the UPDATE statement
$stmt = $pdo->prepare("UPDATE GA_profiles SET 
fName = :fName, 
lName = :lName, 
profilePic = :profilePic, 
location = :location,
bio = :bio
WHERE userUID = :uid");

// Bind the parameters
$stmt->bindParam(':fName', $fName);
$stmt->bindParam(':lName', $lName);
$stmt->bindParam(':profilePic', $pfp);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':bio', $bio);
$stmt->bindParam(':uid', $uid);

// Execute the statement
$stmt->execute();



header('Location: /handlers/profileHandler.php');
exit();




?>