<?php
    $link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
    session_start();
    $tableSum = 0;
    $trafficSum = 0;
    $datatable = [];
    $dataTraffic = [];
    $currentUserID = $_SESSION['userID'];
    date_default_timezone_set("Asia/Taipei");
    $currentYear = date('Y');
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-01%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[0] = $tableSum; $dataTraffic[0] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-02%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[1] = $tableSum; $dataTraffic[1] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-03%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[2] = $tableSum; $dataTraffic[2] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-04%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[3] = $tableSum; $dataTraffic[3] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-05%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[4] = $tableSum; $dataTraffic[4] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-06%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[5] = $tableSum; $dataTraffic[5] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-07%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[6] = $tableSum; $dataTraffic[6] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-08%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[7] = $tableSum; $dataTraffic[7] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-09%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[8] = $tableSum; $dataTraffic[8] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-10%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[9] = $tableSum; $dataTraffic[9] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-11%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[10] = $tableSum; $dataTraffic[10] = $trafficSum;
    $tableSum = 0;
    $trafficSum = 0;
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentYear-12%'";
    $result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $tableSum += $row['tablewareReduction'];
        $trafficSum += $row['trafficReduction'];
    }
    $datatable[11] = $tableSum; $dataTraffic[11] = $trafficSum;
    $sum = [];
    for($i = 0; $i < 12; $i++){
        $sum[$i] = $datatable[$i] + $dataTraffic[$i];
    }
echo  json_encode(array('table' => $datatable, 'traffic' => $dataTraffic,'sum' => $sum));
?>