<?php session_start();
require($_SERVER['DOCUMENT_ROOT'].'/dp.php');


function verifyLogin(){

  if(isset($_SESSION['user']['uid'])){
  } else{
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page
    header('Location: /login.php');
    exit();

  }
}


function resetPagedata(){
  if(isset($_SESSION['pageData'])){
    unset($_SESSION['pageData']);
  }
}

function updateInformation() {
    // Your code to update information goes here
    $_SESSION['last_updated'] = time(); // Example: Store the last update time in session
}


?>