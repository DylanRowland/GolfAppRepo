<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');

// Get the logged-in user's ID from the session
$sender_id = isset($_SESSION['user']['uid']) ? $_SESSION['user']['uid'] : null;

// Check if the sender_id is set
if ($sender_id === null) {
    displayNotification("Sender ID is not available", "error");
    exit;
}

// Check if the user_id parameter is set in the URL
if (isset($_GET['user_id'])) {
    $recipient_id = $_GET['user_id'];

    try {
        // Prepare a SQL statement to insert the friend request into the database
        $stmt = $pdo->prepare("INSERT INTO GA_friendRequests (sender_id, recipient_id, status) VALUES (?, ?, 'pending')");
        $stmt->execute([$sender_id, $recipient_id]);

        // Send a success response
        displayNotification("Friend request sent successfully", "success");
    } catch (PDOException $e) {
        // Send an error response if an exception occurred
        displayNotification("Error inserting friend request: " . $e->getMessage(), "error");
    }
} else {
    // If user_id is not set, return an error response
    displayNotification("Recipient ID is missing", "error");
}

function displayNotification($message, $type)
{
    $alertType = ($type === "success") ? "alert-success" : "alert-danger";
    echo '<div class="alert ' . $alertType . '">
            <strong>' . ucfirst($type) . '!</strong> ' . $message . '
          </div>';
    echo '<script>
            setTimeout(function(){
                window.location.href = "viewAllUsers.php";
            }, 3000); // 1.5 seconds
          </script>';
}
?>
