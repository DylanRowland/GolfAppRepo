<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
  require($_SERVER['DOCUMENT_ROOT'] . '/template/TemplateFunctions.php');
  verifyLogin();
  ?> 
<ol>
<form action="/handlers/editProfileHandler.php" method="post"> 
  <li>First Name:<input name="fname" type="text" value="<?php echo $_SESSION['pageData']['fname']; ?>"></li>

  <li>Last Name:<input name="lname" type="text" value="<?php echo $_SESSION['pageData']['Lname']; ?>"></li>

  <li>Username:<input name="username" type="text" value="<?php echo $_SESSION['pageData']['username']; ?>"></li>

  <li>Email:<input name="email" type="text" value="<?php echo $_SESSION['pageData']['email']; ?>"></li>

  <li>Phone Number:<input name="phone" type="text" value="<?php echo $_SESSION['pageData']['phone']; ?>"></li>

  <li>Bio:<input name="bio" type="text" value="<?php echo $_SESSION['pageData']['bio']; ?>"></li>

  <li>location:<input name="location" type="text" value="<?php echo $_SESSION['pageData']['location']; ?>"></li>

  <li>password:<input name="password" type="text" value="<?php echo $_SESSION['pageData']['password']; ?>"></li>

  <li>pfp:<input name="pfp" type="text" value="<?php echo $_SESSION['pageData']['location']; ?>"></li>






  </ol>
  <button name="submit" value="submit" type="submit">UpDate</button>
</form>