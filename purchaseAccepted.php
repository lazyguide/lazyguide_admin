<?php
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$userID = $_GET['userID'];
$monsterID = $_GET['monsterID'];
echo $userID, $monsterID;
$sql = "SELECT point FROM account WHERE userID = '$userID'";
$result = mysqli_query($link, $sql);
$userPoint = mysqli_fetch_array($result)[0];

$sql2 = "SELECT price FROM monster WHERE monsterID = '$monsterID'";
$result2 = mysqli_query($link, $sql2);
$monsterPrice = mysqli_fetch_array($result2)[0];
echo "userpoint=".$userPoint."monsterprice=".$monsterPrice;
if($userPoint < $monsterPrice){
?>
<script language="javascript">
    alert("點數不足!!");
    location.href="shop.php"
</script>
<?php
}else{
    $newPoint = $userPoint - $monsterPrice;
    $sql = "UPDATE account set point = '$newPoint' WHERE userID = '$userID'";
    $result = mysqli_query($link, $sql);
    if(!($result)){
        ?>
    <script language="javascript">
        alert("set point error!!");
        location.href="shop.php";
    </script>
    <?php
    }
    $sql3 = "INSERT INTO purchase (monsterID, userID) VALUES ('$monsterID', '$userID')";
    $result3 = mysqli_query($link, $sql3);

    if($result3){
    ?>
    <script language = "javascript">
        alert("購買成功");
        location.href="picture.php";
    </script>
    <?php
    }else{?>
    <script language="javascript">
        alert("購買失敗");
        location.href="shop.php";
    </script>
    <?php
    }
}
?>