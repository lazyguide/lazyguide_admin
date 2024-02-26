<?php
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');

$monsterID = $_GET['monsterID'];
$name = $_GET['name'];
$introduction = $_GET['introduction'];
$price = $_GET['price'];

$sql = "UPDATE monster set name='$name', introduction='$introduction', price='$price' WHERE monsterID='$monsterID'";
$result = mysqli_query($link, $sql);

if($result){
?>
<script language="javascript">
    alert("修改成功");
    location.href="picture.php";
</script>
<?php
}else{
?>
<script language="javascript">
    alert("修改失敗");
    location.href="picture.php";
</script>
<?php
}
?>