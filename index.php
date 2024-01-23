<?php require($_SERVER['DOCUMENT_ROOT'].'/functions.php');?>
<html>
  <head>
    <title>iewojHImgforjewij</title>
  </head
  <body>
    <?php echo '<p>HI World testing</p>'; 
    
    
    $stmt = $pdo->prepare("SELECT * FROM GA_users WHERE username = :username");
    $stmt->execute([':username' => "GolfMan1"]);
    $user = $stmt->fetch();
    

    echo '<pre>';
    var_dump($user);
    echo '</pre>';
    ?> 

  
    
  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>