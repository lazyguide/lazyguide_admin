<?php
$articleID = $_GET['articleID'];
$newTitle = $_GET['newTitle'];
$newContent = $_GET['newContent'];

$link = mysqli_connect('localhost', 'root', '12345678', 'sa');
$sql = "UPDATE article SET title = '$newTitle', content = '$newContent' WHERE articleID = '$articleID'";

$result = mysqli_query($link, $sql);

if($result){
?>
<script language="javascript">
    alert("修改成功");
    location.href="talkDetail.php?articleID=<?php echo $articleID?>";
</script>
<?php
}else{
    echo "error";
}
?>