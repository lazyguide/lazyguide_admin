<!DOCTYPE html>
<html lang="en">

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

        <!-- ***** Top Header Area ***** -->
        <?php include "picture_b.php";?>
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
                            <?php include "navBar.php";?>
                            <!-- Navbar End -->
                        </div>
                    </nav>

                    <!-- Search Form -->
                    <div class="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search"
                                placeholder="Type keywords &amp; press enter...">
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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url(img/bg-img/24.jpg);">
            <h2>怪獸圖鑑</h2>
        </div>
        <style>
            .con {
                width: 1200px;
                height: auto;

                margin-right: 30px;
                margin-left: 260px;
            }

            .ro {
                width: 900px;
            }
        </style>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>首頁</a></li>
                            <li class="breadcrumb-item active" aria-current="page">怪獸圖鑑</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->

    <section class="shop-page section-padding-0-100">
        <div class="con">
            <div></div>
            <div class="ro">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                    </div>
                </div>
            </div>

                <div class="row">
                    <!-- Sidebar Area -->


                    <!-- All Products Area -->
                    <div class="col-16 col-md-8 col-lg-9">
                        <div class="shop-products-area">
                            <div class="row">
                                <?php
                                    $count = 0;
                                while($row = mysqli_fetch_assoc($result)) {
                                    $count += 1;
                                    ?>
                                <!-- Single Product Area -->
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="">
                                        <?php $monsterID = $row['monsterID'];?>
                                            <img src="monster/<?php echo $monsterID; ?>.jpg" alt=""></a>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">
                                            <h6>
                                                <?php echo $row["name"]; ?>
                                            </h6>
                                            <p>價格: $<?php echo $row['price'];?></p>
                                            <?php
                                            if($row['isUP'] == 0){
                                                echo "(已下架，無法從商店中獲得)";
                                            }
                                            ?>
                                            <style>
                                                .text-area {
                                                    word-wrap: break-word;
                                                }
                                            </style>

                                            <div class="text-area"><br>
                                                <?php echo $row["introduction"]; ?>
                                            </div>
                                            <br>
                                            <?php if($_SESSION['level'] == 'admin'){?>
                                             <a href="upPicture.php?monsterID=<?php echo $monsterID; ?>"
                                             style="float: right; width: 70px;height: 20px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">修改</a>
                                            <?php if($row['isUP']){ ?>
                                            <a href="deletePicture.php?monsterID=<?php echo $monsterID;?>&isUP=0"
                                            style="float: left; width: 70px;height: 20px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">下架</a>
                                            <?php } else{   ?>
                                            <a href="deletePicture.php?monsterID=<?php echo $monsterID;?>&isUP=1"
                                            style="float: left; width: 70px;height: 20px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">重新上架</a>
                                            <?php } ?>
                                        <?php }else{
                                        ?>
                                            <a href="downloadPicture.php?monsterID=<?php echo $monsterID;?>"
                                            style="float: left; width: 70px;height: 20px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">下載圖片</a>
                                        <?php
                                        } ?>

                                        </div>
                                    </div>
                                </div>


                                <?php   if($count % 3 == 0){  ?>

                                <style>
                                    .contt {
                                        width: 1200px;
                                        height: 50px;
                                    }
                                </style>
                                <div class="contt"></div>
                                <?php }
                                 }?>




                            </div>


                        </div>
                    </div>
                </div>

        </div>
    </section>

    <!-- ##### Shop Area End ##### -->


    <!-- ##### Footer Area End ##### -->

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