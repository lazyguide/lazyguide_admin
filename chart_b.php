<?php
session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$currentUserID = $_SESSION['userID'];
date_default_timezone_set("Asia/Taipei");
$currentDate = date("Y-m-d");
$sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentDate%'";
$result = mysqli_query($link, $sql);
$tableware = 0;
$traffic = 0;
while($row = mysqli_fetch_assoc($result)){
    $tableware += $row['tablewareCarbon'];
    $traffic += $row['trafficCarbon'];
}
$tablewareFormat = round($tableware, 3);
$trafficFormat = round($traffic, 3);
$limit = 5.000;
if($tablewareFormat + $trafficFormat <= 5){
    $differenceFormat = round($limit - $tablewareFormat - $trafficFormat, 3);
    $data = array($tablewareFormat, $trafficFormat, $differenceFormat);
}else{
    $data = array($tablewareFormat, $trafficFormat);
}
echo json_encode(array('data' => $data));
?>