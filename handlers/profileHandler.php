<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
verifyLogin();
resetPagedata();

// Function to execute a PDO query and fetch data
function fetchData($pdo, $query, $params = []) {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch user profile data
$userData = fetchData($pdo, "
    SELECT 
        p.*, u.*
    FROM 
        GA_profiles AS p
    JOIN 
        GA_users AS u ON p.userUID = u.uid
    WHERE 
        p.userUID = :userUID
", ['userUID' => $_SESSION['user']['uid']]);

// Fetch user statistics
$stats = fetchData($pdo, "
    SELECT 
        COUNT(r.roundID) AS numRounds,
        MAX(r.totalScore) AS highestScore,
        MIN(r.totalScore) AS lowestScore,
        SUM(hp.putts) AS totalPutts,
        COUNT(CASE WHEN hp.putts > 0 AND hp.putts < h.par THEN 1 END) AS numBirdies
    FROM 
        GA_rounds AS r
    LEFT JOIN 
        GA_holesPlayed AS hp ON r.roundID = hp.roundID
    LEFT JOIN 
        GA_holes AS h ON hp.courseID = h.courseID AND hp.holeNumber = h.holeNumber
    WHERE 
        r.userID = :userID
        AND r.totalScore >= r.numberOfHoles
", ['userID' => $_SESSION['user']['uid']]);

// Fetch top five rounds
$topFiveRounds = fetchData($pdo, "
    SELECT 
        r.roundID,
        r.datePlayed,
        r.totalScore,
        r.courseID,
        c.courseName,
        SUM(hp.putts) AS totalPutts
    FROM 
        GA_rounds AS r
    JOIN 
        GA_courses AS c ON r.courseID = c.courseID
    LEFT JOIN 
        GA_holesPlayed AS hp ON r.roundID = hp.roundID
    WHERE 
        r.userID = :userID
        AND r.totalScore >= r.numberOfHoles
        AND NOT EXISTS (
            SELECT 1
            FROM GA_holesPlayed AS hp2
            WHERE hp2.roundID = r.roundID
            AND hp2.putts <= 1
        )
    GROUP BY 
        r.roundID
    ORDER BY 
        r.totalScore ASC
    LIMIT 
        5
", ['userID' => $_SESSION['user']['uid']]);

// // Fetch related friend or user IDs
// $relatedIDs = fetchData($pdo, "
    // SELECT
    //     CASE
    //         WHEN uid = :userUID THEN friendsUserID
    //         ELSE uid
    //     END AS relatedID
    // FROM
    //     GA_friends
    // WHERE
    //     uid = :userUID OR friendsUserID = :userUID
// ", ['userUID' => $_SESSION['user']['uid']]);

// // Extract related IDs from the result set
// $relatedIDs = array_column($relatedIDs, 'relatedID');

// Now $relatedIDs contains the IDs of friends or users related to the current user


// Assign data to $_SESSION['pageData']
$_SESSION['pageData'] = [
    'accountStatus' => $userData[0]['accountStatus'],
    'email' => $userData[0]['email'],
    'phone' => $userData[0]['phone'],
    'username' => $userData[0]['username'],
    'password' => $userData[0]['password'],
    'fName' => $userData[0]['fName'],
    'lName' => $userData[0]['lName'],
    'pfp' => $userData[0]['profilePic'],
    'location' => $userData[0]['location'],
    'bio' => $userData[0]['bio'],
    'numRounds' => $stats[0]['numRounds'] ?? 0,
    'highestScore' => $stats[0]['highestScore'] ?? 'N/A',
    'lowestScore' => $stats[0]['lowestScore'] ?? 'N/A',
    'totalPutts' => $stats[0]['totalPutts'] ?? 'N/A',
    'numBirdies' => $stats[0]['numBirdies'] ?? 0,
    'topFiveRounds' => $topFiveRounds
];

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// Redirect to profile page
header('Location: /profile.php');
exit();
?>
