<?php
session_start();
$title = $_GET['title'];
$content = $_GET['content'];
$link = mysqli_connect('localhost', 'root', '12345678', 'sa');
$sql = "INSERT INTO information (title, content) VALUES ('$title', '$content')";
$result = mysqli_query($link, $sql);
if($result){
?>
<script language="javaScript">
    alert("發布成功!");
    location.href="info.php";
</script>
<?php
}else{
    echo "error";
}
?>