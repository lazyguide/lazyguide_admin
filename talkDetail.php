<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>carbon</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">



        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <?php include "navBar.php"; ?>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>文章討論區</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> 首頁</a></li>
                            <li class="breadcrumb-item active" aria-current="page">文章討論區</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
    <div class="cart-area section-padding-0-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">


                    <?php
                    $link = mysqli_connect('localhost', 'root', '12345678', 'sa');
                    $articleID = $_GET['articleID'];
                    $sql = "SELECT * FROM article, account WHERE articleID = '$articleID' AND article.userID = account.userID";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <h3><?php echo $row['title'];?></h3>
                                </tr>
                                <tr>
                                    <p style="display:inline;">發文者：<?php echo $row['userID'];
                                    if($row['level'] == "admin"){
                                        echo("(管理員)");
                                    }
                                    ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['time']; ?></p>
                                </tr>


                            </thead>
                            <tbody>
                                <tr>
                                    <td >

                                        <p>
                                        <?php echo $row['content']; ?>
                                        </p>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                        <?php if($_SESSION['userID'] == $row['userID']){
                        ?>
                        <form action="talkUpdate.php" method="GET">
                        <input type="hidden" name="articleIDCurrent" value="<?php echo $articleID;?>">
                        <button type="submit" style="width: 100px;height: 40px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">修改</button>
                        </form>
                        <?php
                        }
                        if($_SESSION['level'] == "admin" OR $_SESSION['userID'] == $row['userID']){
                        ?>
                        <form action="talkDelete.php" method="GET">
                        <input type="hidden" name="articleIDCurrent" value="<?php echo $articleID;?>">
                        <button type="submit" style="width: 100px;height: 40px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">刪除</button>
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <br><br><br>
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">

                    <?php
                    $sql2 = "SELECT * FROM response, account WHERE articleID = $articleID AND account.userID = response.userID";
                    $result2 = mysqli_query($link, $sql2);
                    $currentUserID = $_SESSION['userID'];
                    ?>
                        <table class="table table-responsive">
                            <thead>

                            </thead>
                            <tbody>
                                <tr>
                                    <h5>討論區</h5>

                                </tr>
                                <br><br>
                                <?php
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    echo "<tr><h6>".$row2['userID'];
                                    if($row2['userID'] == $row['userID']){
                                        echo "(原PO)";
                                    }
                                    if($row2['level'] == "admin"){
                                        echo "(管理者)";
                                    }
                                    echo "：</h6>".$row2['content'];
                                    echo "</tr><hr>";
                                }
                                ?>
                            </tbody>

                            <div class="coupon-discount mt-70">
                            <form action="response.php" method="GET">
                                <input type="hidden" name="articleID" value="<?php echo $articleID; ?>">
                                <input type="hidden" name="userID" value="<?php echo $currentUserID; ?>">
                                <input name="content" style="width: 1000px; height: 40px;" placeholder="我想說...">&nbsp;
                                <button type="submit" style="width: 100px;height: 40px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">發布</button>
                            </form>
                            </div>
                        </table>
                    </div>
                </div>
            </div>





        </div>
    </div>
    <!-- ##### Cart Area End ##### -->



    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>