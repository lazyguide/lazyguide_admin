<?php
$currentUserID = $_SESSION['userID'];
$type = $_GET['type'];
$link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
$sql = "SELECT * FROM record WHERE userID = '$currentUserID'";
$sql2 = "SELECT * FROM item WHERE itemType = '$type'";
$result = mysqli_query($link, $sql);
$result2 = mysqli_query($link, $sql2);

if($type != '0'){
if($type == 'sum'){
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Record Time</th>
                                    <th scope="col">使用一次性餐具<br>產生之碳排放量</th>
                                    <th scope="col">使用環保餐具<br>減少之碳排放量</th>
                                    <th scope="col">自行開車或騎車<br>產生之碳排放量</th>
                                    <th scope="col">環保交通<br>減少之碳排放量</th>
                                    <th scope="col">獲得點數</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row"><?php echo $row['recordTime'];?></td>
                                    <td><?php echo $row['tablewareCarbon'];?>(Kg/CO2e)</td>
                                    <td><?php echo $row['tablewareReduction'];?>(Kg/CO2e)</td>
                                    <td><?php echo $row['trafficCarbon'];?>(Kg/CO2e)</td>
                                    <td><?php echo $row['trafficReduction'];?>(Kg/CO2e)</td>
                                    <td><?php echo $row['getPoint'];?>點</td>
                                </tr>
                            </tbody>
                        </table>
<?php
}
}else{
while($row = mysqli_fetch_assoc($result)){
$nowID = $row['recordID'];
?>
<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Record Time</th>
                                <?php
                                    $count = 0;
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        $ID[$count] = $row2['itemID'];

                                        echo '<th scope="col">'.$row2['itemChinese'].'</th>';
                                        $count++;
                                    }
                                ?>
                                <th scope="col">共計</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row" rowspan="3"><?php echo $row['recordTime'];?></td>
                                <?php
                                    $total = 0;
                                    for($i = 0; $i < count($ID); $i++){
                                        $sql3 = "SELECT count FROM recorddetail WHERE recordID = '$nowID' AND itemID = $ID[$i]";
                                        $result3 = mysqli_query($link, $sql3);
                                        $row3 = mysqli_fetch_assoc($result3);
                                        if($type == "goodTraffic" OR $type == "badTraffic"){
                                            echo '<td>'.$row3['count'].'分鐘</td>';
                                        }else{
                                            echo '<td>'.$row3['count'].'個</td>';
                                        }
                                        $total += $row3['count'];

                                    }
                                    if($type == "goodTraffic" OR $type == "badTraffic"){
                                                                                echo '<td>'.$total.'分鐘</td>';
                                                                            }else{
                                                                                echo '<td>'.$total.'個</td>';
                                                                            }
                                ?>

                            </tr>
                            <tr>
                                <?php
                                for($j = 0; $j < count($ID); $j++){
                                $sql4 = "SELECT * FROM item WHERE itemID = $ID[$j]";
                                $result4 = mysqli_query($link, $sql4);
                                $row4 = mysqli_fetch_assoc($result4);
                                echo '<th scope="col">'.$row4['itemChinese'];
                                if($type == 'goodTableware' OR $type == 'goodTraffic'){
                                    echo '<br>減少碳排</th>';
                                }else{
                                    echo '<br>產生碳排</th>';
                                }
                                }
                                ?>
                                <th scope="col">共計</th>
                            </tr>
                            <tr>
                            <?php
                            $total = 0;
                            for($i = 0; $i < count($ID); $i++){
                                $sql5 = "SELECT carbonDetail FROM recorddetail WHERE recordID = '$nowID' AND itemID = $ID[$i]";
                                $result5 = mysqli_query($link, $sql5);
                                $row5 = mysqli_fetch_assoc($result5);
                                echo '<td>'.$row5['carbonDetail'].'(Kg/CO2e)</td>';
                                $total += $row5['carbonDetail'];
                                }
                                echo '<td>'.$total.'(Kg/CO2e)</td>';
                            ?>
                            </tr>
                        </tbody>
                    </table>
<?php
}}}
?>