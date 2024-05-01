<?php require($_SERVER['DOCUMENT_ROOT'] . '/functions.php'); 
verifyLogin();

$uid = $_SESSION['user']['uid'];

try {
    // Establish a database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query to fetch all data from GA_holesPlayed for the specific user
    $stmt = $pdo->prepare("
        SELECT * FROM GA_rounds 
        INNER JOIN GA_courses ON GA_rounds.courseID = GA_courses.courseID
        WHERE GA_rounds.userID = :uid"
    );
    $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch all rows as an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Store the data in session variable
    $_SESSION['pageData'] = $data;
} catch (PDOException $e) {
    // Handle database connection errors
}




header('Location: /viewAllRounds.php');
?>