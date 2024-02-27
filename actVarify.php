<?php
$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
$actID = $_GET['actID'];
$type = $_GET['type'];
$name = "";
if($type == "indoor"){
    $sql = "SELECT * FROM indoor_activity WHERE IDR_ACTID = $actID";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row["IDR_ACTNAME"];
}else{
    $sql = "SELECT * FROM outdoor_activity WHERE ODR_ACTID = $actID";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row["ODR_ACTNAME"];
}
?>
<script>
    var name = "<?php echo $name ?>"; // 将 PHP 变量 $name 赋值给 JavaScript 变量
    var actID = <?php echo $actID ?>; // 将 PHP 变量 $actID 赋值给 JavaScript 变量
    var type = "<?php echo $type ?>"; // 将 PHP 变量 $type 赋值给 JavaScript 变量

    // 显示确认提示框
    if(confirm("確定審核此活動？ 活動名稱：" + name)){
        <?php
        if ($type == "indoor"){
        $sql2 = "UPDATE indoor_activity SET ISVARIFIED = 1 WHERE IDR_ACTID = $actID";
        $result = mysqli_query($link, $sql2);
        if($result){
        ?>
        // 跳转到 indoor.php
        location.href = "indoor.php";
        <?php
        }else{
        echo "error";
    }
        }else{
        $sql2 = "UPDATE outdoor_activity SET ISVARIFIED = 1 WHERE ODR_ACTID = $actID";
        $result = mysqli_query($link, $sql2);
        if($result){
        ?>
        // 跳转到 outdoor.php
        location.href = "outdoor.php";
        <?php
        }else{
        echo "error";
    }
        }
        ?>
    }else{
        history.back();
    }
</script>

