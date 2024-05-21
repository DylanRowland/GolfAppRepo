<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


?>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Full Width Pics - Start Bootstrap Template</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/template/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Responsive navbar-->
<?php
navTEST();
?>
<header class="py-5 bg-image-full" style="background-image: url('/template/imagefolder/SunsetCourse.png'); margin-top: 56px; background-size: cover;">
<div class="text-center my-5">
<div class="text-center my-5">
<!-- User profile picture starts here -->
<?php
// Check if the user array and its keys are defined
if (isset($_SESSION['user']['profile']['picURL'])) {
$profilePicURL = $_SESSION['user']['profile']['picURL'];

if ($profilePicURL !== null) {
// If profile picture URL is not null, display the user's profile picture
echo '<img class="img-fluid rounded-circle mb-4" src="' . $profilePicURL . '" alt="User Profile Picture" />';
} else {
// If profile picture URL is null, display the default image
echo '<img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="Default Profile Picture" />';
}
}
?>
<!-- user profile pic ENDS here-->
<h1 class="text-white fs-3 fw-bolder bg-dark d-inline p-2 rounded">Profile</h1>
<br></br>
<p class="text-white-50 mb-0 bg-dark d-inline p-2 rounded">Check out your profile!</p>
</div>
</header>



<!-- Content section-->

<div class="container p-5">
<div class="row">
<div class="col-md-4">
<div class="card" >
<div class="card-body" style=" height: 718px; ">
 <div class="text-center">
    <img src="<?php echo $_SESSION['pageData']['pfp']; ?>" class="rounded-circle" alt="Profile Picture" width="150" height="150">
 </div> 

<h4 class="text-center"> Username: <?php echo $_SESSION['pageData']['username']; ?><br> </h4>                         
<h6 class="text-center"> First Name: <?php echo $_SESSION['pageData']['fName']; ?> <br> </h6>
<h6 class="text-center"> Last Name: <?php echo $_SESSION['pageData']['lName']; ?><br> </h6>
<h6 class="text-center"> Email: <?php echo $_SESSION['pageData']['email']; ?><br> </h6>
<h6 class="text-center"> Location: <?php echo $_SESSION['pageData']['location']; ?><br> </h6>
  

  <h6 class="text-center"><a href="/editProfile.php"><button class="btn btn-primary btn-block">Edit</button></a></h6>
 <div class="mt-4">
   <h5>Bio:</h5>
   <?php echo $_SESSION['pageData']['bio']; ?></p>   
 </div> </h6>
</div>
</div>
</div>
<div class="col-md-8">
<div class="card">
<div class="card-body">
 <h4 class="mb-4">Best Stats</h4>
 <div class="row">
   <div class="col-md-3">
     <div class="card mb-3">
       <div class="card-body text-center">
         <h5 class="card-title"># of rounds</h5>
         <p class="card-text"> <?php echo $_SESSION['pageData']['numRounds']; ?></p>
       </div>
     </div>
   </div>
   <div class="col-md-3">
     <div class="card mb-3">
       <div class="card-body text-center">
         <h5 class="card-title"># of birdies</h5>
         <p class="card-text"> <?php echo $_SESSION['pageData']['numBirdies']; ?></p>
       </div>
     </div>
   </div>
   <div class="col-md-3">
     <div class="card mb-3">
       <div class="card-body text-center">
         <h5 class="card-title">Total putts</h5>
         <p class="card-text"> <?php echo $_SESSION['pageData']['totalPutts']; ?></p>
       </div>
     </div>
   </div>
   <div class="col-md-3">
     <div class="card mb-3">
       <div class="card-body text-center">
         <h5 class="card-title">Lowest/highest Round Score</h5>
         <p class="card-text"> <?php echo $_SESSION['pageData']['lowestScore'].'/'.$_SESSION['pageData']['highestScore']; ?></p>
       </div>
     </div>
   </div>
 </div>
<br>
 
 <h1>LeaderBoard</h1>
 
 
 <br>


  <div class="container">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Rank</th>
                  <th>Date Played</th>
                  <th>Total Score</th>
                  <th>Course</th>
                  <th>Total Putts</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $rank = 1;
              foreach ($_SESSION['pageData']['topFiveRounds'] as $round) {
                  echo "<tr>";
                  echo "<td>$rank</td>";
                  echo "<td>{$round['datePlayed']}</td>";
                  echo "<td>{$round['totalScore']}</td>";
                  echo "<td>{$round['courseName']}</td>";
                  echo "<td>{$round['totalPutts']}</td>";
                  echo "</tr>";
                  $rank++;
              }
              ?>
          </tbody>
      </table>
  </div>

  
 <br>

 
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>


<!-- Content section--
<!-- Footer-->
<footer class="py-5 bg-dark">
<div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
