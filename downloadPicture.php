<?php

$monsterID = $_GET['monsterID'];
$link = mysqli_connect('localhost', 'root', '12345678', 'sa');
$sql = "SELECT name FROM monster WHERE monsterID = '$monsterID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$monsterName = $row['name'];
$imageUrl = "monster/".$monsterID.".jpg";
$fileName = $monsterName.".jpg"; // 下載後的檔案名稱

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($imageUrl));

readfile($imageUrl);
exit;
?>