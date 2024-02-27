<?php

session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
$infoID = $_GET['infoID'];
$title = $_GET['title'];
$content = $_GET['content'];
$type = $_GET['type'];

$sql = "update info set
INFOTITLE = '$title',
INFOCONTENT ='$content'
where INFOID = '$infoID'";

$result = mysqli_query($link, $sql);

if($result){?>
    <script language="javascript">
    alert('修改成功');
    <?php if($type == "school"){?>
         location.href="schoolInfo.php";
         <?php
            }else{
         ?>
         location.href="systemInfo.php";
         <?php }?>
</script><?php
}else{?>
    <script language="javascript">
    alert('修改失敗');
    history.back();
</script><?php

}
?>
