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
    <style>
          dialog {
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            box-sizing: border-box;
          }
        </style>

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
            <h2>個人資訊管理</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> 首頁</a></li>
                            <li class="breadcrumb-item active" aria-current="page">個人資料管理</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->
	<style>
		.rectangle {
			display: inline-block;
			float: left;
			margin-left: 200px;
			margin-top: -150px;

			width: 200px;
			height: 100px;
			background-color: #5ec542;
			text-align: center;
			line-height: 100px;
			font-size: 30px;
			color: white;
			border-radius: 5px;

		}
        
		.centered-text {
			font-size: 1000%;
			text-align: center;
			line-height: 20px;
            margin-left: 70px;
			margin-top: 20px;
		}
	</style>
    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-18 col-md-6">
                    <div class="contact--thumbnail">
                    
                        <div class="rectangle">我 的 點 數</div>


                    </div>
                    <?php
                                                $link = @mysqli_connect('localhost', 'root', '12345678', 'sa');
                                                $currentUserID = $_SESSION['userID'];
                                                $sql = "SELECT * FROM account WHERE userID = '$currentUserID'";
                                                $result = mysqli_query($link, $sql);
                                                $row = mysqli_fetch_assoc($result);
                                            ?>
                    <div class="centered-text"><?php echo $row['point'];?></div>
                </div>


                <div class="col-12 col-lg-4">
                    <div class="checkout-content">
                        <h5 class="title--">資料管理</h5>
                        <div class="products">

                            <div class="products-data">
                                <div class="subtotal d-flex justify-content-between align-items-center">
                                    <h5>名字:&nbsp&nbsp<?php echo $row['name'];?></h5>
                                    <h5><input type="button" class="btn btn-gray btn-block enter-btn" value=" 修改" onclick="openNameDialog()"><br></h5>
                              <dialog id="nameDialog">
                                                              <p>目前名字為: <?php echo $row['name']?></p>
                                                              <form action="personal_b.php" method="get">
                                                              修改為: <input type="text" name="newName" required>
                                                              <input type="hidden" name="method" value="name">
                                                              <input type="submit" value="確認修改">
                                                              <br><input type="button" onclick="closeNameDialog()" value="關閉">
                                                              </form>
                                                          </dialog>
                                                          <script src="nameDialog.js">
                                                              </script>
                                </div>
                        <div class="subtotal d-flex justify-content-between align-items-center">
                            <h5>帳號:&nbsp&nbsp<?php echo $row['userID'];?></h5>

                        </div>
                        <div class="shipping d-flex justify-content-between align-items-center">
                            <h5>電話:&nbsp&nbsp<?php echo $row['phone'];?></h5>
                            <h5><input type="button" class="btn btn-gray btn-block enter-btn" value=" 修改" onclick="openPhoneDialog()"><br></h5>
                            <dialog id="phoneDialog">
                                <p>目前電話為: <?php echo $row['phone']?></p>
                                <form action="personal_b.php" method="get">
                                修改為: <input type="text" name="newPhone" required>
                                <input type="hidden" name="method" value="phone">
                                <input type="submit" value="確認修改">
                                <br><input type="button" onclick="closePhoneDialog()" value="關閉">
                                </form>
                            </dialog>
                            <script src="phoneDialog.js">
                                </script>

                        </div>
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <h5>密碼:&nbsp&nbsp<?php echo $row['password'];?></h5>
                            <h5><input type="button" class="btn btn-gray btn-block enter-btn" value=" 修改" onclick="openPasswordDialog()"><br></h5>
                            <dialog id="passwordDialog">
                                                    <p>目前密碼為: <?php echo $row['password']?></p>
                                                    <form action="personal_b.php" method="get">
                                                    修改為: <input type="text" name="newPassword" required>
                                                    <input type="hidden" name="method" value="password">
                                                    <input type="submit" value="確認修改">
                                                    <br><input type="button" onclick="closePasswordDialog()" value="關閉">
                                                    </form>
                                                </dialog>
                                                <script src="passwordDialog.js">
                                                    </script>
                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

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