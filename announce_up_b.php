<?php

session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$NewsID = $_GET['NewsID'];
$title = $_GET['title'];
$content = $_GET['content'];

$sql = "update shopnews set
title = '$title',
content ='$content'
where NewsID = '$NewsID'";

$result = mysqli_query($link, $sql);

if($result){?>
    <script language="javascript">
    alert('修改成功');
    location.href="shopNews.php";
</script><?php
}else{?>
    <script language="javascript">
    alert('修改失敗');
    history.back();
</script><?php

}
?>
