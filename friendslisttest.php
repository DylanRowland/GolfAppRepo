<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');

function fetchData($pdo, $query, $params = []) {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

verifyLogin();
resetPagedata();

// Initialize $pageData if it doesn't exist
if (!isset($_SESSION['pageData'])) {
    $_SESSION['pageData'] = [];
}

// Fetch user profile data
$userData = fetchData($pdo, "SELECT fname, lname, location, bio FROM GA_profiles WHERE userUID = ?", [$_SESSION['user']['uid']]);
$_SESSION['pageData'] = array_merge($_SESSION['pageData'], $userData[0]);

// Fetch user information (including username) from GA_users table
$userInfo = fetchData($pdo, "SELECT username FROM GA_users WHERE uid = ?", [$_SESSION['user']['uid']]);
$_SESSION['pageData'] = array_merge($_SESSION['pageData'], $userInfo[0]);

// Fetch friend IDs
$friendIDs = fetchData($pdo, "SELECT friend_id FROM GA_accepted_friend_requests WHERE user_id = ?", [$_SESSION['user']['uid']]);

// Fetch friend details
$friends = [];
foreach ($friendIDs as $friendID) {
    $friendData = fetchData($pdo, "SELECT * FROM GA_users WHERE uid = ?", [$friendID['friend_id']]);
    if ($friendData) {
        $friends[] = $friendData[0];
    }
}

// Populate `pageData` with friend data
$_SESSION['pageData']['friends'] = $friends;

// Handle output
navTEST();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Friends List</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/template/css/styles.css" rel="stylesheet" />
    <style>
        /* Remove white gap at the top */
        body {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
        /* Adjust header margin if needed */
        header {
            margin-top: 0 !important;
        }
        .card {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Friends List</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo isset($_SESSION['pageData']['username']) ? $_SESSION['pageData']['username'] : ''; ?></h5>
                        <p class="card-text">
                            <strong>Name:</strong> <?php echo isset($_SESSION['pageData']['fname']) ? $_SESSION['pageData']['fname'] : ''; ?> <?php echo isset($_SESSION['pageData']['lname']) ? $_SESSION['pageData']['lname'] : ''; ?><br>
                            <strong>Location:</strong> <?php echo isset($_SESSION['pageData']['location']) ? $_SESSION['pageData']['location'] : ''; ?><br>
                            <strong>Bio:</strong> <?php echo isset($_SESSION['pageData']['bio']) ? $_SESSION['pageData']['bio'] : ''; ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="list-group">
                    <?php foreach ($_SESSION['pageData']['friends'] as $friend): ?>
                        <li class="list-group-item">
                            <?php echo $friend['username']; ?>
                            <!-- Add profile picture, links, etc. -->
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
