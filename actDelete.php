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
<script language="javascript">
    if(confirm("確定刪除此活動？ 活動名稱：<?php echo $name?>")){
        <?php
        if ($type == "indoor"){
        $sql2 = "DELETE FROM indoor_activity WHERE IDR_ACTID = $actID";
        $result = mysqli_query($link, $sql2);
        if($result){
        ?>
        location.href("indoor.php");<?php
        }else{
            echo "error";
        }

        }else{
        $sql2 = "DELETE FROM outdoor_activity WHERE ODR_ACTID = $actID";
        $result = mysqli_query($link, $sql2);
        if($result){
        ?>
        location.href("outdoor.php");<?php
        }else{
            echo "error";
        }

        }?>

    }else{
        history.back();
    }
</script>