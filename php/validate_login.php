<?php
require_once 'header.php';
connectDataBase();

$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = md5(mysqli_real_escape_string($connection, $_POST['password']));

$query = "SELECT `USERNAME`, `PASSWORD` FROM `TABLE_NAME` WHERE `USERNAME` = '$username' AND `PASSWORD` = '$password'";
$result = mysqli_query($connection, $query);
if($result) {
    $rows = mysqli_num_rows($result);
    $arr = mysqli_fetch_assoc($result);

    if($rows != 0) {
        if(!isset($_SESSION['user'])) {
            $_SESSION['user'] = $arr['USERNAME'];
            header("location: home.php");
        }
    } else {
        // Login incorreto
    }
}
require_once 'footer.php';
?>