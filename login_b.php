<?php
include('config.php');
session_start();
$userID = $_GET['userID'];
$password =$_GET['password'];

$sql ="SELECT * FROM account WHERE userID = '$userID' AND PASSWORD = '$password'";

$result = mysqli_query($link, $sql);
if($row = mysqli_fetch_assoc($result))
{
    if($row['level'] == "admin"){
        ?>
<script language="javascript">
    alert('此為管理員系統，使用者不得登入');
    history.back();
</script>

<?php
    }else{
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['level'] = $row['level'];
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
