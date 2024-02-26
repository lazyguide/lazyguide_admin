<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Alazea - Gardening &amp; Landscaping HTML Template</title>

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
                        <a href="index.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

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
                            <?php include "navBar.php";?>
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
            <h2>怪獸商店</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> 首頁</a></li>
                            <li class="breadcrumb-item active" aria-current="page">怪獸商店</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">

            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">

                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">

                            <!-- Single Product Area -->
                                    <?php
                                    $currentUserID = $_SESSION['userID'];
                                    $link = @mysqli_connect('localhost', 'root', '12345678', 'sa');

                                    $sql = "SELECT * FROM monster";
                                    $sql2 = "SELECT * FROM purchase WHERE userID = '$currentUserID'";
                                    $count = 0;
                                    $numRow = [];

                                    $result = mysqli_query($link, $sql);
                                    $result2 = mysqli_query($link, $sql2);
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                        $numRow[$count] = $row2['monsterID'];
                                        $count++;
                                    }

                                    while($row = mysqli_fetch_assoc($result)){?>
                                    <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="">
                                    <?php
                                        $pickMonsterID = $row['monsterID'];
                                        if(in_array($pickMonsterID, $numRow)){
                                        $path = "eggDone/".$pickMonsterID.".jpg";?>
                                        <img src="<?php echo $path;?>">
                                        </div></div></div>
                                        <?php
                                        }else{
                                        $path = "egg/".$pickMonsterID.".jpg";
                                        ?>

                                        <img src="<?php echo $path;?>">
                                    </div>




                                        <div class="product-info mt-15 text-center">

                                        <?php
                                        $sql3 = "SELECT * FROM monster WHERE monsterID = '$pickMonsterID'";
                                        $result3 = mysqli_query($link, $sql3);
                                        $row3 = mysqli_fetch_assoc($result3);
                                        ?>
                                        <p>怪獸蛋</p>

                                        <?php
                                        if($row['isUP'] == 0){
                                        echo '<p>已下架，無法購買</p>';}
                                        else{
                                        ?>

                                       <p><h6><?php echo "$".$row3['price'];?></h6></p>

                                       <form action="shop_b.php" method="get">
                                       <input type="hidden" name="monsterID" value="<?php echo $pickMonsterID;?>">
                                       <input type="hidden" name="userID" value="<?php echo $currentUserID;?>">
                                       <input type="submit" value="購買" name="submit" style="width: 60px;height: 30px; border-radius: 30px;background-color: #70c745; color: white; border-color:#DDDDDD ;">
                                       </form>
                                       <?php } ?>
                                           </div>
                                          </div>
                                        </div>
                                <?php
                                    }
                                    }
                                ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->



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