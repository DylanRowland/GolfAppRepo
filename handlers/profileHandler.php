<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
verifyLogin();
resetPagedata();


// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT * FROM GA_profiles WHERE userUID = :userUID");
$stmt->execute(['userUID' => $_SESSION['user']['uid']]);
$profile = $stmt->fetch();


// Query the database for the user's credentials
$stmt = $pdo->prepare("SELECT * FROM GA_users WHERE uid = :uid");
$stmt->execute(['uid' => $_SESSION['user']['uid']]);
$user = $stmt->fetch();




// USER START$_SESSION['pageData']['username'] = $user['username'];
$_SESSION['pageData']['accountStatus'] = $user['accountStatus'];
$_SESSION['pageData']['email'] = $user['email'];
$_SESSION['pageData']['phone'] = $user['phone'];
$_SESSION['pageData']['username'] = $user['username'];
$_SESSION['pageData']['password'] = $user['password'];
// USER END

// USER START
$_SESSION['pageData']['fname'] = $profile['fName'];
$_SESSION['pageData']['Lname'] = $profile['lName'];
$_SESSION['pageData']['pfp'] = $profile['profilePic'];
$_SESSION['pageData']['location'] = $profile['location'];
$_SESSION['pageData']['bio'] = $profile['bio'];
// USER END



header('Location: /profile.php');
exit();




?>