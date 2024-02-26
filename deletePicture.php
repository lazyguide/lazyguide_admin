<?php
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$isUP = $_GET['isUP'];
$monsterID = $_GET['monsterID'];

$sql = "UPDATE monster set isUP = $isUP WHERE monsterID = '$monsterID'";

$result = mysqli_query($link, $sql);
if($result){
?>
<script language="javascript">
    alert("完成");
    location.href="picture.php";
</script>
<?php
}else{
    echo "error!";
}
?>