<?php
session_start();
if($_SESSION['level'] == 'admin'){
?>
<div class="classynav">
                                <ul>
                                    <li><a href="home.php">首頁</a></li>
                                    <li><a href="upInfo.php">最新訊息發布</a></li>
                                    <li><a href="#">查看訊息</a>
                                        <ul class="dropdown">
                                            <li><a href="schoolInfo.php">校園訊息</a></li>
                                            <li><a href="systemInfo.php">系統訊息</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="level.php">權限管理</a></li>
                                    <li><a href="#">活動審核</a>
                                        <ul class="dropdown">
                                            <li><a href="indoor.php">室內活動審核</a></li>
                                            <li><a href="outdoor.php">室外活動審核</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="logout.php"><font style="color:#e5ba63;">Hi&nbsp&nbsp <?php echo $_SESSION['name']."  登出"?></font></a></li>
                                </ul>
</div>
<?php
}else{?>
    <div class="classynav">
                                      <ul>
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                           <li><a href="login.php"><font style="color:#e5ba63;">管理員登入</font></a></li>
                                      </ul>
                                </div>
                                <?php
}
?>