<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query the database for the user's credentials
        $stmt = $pdo->prepare("SELECT * FROM GA_users WHERE username = :username AND password = :password");
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            // Username and password match, allow access
            // Redirect to the user's dashboard or homepage

          
          
            header('Location: /test.php');
            exit();
        } else {
            // Username and password do not match
            // Handle unsuccessful login, either show an error message or redirect back to the login page
            
          
            header('Location: /index.php');
            exit();
        }
    }
?>









?>