<?php
session_start();
if($_SESSION['level'] == 'user'){
?>
<div class="classynav">
                                <ul>
                                    <li><a href="home.php">首頁</a></li>
                                    <li><a href="#">計算碳排</a>
                                        <ul class="dropdown">
                                            <li><a href="count1.php">計算碳排</a></li>
                                            <li><a href="history.php">歷史紀錄</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">個人</a>
                                        <ul class="dropdown">
                                        <li><a href="personal.php">個人資料管理</a></li>
                                         <li><a href="picture.php">怪獸圖鑑</a></li>
                                       </ul>
                                       </li>

                                    <li><a href="#">資訊</a>
                                        <ul class="dropdown">
                                            <li><a href="shopNews.php">公告</a></li>
                                            <li><a href="information.php">相關資訊</a></li>
                                            <li><a href="talk.php">討論區</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.php">怪獸商店</a></li>

                                    <li><a href="logout.php"><font style="color:#70c745;">Hi&nbsp&nbsp <?php echo $_SESSION['name']."  登出"?></font></a></li>
                                </ul>



                            </div>
<?php
}elseif($_SESSION['level'] == null){?>
    <div class="classynav">
                                      <ul>
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                           <li></li>
                                           <li><a href="login.php"><font style="color:#70c745;">登入|註冊</font></a></li>
                                      </ul>
                                </div>
                                <?php
}else{
?>
<div class="classynav">
                                <ul>
                                    <li><a href="home.php">首頁</a></li>
                                    <li><a href="personal.php">個人資料管理</a></li>
                                    <li><a href="#">資訊</a>
                                        <ul class="dropdown">
                                            <li><a href="shopNews.php">公告</a></li>
                                            <li><a href="info.php">相關資訊</a></li>
                                            <li><a href="talk.php">討論區</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">後台管理</a>
                                        <ul class="dropdown">
                                            <li><a href="announce.php">怪獸商店公告發佈</a></li>
                                            <li><a href="goods.php">新商品發佈</a></li>
                                            <li><a href="upInfo.php">環保資訊發佈</a></li>
                                            <li><a href="picture.php">怪獸圖鑑管理</a></li>
                                            <li><a href="level.php">權限管理</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="logout.php"><font style="color:#70c745;">Hi&nbsp&nbsp <?php echo $_SESSION['name']."  登出"?></font></a></li>
                                </ul>
                            </div>
<?php }
?>