<?php
  //Server: sql3.freemysqlhosting.net
  //Name: sql3680033
  //Username: sql3680033
  //Password: uuImpGvtiz
  //Port number: xxxxxxxxxx

$host = 'srv1246.hstgr.io';
$db   = 'u411832981_golf';
$user = 'u411832981_student';
$pass = 'golfStudent2024!';
$charset = 'utf8mb4'; // This is a good charset to use for MySQL

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>
