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
        if ($type == "indoor"){
        $sql2 = "DELETE FROM indoor_activity WHERE IDR_ACTID = $actID";
        $result = mysqli_query($link, $sql2);
        if($result){
        ?><script>
            alert("已刪除活動：<?php echo $name;?>");
            location.href("indoor.php");</script><?php
        }else{
            echo "error";
        }
        }else{
        $sql2 = "DELETE FROM outdoor_activity WHERE ODR_ACTID = $actID";
        $result = mysqli_query($link, $sql2);
        if($result){
        ?><script>
            alert("已刪除活動: <?php echo $name;?>");
            location.href("outdoor.php");
        </script><?php
        }else{
            echo "error";
        }

        }
