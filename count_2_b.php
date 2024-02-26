<?php
session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$currentUserID = $_SESSION['userID'];
$tablewarePointAddition = 0;

$sql = 'SELECT * FROM item WHERE itemType = "goodTableware"';
$result = mysqli_query($link, $sql);
$count = 0;
while($row = mysqli_fetch_assoc($result)){
    $ID[$count] = $row['itemID'];
    $name[$count] = $row['itemName'];
    $value[$count] = $row['itemCarbon'];
    $count++;
}
//Find the record address
$sql = "SELECT MAX(recordID) AS nowID FROM record WHERE userID = '$currentUserID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$nowID = $row['nowID'];


//Calculate the Carbon emission
    $input = [];
    for($j = 0; $j < count($name); $j++){
        $input[$j] = $_GET[$name[$j]];
    }
    $tablewareReduction = 0;
    for($i = 0; $i < count($input); $i++){
        if($input[$i] != 0){
            $tablewarePointAddition++;
        }
        $carbonDetail = $input[$i] * $value[$i];
        $tablewareReduction += $carbonDetail;
        $sql = "INSERT INTO recorddetail (recordID, itemID, count, carbonDetail) VALUES ('$nowID', '$ID[$i]', '$input[$i]', '$carbonDetail')";
        $result = mysqli_query($link, $sql);
        if(!($result)){
            echo "recordDetail error!";
        }
    }
$sql2 = "UPDATE record SET getPoint = getPoint + $tablewarePointAddition, tablewareReduction = '$tablewareReduction' WHERE recordID = '$nowID'";
$result2 = mysqli_query($link, $sql2);

//locate to count_3.php

    header("Location: count3.php");
?>