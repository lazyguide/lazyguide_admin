<?php
$userID = $_GET['userID'];
$monsterID = $_GET['monsterID'];
?>
<form action="purchaseAccepted.php" method="GET" id="purchaseForm">
<input type="hidden" name="userID" value="<?php echo $userID;?>">
<input type="hidden" name="monsterID" value="<?php echo $monsterID;?>">
</form>
<script language="javascript">
    function confirmPurchase() {
        if (confirm("確定購買？")) {
        document.getElementById("purchaseForm").submit();
      }else{
      location.href="shop.php";
      }
    }
confirmPurchase();
</script>