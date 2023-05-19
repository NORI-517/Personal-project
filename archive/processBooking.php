<?php
$host = 'localhost'; // change if necessary
$db   = 'webapplication';
$user = 'sqluser'; // change to your MySQL username
$pass = 'password'; // change to your MySQL password
$charset = 'test';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];

// Prepare the SQL query
$sql = "INSERT INTO book (name, email, date) VALUES (?, ?, ?)";

// Execute the query
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $email, $date]);
?>
