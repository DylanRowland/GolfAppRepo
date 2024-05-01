<?php
function navTEST() {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/landingPage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/handlers/profileHandler.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="handlers/CoursesHandler2.php">Courses</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/handlers/viewAllUsersHandler.php">View All Users</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/logout.php">Logout</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/handlers/statshandler.php">Stats</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/friends/friendsList.php">Friends</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#">Link</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
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