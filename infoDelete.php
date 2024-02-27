
<?php

session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
    $infoID=$_GET['infoID'];
    $type = $_GET['type'];
    $sql= "delete from info where infoID=$infoID";
    $result = mysqli_query($link, $sql);

if($result){?>
        <script language="javascript">
        alert('刪除成功');
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
        alert('刪除失敗');
        history.back();
    </script><?php

    }
    ?>
