<?php
session_start();
$type = $_GET['type'];
$title = $_GET['title'];
$content = $_GET['content'];
$link = mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
$sql = "INSERT INTO info (INFOTITLE, INFOCONTENT, INFOTYPE) VALUES ('$title', '$content', '$type')";
$result = mysqli_query($link, $sql);
if($result){
?>
<script language="javaScript">
    alert("發布成功!");
    <?php
        if($type == "school"){
    ?>
           location.href="schoolInfo.php";
    <?php
    }else{
            ?>
            location.href="systemInfo.php";
            <?php
    }
        ?>
</script>
<?php
}else{
    echo "error";
}
?>