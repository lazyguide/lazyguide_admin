<?php
include('config.php');

$name=$_GET['name'];
$phone=$_GET['phone'];
$userID=$_GET['userID'];
$password=$_GET['password'];


$sql="INSERT into account (name,phone,userID,password) values ('$name','$phone','$userID','$password')";
$result=mysqli_query($link,$sql);
if($result){?>
<script language="javascript">
    alert('註冊成功');
    location.href="login.php";
    </script>
    <?php
}else{?>
   <script language="javascript">
    alert('帳密錯誤');
    history.back();
    </script>
<?php
}?>
