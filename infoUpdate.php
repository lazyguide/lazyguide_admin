<?php session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');
$type = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>LazyGuide</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/flag.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/flag.png" alt="">
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
                        <a href="index.html" class="nav-brand"></a>

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
                            <?php include "navBar.php" ?>
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
            style="background-image: url(img/bg-img/newmessagebg.jpg);">
            <h2></h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>首頁</a></li>
                            <li class="breadcrumb-item active" aria-current="page">訊息修改</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">

                    <img src="img/bg-img/adminbg.jpg" alt="">

                </div>
                <?php

                $infoID = $_GET["infoID"];

                $sql = "select * from info where INFOID = $infoID";
                $result = mysqli_query($link, $sql);

                if ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['INFOTITLE'];
                    $content = $row['INFOCONTENT'];

                }
                ?>

                <div class="col-12 col-md-6">
                    <!-- Section Heading -->
                    <div class="section-heading">


                        <form method="GET" action="infoUpdate_b.php" style="font-size: 20px;"><br><br>
                            <input type="hidden" name="infoID" value="<?php echo $infoID; ?>">
                            <input type="hidden" name="type" value="<?php echo $type; ?>">
                            標題：<br>
                            <input name='title' type="text" value="<?php echo $title; ?>"
                                style="width:450px;"><br><br>
                            內文：<br>
                            <input name="content" value="<?php echo $content; ?>"
                                style="width:450px;height:100px;"><br><br>


                            <input type="submit" value="修改"
                                style="width: 70px;height: 40px; border-radius: 4px;background-color: #E9D9B7; color: white; border-color:#DDDDDD ;">
                        </form>

                    </div>
                    <!-- Contact Information -->
                    <div class="contact-information">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### -->



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