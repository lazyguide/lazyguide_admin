<?php
session_start();
$_SESSION['userID'] = "";
$_SESSION['name'] = "";
$_SESSION['level'] = "";
?>
<script language="javascript">
    alert('登出成功');
    location.href="home.php";
</script>