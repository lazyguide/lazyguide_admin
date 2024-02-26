<?php
$articleID = $_GET['articleIDCurrent'];

$link = mysqli_connect('localhost', 'root', '12345678', 'sa');
$sql = "DELETE FROM article WHERE articleID = '$articleID'";

$result = mysqli_query($link, $sql);

if($result){
?>
<script language="javascript">
    alert("已刪除文章");
    location.href="talk.php";
</script>
<?php
}else{
    echo "error";
}
?>