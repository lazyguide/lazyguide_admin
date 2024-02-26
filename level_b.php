<?php

session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
$level = $_GET['level'];
$userID = $_GET['userID'];


$sql = "UPDATE account SET LEVEL ='$level' WHERE USERID = '$userID'";
$result = mysqli_query($link, $sql);

if($result){
    if($_SESSION['userID'] == $userID){
?>
    <script language="javascript">
        alert('將<?php echo $userID?>修改為<?php echo $level?>');
        alert('權限已更改，請重新登入。');
        location.href="logout.php";
    </script>
<?php
    }else{?>

    <script language="javascript">
        alert('將<?php echo $userID?>修改為<?php echo $level?>');
        history.back();
    </script>
    <?php
    }
}else{
    echo "error";
}
?>
