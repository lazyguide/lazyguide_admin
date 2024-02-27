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
        if ($type == "indoor") {
            $sql2 = "UPDATE indoor_activity SET ISVARIFIED = 1 WHERE IDR_ACTID = $actID";
            $result = mysqli_query($link, $sql2);
            if ($result) {
                ?>
<script language="javascript">
    alert("審核通過 活動名稱：<?php echo $row['IDR_ACTNAME'];?>");
    location.href="indoor.php";
</script><?php
            } else {
                echo "error";
            }
        }else {
            $sql2 = "UPDATE outdoor_activity SET ISVARIFIED = 1 WHERE ODR_ACTID = $actID";
            $result = mysqli_query($link, $sql2);
            if ($result) {
                ?>
                <script language="javascript">
                    alert("審核通過 活動名稱：<?php echo $row['ODR_ACTNAME'];?>");
                    location.href="outdoor.php";
                </script><?php
            } else {
                echo "error";
            }
        }
     ?>

