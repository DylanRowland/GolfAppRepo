<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php'); 

// Check if the user is logged in
if (!isset($_SESSION['user']['uid'])) {
    // Redirect or handle unauthorized access
    exit;
}

// Fetch pending friend requests for the logged-in user
$logged_in_user_id = $_SESSION['user']['uid'];
$stmt = $pdo->prepare("SELECT sender_id FROM GA_friendRequests WHERE recipient_id = ? AND status = 'pending'");
$stmt->execute([$logged_in_user_id]);
$pending_requests = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && isset($_POST['request_sender_id'])) {
        $action = $_POST['action'];
        $request_sender_id = $_POST['request_sender_id'];
        $logged_in_user_id = $_SESSION['user']['uid'];




        // Handle the action (accept or decline)
        if ($action === "accept") {
            try {
                // Update the status in GA_friendRequests
                $stmt = $pdo->prepare("UPDATE GA_friendRequests SET status = 'accepted' WHERE sender_id = ? AND recipient_id = ?");
                $stmt->execute([$request_sender_id, $logged_in_user_id]);
                if ($stmt->rowCount() > 0) {
                    echo "Friend request accepted successfully.";
                } else {
                    echo "No friend request found or already accepted.";
                }
            } catch (PDOException $e) {
                // Handle database error
                echo "Error accepting friend request: " . $e->getMessage();
            }
        } elseif ($action === "decline") {
            try {
                // Update the status in GA_friendRequests
                $stmt = $pdo->prepare("UPDATE GA_friendRequests SET status = 'declined' WHERE sender_id = ? AND recipient_id = ?");
                $stmt->execute([$request_sender_id, $logged_in_user_id]);
                if ($stmt->rowCount() > 0) {
                    echo "Friend request declined successfully.";
                } else {
                    echo "No friend request found or already declined.";
                }
            } catch (PDOException $e) {
                // Handle database error
                echo "Error declining friend request: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Requests</title>
</head>
<body>
    <h1>Friend Requests</h1>
    <?php if (count($pending_requests) > 0): ?>
        <ul>
            <?php foreach ($pending_requests as $sender_id): ?>
                <li>
                    User <?php echo $sender_id; ?> wants to be your friend.
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="request_sender_id" value="<?php echo $sender_id; ?>">
                        <button type="submit" name="action" value="accept">Accept</button>
                        <button type="submit" name="action" value="decline">Decline</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No pending friend requests.</p>
    <?php endif; ?>
</body>
</html>
