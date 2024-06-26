<?php
function navTEST() {

    echo  '<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

 <li class="nav-item" style="display: flex; align-items: center;">
        <a class="nav-link active" aria-current="page" href="/landingPage.php" style="font-size: inherit; transform: scale(1.5) translateX(20px);"><img src="https://uxwing.com/wp-content/themes/uxwing/download/web-app-development/home-page-white-icon.png" alt="Icon" width="20" height="20"></a>
    </li>




            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="handlers/profileHandler.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/statshandler.php">Stats</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/handlers/coursesHandler.php">Add Rounds</a></li>
                           <li class="nav-item"><a class="nav-link active" aria-current="page" href="/handlers/leaderBoardHandler.php">Leaderboard</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Socials</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/friendslisttest.php">Friends</a></li>
                                <li><a class="dropdown-item" href="/handlers/viewAllUsersHandler.php">View all Users</a></li>
                                <li><a class="dropdown-item" href="/AccepFreindR.php">Friend requests</a></li>
                          


                                
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/handlers/CoursesHandler2.php">Courses</a></li>
                                <li><a class="dropdown-item" href="/handlers/allRoundsHandler.php">View All Rounds</a></li>
                                <li><a class="dropdown-item" href="/logout.php">Logout</a></li>


                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>';
}


function messageLogic() {
  if (isset($_SESSION['message']['fail'])) {
      $failMessage = $_SESSION['message']['fail'];
      // Clear the fail message from the session to prevent it from showing again
      unset($_SESSION['message']['fail']);

      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
      echo '<strong>Error:</strong> ' . $failMessage;
      echo '</div>';
    }
      if (isset($_SESSION['message']['success'])) {
      $successMessage = $_SESSION['message']['success'];
      // Clear the fail message from the session to prevent it from showing again
      unset($_SESSION['message']['success']);

      echo '<div class="alert alert-primary " role="alert">';
      echo '<strong>Success:</strong> ' . $successMessage;
      echo '</div>';
    }
}

?>
