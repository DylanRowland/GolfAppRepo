<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
verifyLogin(); 
// resetPagedata(); 



// $_SESSION["pageData"]["courseID"] = $_POST["courseID"];
// $_SESSION["pageData"]["roundID"] = $_POST["roundID"];

$holeNumber = 1;






echo '<pre>';
var_dump($_POST);
echo '</pre>';

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
      
  

    // Prepare the SQL query
    $sql = 'INSERT INTO GA_rounds (
    HolePlayedID,
    userID, 
    courseID, 
    roundID,
    holeNumber,
    score,
    putts,
    fairway,
    green,
    penalties,
    note
    ) VALUES (
    :HolePlayedID,
    :userID, 
    :courseID, 
    :roundID,
    :holeNumber,
    :score,
    :putts,
    :fairway,
    :green,
    :penalties,
    :note
    )';

    // Bind the placeholders to the user values.
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':HolePlayedID', $_POST['']); // Use the new incremented roundID
    $stmt->bindParam(':userID', $_SESSION['user']['uid']);
    $stmt->bindParam(':courseID', $_SESSION['pageData']['courses']);
    $stmt->bindParam(':roundID', $_SESSION['pageData']['roundID']);
    $stmt->bindParam(':holeNumber', $_SESSION["pageData"][""]); 
    $stmt->bindParam(':score', $_SESSION["pageData"][""]); 
    $stmt->bindParam(':putts', $_SESSION["pageData"][""]);
    $stmt->bindParam(':fairway', $_SESSION["pageData"][""]);
    $stmt->bindParam(':green', $_SESSION["pageData"][""]);
    $stmt->bindParam(':penalties', $_SESSION["pageData"][""]); // can not be a value, must be a variable.
    $stmt->bindParam(':note', $_SESSION["pageData"][""]); // can not be a value, must be a variable.

    // Execute the query
    $stmt->execute(); // add user to DB
    


    

  





// courseID
// roundID
// holeNumber
// score
// putts
// fairway
// green
// penalties
// note



?>