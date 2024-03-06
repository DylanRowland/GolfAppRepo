<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
verifyLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bootstrap Template</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
?>
<ol> 
  <li>First Name: <?php echo $_SESSION['pageData']['fname']; ?></li>
  <li>Last Name: <?php echo $_SESSION['pageData']['Lname']; ?></li>
  <li>username: <?php echo $_SESSION['pageData']['username']; ?></li>
  <li>email: <?php echo $_SESSION['pageData']['email']; ?></li>
  <li>Phone Number: <?php echo $_SESSION['pageData']['phone']; ?></li>
  <li>Bio: <?php echo $_SESSION['pageData']['bio']; ?></li>
  <li>pfp: <?php echo $_SESSION['pageData']['profilePic']; ?></li>
  <li>location: <?php echo $_SESSION['pageData']['location']; ?></li>
  <li>Account Status: <?php echo $_SESSION['pageData']['accountStatus']; ?></li>
  <li>password: <?php echo $_SESSION['pageData']['password']; ?></li>
   <a href="/editProfile.php" class="btn btn-primary">Edit Profile</a>
</ol>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
