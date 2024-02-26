<?php

session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$infoID = $_GET['infoID'];
$title = $_GET['title'];
$content = $_GET['content'];

$sql = "update information set
title = '$title',
content ='$content'
where infoID = '$infoID'";

$result = mysqli_query($link, $sql);

if($result){?>
    <script language="javascript">
    alert('修改成功');
    location.href="info.php";
</script><?php
}else{?>
    <script language="javascript">
    alert('修改失敗');
    history.back();
</script><?php

}
?>
