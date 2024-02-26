<?php
$userID = $_GET['userID'];

$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
$sql = "DELETE FROM account WHERE USERID = '$userID'";

$result = mysqli_query($link, $sql);

if($result){
?>
<script language = "javascript">
    alert("刪除成功");
    history.back();
</script>
<?php
}else{
    echo "error";
}
?>
