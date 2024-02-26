<?php
include('config.php');
session_start();
$userID = $_GET['userID'];
$password =$_GET['password'];

$sql ="SELECT * FROM account WHERE userID = '$userID' AND PASSWORD = '$password'";

$result = mysqli_query($link, $sql);
if($row = mysqli_fetch_assoc($result))
{
    if($row['LEVEL'] != "admin"){
        ?>
<script language="javascript">
    alert('此為管理員系統，使用者不得登入');
    history.back();
</script>

<?php
    }else{
        $_SESSION['userID'] = $row['USERID'];
        $_SESSION['name'] = $row['USERNAME'];
        $_SESSION['level'] = $row['LEVEL'];
        header("location: home.php");
    }
}else{
    ?>
<script language="javascript">
    alert('帳密錯誤');
    history.back();
</script>

<?php
}
?>
