<?php
session_start();
include('config.php');
$currentUserID = $_SESSION['userID'];
if($_GET['method'] == "name"){
    $name = $_GET['newName'];
    $sql = "UPDATE account set name='$name' WHERE userID = '$currentUserID'";
    $result = mysqli_query($link, $sql);
    if($result){
    $_SESSION['userID'] = "";
    $_SESSION['level'] = "";
    $_SESSION['name'] = "";
    ?>
    <script language="javascript">
        alert("修改成功，請重新登入!");
        location.href="login.php";
    </script>
    <?php}else{?>
    <script language="javascript">
    alert("修改失敗!!!");
    location.href="personal.php";</script><?php
    }
}elseif($_GET['method'] == "phone"){
    $phone = $_GET['newPhone'];
        $sql = "UPDATE account set phone='$phone' WHERE userID = '$currentUserID'";
        $result = mysqli_query($link, $sql);
        if($result){
        $_SESSION['userID'] = "";
        $_SESSION['level'] = "";
        $_SESSION['name'] = "";
        ?>
        <script language="javascript">
            alert("修改成功，請重新登入!");
            location.href="login.php";
        </script>
        <?php}else{?>
        <script language="javascript">
        alert("修改失敗!!!");
        location.href="personal.php";</script><?php
        }
    }else{
    $password = $_GET['newPassword'];
        $sql = "UPDATE account set password='$password' WHERE userID = '$currentUserID'";
        $result = mysqli_query($link, $sql);
        if($result){
        $_SESSION['userID'] = "";
        $_SESSION['level'] = "";
        $_SESSION['name'] = "";
        ?>
        <script language="javascript">
            alert("修改成功，請重新登入!");
            location.href="login.php";
        </script>
        <?php}else{?>
        <script language="javascript">
        alert("修改失敗!!!");
        location.href="personal.php";</script><?php
        }
    }
?>