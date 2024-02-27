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
    var type = "<?php echo $type ?>";
    alert("審核通過 活動名稱：" + name)
</script>
        <?php
        if ($type == "indoor") {
            $sql2 = "UPDATE indoor_activity SET ISVARIFIED = 1 WHERE IDR_ACTID = $actID";
            $result = mysqli_query($link, $sql2);
            if ($result) {
                header("Location: indoor.php");
            } else {
                echo "error";
            }
        }else {
            $sql2 = "UPDATE outdoor_activity SET ISVARIFIED = 1 WHERE ODR_ACTID = $actID";
            $result = mysqli_query($link, $sql2);
            if ($result) {
                header("Location: outdoor.php");
            } else {
                echo "error";
            }
        }
     ?>

