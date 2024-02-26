<?php
include('config.php');
session_start();
$userID = $_GET['userID'];
$password =$_GET['password'];

$sql ="select * from account where userID = '$userID' and password = '$password'";

$result=mysqli_query($link,$sql);
if($row = mysqli_fetch_assoc($result))
{
    $_SESSION['userID'] = $row['userID'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['level'] = $row['level'];
    header("location: home.php");
}
else{
    ?>

<script language="javascript">
    alert('帳密錯誤');
    history.back();
</script>

<?php
}
?>
