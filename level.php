<!DOCTYPE html>
<html lang="en">
<?php

session_start();
$link = @mysqli_connect('localhost', 'root', '12345678', 'lazyguide');

$sql = "select * from account;";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

?>

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
            <a href="index.php" class="nav-brand"></a>

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
  <style>
    .btn-green {
      background-color: green;
      color: white;
    }
  </style>
  <!-- ##### Breadcrumb Area Start ##### -->
  <div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
      style="background-image: url(img/bg-img/newmessagebg.jpg);">
      <h2>權限與資料管理</h2>
    </div>
    <style>
      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .dropdown-item {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }

      .dropdown-item:hover {
        background-color: #f1f1f1;
      }
    </style>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> 首頁</a></li>
              <li class="breadcrumb-item active" aria-current="page">權限管理</li>
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
<table BORDER WIDTH=35%>
  <section class="bg-white py-10">
    <div class="container px-10 my-10">
        <div class="row gx-5 justify-content-center">
            <!-- Pricing card free-->
            <table class="table table-hover" background="">
                <thead>
                  
                    <tr>
                      <th>姓名</th>
                      <th>電話</th>
                      <th>帳號</th>
                      <th>權限</th>
                      <th>&nbsp</th>
                    </tr>
                  </thead>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                      <tr>
                        <td>
                          <?php echo $row["USERNAME"]; ?>
                        </td>
                        <td>
                          <?php echo $row["PHONE"]; ?>
                        </td>
                        <td>
                          <?php echo $row["USERID"]; ?>
                        </td>

                        <td class="text-success">
                            <span style="color:#BCAF96;"><?php echo $row["LEVEL"]; ?><i class="mdi mdi-arrow-down"></span></i>
                        </td>
                        <td>
                            <a href="level_b.php?userID=<?php echo $row['USERID']?>&level=admin" style="float: center; width: 1000px;height: 20px; border-radius: 4px;background-color: #E9D9B7; color: white; border-color:#DDDDDD ;">&nbspadmin</a>
                            <a href="level_b.php?userID=<?php echo $row['USERID']?>&level=user" style="float: center; width: 100px;height: 20px; border-radius: 4px;background-color: #E9D9B7; color: white; border-color:#DDDDDD ;">&nbspuser</a>
                            <?php
                            if($row['LEVEL'] == "user"){
                            ?>
                            <a href="delete.php?userID=<?php echo $row['USERID']?>" style="float: center; width: 100px;height: 20px; border-radius: 4px;background-color: #E9D9B7; color: white; border-color:#DDDDDD ;">&nbspdelete</a>
                            <?php
                            }
                            ?>

                        </td>
                      </tr>
                    <?php } ?>




                  </tbody>
                </table>
              </section>
              </div>
            </div>
          </div>
        </div>









      </div>


    </div>
    </div>
    </div>
    </div>
  </section>
 </table> 
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