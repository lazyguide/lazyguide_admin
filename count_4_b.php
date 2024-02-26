<?php
session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$currentUserID = $_SESSION['userID'];
$trafficPointAddition = 0;
$sql = 'SELECT * FROM item WHERE itemType = "goodTraffic"';
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

//Calculate Carbon emission

$input = [];
    for($j = 0; $j < count($name); $j++){
        $input[$j] = $_GET[$name[$j]];
    }
    $trafficReduction = 0;
    for($i = 0; $i < count($input); $i++){
        if($input[$i] != 0){
            $trafficPointAddition++;
        }
        $carbonDetail = $input[$i] * $value[$i];
        $trafficReduction += $carbonDetail;
        $sql = "INSERT INTO recorddetail (recordID, itemID, count, carbonDetail) VALUES ('$nowID', '$ID[$i]', '$input[$i]', '$carbonDetail')";
        $result = mysqli_query($link, $sql);
        if(!($result)){
            echo "recordDetail error!";
        }
    }


$sql2 = "UPDATE record set getPoint = getPoint + $trafficPointAddition, trafficReduction = '$trafficReduction' WHERE recordID = '$nowID'";
$result2 = mysqli_query($link, $sql2);

//settlement

$sql3 = "SELECT * FROM record WHERE recordID = '$nowID'";
$result3 = mysqli_query($link, $sql3);
$row2 = mysqli_fetch_assoc($result3);
$getPoint = $row2['getPoint'];

$sql4 = "UPDATE account SET point = point + $getPoint WHERE userID = '$currentUserID'";
$result4 = mysqli_query($link, $sql4);

$sql5 = "SELECT point FROM account WHERE userID = '$currentUserID'";
$result5 = mysqli_query($link, $sql5);
if($result5){
$row = mysqli_fetch_assoc($result5);
if($row['point'] < 0){
    $sql6 = "UPDATE account SET point = 0 WHERE userID = '$currentUserID'";
    $result6 = mysqli_query($link, $sql6);
    if($result6){
        ?>
        <script language="javascript">
            alert("恭喜您獲得 <?php echo $getPoint?> 點，一次性餐具所產生碳排為: <?php echo $row2['tablewareCarbon']?>，交通所產生碳排為: <?php echo $row2['trafficCarbon']?>。您目前有 0 點 請繼續加油~!");
            location.href="personal.php";
        </script>
        <?php
    }else{
        ?>
        <script language="javascript">
            alert("fail!!");
            location.href="personal.php";
        </script>
        <?php
    }
}else{
    ?>
    <script language="javascript">
        alert("恭喜您獲得 <?php echo $getPoint?> 點，一次性餐具所產生碳排為: <?php echo $row2['tablewareCarbon']?>，交通所產生碳排為: <?php echo $row2['trafficCarbon']?>。您目前有 <?php echo $row['point']?> 點 請繼續加油~!");
        location.href="personal.php";
    </script>
    <?php
}
}else{
    ?>
    <script language="javascript">
    alert("fail!!!");
    location.href="personal.php";
    </script>
    <?php
}
?>