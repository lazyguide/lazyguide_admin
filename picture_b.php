<?php
session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');

if ($_SESSION['level'] == 'user') {
    $userID = $_SESSION['userID'];
    $sql = "select * from monster,purchase where monster.monsterID=purchase.monsterID and userID='$userID'";
} else {
    $sql = "select * from monster";
}
$result = mysqli_query($link, $sql);
?>