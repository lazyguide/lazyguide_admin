<?php
session_start();
$message = $_GET['content'];
$type = $_GET['type'];
$actID = $_GET['actID'];

$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');

?>
