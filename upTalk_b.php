<?php
session_start();
$userID = $_SESSION['userID'];
$content = $_GET['content'];
$title = $_GET['title'];

$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$sql = "INSERT INTO article(title, content, userID) VALUES ('$title', '$content', '$userID')";
$result = mysqli_query($link, $sql);
if($result){
?>
<script language="javascript">
    alert("新增文章成功");
    location.href="talk.php";
</script>
<?php
}else{
    echo("error!!");
}
?>