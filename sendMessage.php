<?php
session_start();
$message = $_GET['content'];
$type = $_GET['type'];
$actID = $_GET['actID'];

$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
if($type == "indoor"){
    $sql = "UPDATE indoor_activity SET MESSAGE = '$message' WHERE IDR_ACTID = $actID";
}else{
    $sql = "UPDATE outdoor_activity SET MESSAGE = '$message' WHERE ODR_ACTID = $actID";
}
$result = mysqli_query($link, $sql);

if($result){?>
    <script language="javascript">
        alert('發送訊息成功');
        history.back();
    </script>
    <?php
}else{?>
    <script language="javascript">
        alert('發送失敗');
        history.back();
    </script><?php
}
?>
