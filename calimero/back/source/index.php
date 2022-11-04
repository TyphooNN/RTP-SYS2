<?php

$host = getenv("DB_HOST");
$db   = 'database';
$user = 'root';
$pass = 'my-secret-pw';
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $dbh = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    print "ERROR: " . $e->getMessage() . "\n";
    die();
}

$sth = $dbh->prepare("SELECT * FROM Users");
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
$result = $sth->fetchAll();


foreach($result as $row) {
    $id = $row["id"];
    $username = $row["username"];
    $email = $row["email"];
    $password = $row["password"];
    echo("<ul><li>id : $id</li><li>username : $username</li><li>email : $email</li><li>password : $password</li></ul>");
}

?>