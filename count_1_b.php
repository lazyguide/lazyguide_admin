<?php
$value = [];

$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
session_start();
//create the record
$currentUserID = $_SESSION['userID'];
$tablewarePointDeduction = 0;
$sql = 'SELECT * FROM item WHERE itemType = "badTableware"';
$result = mysqli_query($link, $sql);
$count = 0;
while($row = mysqli_fetch_assoc($result)){
    $ID[$count] = $row['itemID'];
    $name[$count] = $row['itemName'];
    $value[$count] = $row['itemCarbon'];
    $count++;
}
$sql = "INSERT INTO record (userID) VALUES ('$currentUserID')";
$result = mysqli_query($link, $sql);
if(!($result)){
    echo "insert error!";
}

$sql = "SELECT MAX(recordID) AS nowID FROM record WHERE userID = '$currentUserID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$nowID = $row['nowID'];
//calculate the carbon
    $input = [];
    for($j = 0; $j < count($name); $j++){
        $input[$j] = $_GET[$name[$j]];
    }
    $tablewareCarbon = 0;
    for($i = 0; $i < count($input); $i++){
        if($input[$i] != 0){
            $tablewarePointDeduction++;
        }
        $carbonDetail = $input[$i] * $value[$i];
        $tablewareCarbon += $carbonDetail;
        $sql = "INSERT INTO recorddetail (recordID, itemID, count, carbonDetail) VALUES ('$nowID', '$ID[$i]', '$input[$i]', '$carbonDetail')";
        $result = mysqli_query($link, $sql);
        if(!($result)){
            echo "recordDetail error!";
        }



    }
$sql3 = "UPDATE record set getPoint = getPoint - $tablewarePointDeduction, tablewareCarbon = '$tablewareCarbon' WHERE recordID = '$nowID'";
$result3 = mysqli_query($link, $sql3);

//locate to count_2.php

    header("Location: count2.php");
?>