<?php
session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Carbon</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">


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
                        <a href="home.php" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

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


                </div>
            </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div>

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/1.jpg);"></div>



                <!-- Post Content -->

                <style>
                    #table-wrapper {
                        position: absolute;
                        top: 20%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 700px;
                        height: 20px;
                    }

                    span {
                        font-weight: normal;
                        font-size: 20px;
                        color: gray;
                    }
                </style>
                <style>
                    .btn-green {
                        background-color: green;
                        color: white;
                    }
                </style>
                <?php
                //這裡是detail，所以會看到標題和內容
                $infoID= $_GET["infoID"];

                $sql = "select * from information where infoID = '$infoID'";
                $result = mysqli_query($link, $sql);

                ?>

                <div class="container-scroller " style="width:700px;" id="table-wrapper">
                    <div class="container-fluid page-body-wrapper full-page-wrapper">
                        <div class="card w-300 h-200 ">
                            <div class="card-body px-5 py-5">
                                <div class="row align-items-start">
                                    <?php $row = mysqli_fetch_assoc($result); ?>

                                        <h1>
                                            <?php echo $row['INFOTITLE'] ?><span>
                                                <?php echo $row['TIME'] ?>
                                            </span>
                                        </h1>

                                    </div>
                                    <p align="left">
                                        <?php echo $row['INFOCONTENT'] ?>
                                    </p>

                                    <div style="text-align: center;">
                                        <a href="infoUpdate.php?infoID=<?php echo $infoID; ?>"
                                            style="float: right; width: 70px;height: 20px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">修改</a>


                                        <a href="infoDelete.php?infoID=<?php echo $infoID; ?>"
                                            style="float: left; width: 70px;height: 20px; border-radius: 4px;background-color: #70c745; color: white; border-color:#DDDDDD ;">刪除</a>


                                    </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
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