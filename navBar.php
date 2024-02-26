<?php
session_start();
if($_SESSION['level'] == 'admin'){
?>
<div class="classynav">
                                <ul>
                                    <li><a href="home.php">首頁</a></li>
                                    <li><a href="#">最新訊息發布</a>
                                        <ul class="dropdown">
                                            <li><a href="count1.php">校園訊息發布</a></li>
                                            <li><a href="history.php">系統訊息發布</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="level.php">權限管理</a></li>
                                    <li><a href="level.php">活動審核</a></li>
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
                                           <li><a href="login.php"><font style="color:#70c745;">管理員登入</font></a></li>
                                      </ul>
                                </div>
                                <?php
}
?>