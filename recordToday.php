<?php
    //$currentDate = date("Y-m-d");
    date_default_timezone_set("Asia/Taipei");
    $currentDate = $_GET['currentDate'];
    $currentUserID = $_SESSION['userID'];
    $link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
    $sql = "SELECT * FROM record WHERE userID = '$currentUserID' and recordTime LIKE '$currentDate%'";
    $result = mysqli_query($link, $sql);
    echo '<table><tr><th scope="row">紀錄時間</th><th>一次性餐具所產生之碳排放量</th><th scope="row">交通所產生之碳排放量</th><th scope="row">獲得點數</th></tr>';
    while($row = mysqli_fetch_assoc($result)){
    $getPoint = $row['getPoint'];
    echo '<tr><td>', $row['recordTime'], '</td><td>', $row['tablewareCarbon'], '</td><td>', $row['trafficCarbon'], '</td><td>', $getPoint, '</td></tr>';
    }
    echo '</table>';

?>