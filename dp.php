<?php
  //Server: sql3.freemysqlhosting.net
  //Name: sql3646748
  //Username: sql3646748
  //Password: z4IyGxX9kz
  //Port number: xxxxxxxxxx

$host = 'sql3.freemysqlhosting.net';
$db   = 'sql3680033';
$user = 'sql3680033';
$pass = 'uuImpGvtiz';
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
