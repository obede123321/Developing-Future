<?php
session_start();

$connection = null;

// função para fazer a conexão com o banco de dados
function connectDataBase() {
    global $connection;
    $servername = "server";
    $username ="username";
    $password ="password";
    $dbname = "db_name";

    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
</head>
<body>