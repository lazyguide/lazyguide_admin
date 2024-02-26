
<?php

session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
    $infoID=$_GET['infoID'];
    $sql= "delete from information where infoID=$infoID";
    $result = mysqli_query($link, $sql);

if($result){?>
        <script language="javascript">
        alert('刪除成功');
        location.href="info.php";
    </script><?php
    }else{?>
        <script language="javascript">
        alert('刪除失敗');
        history.back();
    </script><?php

    }
    ?>
