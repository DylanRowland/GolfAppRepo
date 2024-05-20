<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
verifyLogin();

// Check if the user ID is provided in the URL
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    // Retrieve the user ID from the URL
    $userId = $_GET['user_id'];

    // Query the database to fetch user data based on the provided user ID
    $stmt = $pdo->prepare("SELECT p.*, u.email
                           FROM GA_profiles p
                           JOIN GA_users u ON p.userUID = u.uid
                           WHERE p.userUID = :userUID");
    $stmt->execute(['userUID' => $userId]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user data exists
    if ($userData) {
        // Display user data
        $username = $userData['username'] ?? '';
        $fName = $userData['fName'] ?? '';
        $lName = $userData['lName'] ?? '';
        $email = $userData['email'] ?? '';
        $fName = $userData['fName'] ?? '';
        $lName = $userData['lName'] ?? '';
        // Add more fields as needed
    } else {
        // User data not found
        echo "User data not found!";
        exit;
    }
} else {
    // User ID not provided in the URL
    echo "User ID not provided!";
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
     <title>Friend Profile</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
  <link href="/template/css/styles.css" rel="stylesheet" />
    <style>
        .profile-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .profile-info p {
            font-size: 16px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container text-center p-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="profile-card">
                    <div class="profile-info">
                        <h3><?php echo $username; ?></h3>
                        <p><strong>Name:</strong> <?php echo $fName . " " . $lName; ?></p>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>First Name:</strong> <?php echo $fName; ?></p>
                        <p><strong>Last Name:</strong> <?php echo $lName; ?></p>
                        <!-- Add more profile fields here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>