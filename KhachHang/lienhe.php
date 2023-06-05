<?php require_once'../condb/condb.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Liên hệ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="../image/logo1.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <div class="header">
    <img src="../image/logo.png" width="90px">

    <div class="dg">Hostline: <span class="text-danger">0336789023</span></div>





  </div>

  <div id="navbar">
    <a href="trangchu.php">Trang chủ</a>
    <a href="gioithieu.php">Giới thiệu</a>
    <a href="menu.php">Menu</a>
    <a href="tintuc.php">Tin tức</a>
    <a class="active" href="lienhe.php">Liên hệ</a>
    <form class="navbar-form navbar-right" action="timkiem.php" method="post">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="noidung">
        <div class="input-group-btn btn-default">
          <button class="btn btn-default" type="submit" name="timkiem">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <div class="content">
    <div class="container rounded bg-white mt-5 mb-5 w3-white">
      <div class="row">

        <div class="container-fluid mt-3">

          <div class="row">
            <div class="col-sm-4 p-3 ">
              <h1 class=" w3-text-cyan text-center">Thông tin liên hệ</h1><br>
              <div class="row mt-3">

                <span class="font-weight-bold">&emsp;<i class=" fa fa-map w3-text-red"></i> <b>Địa chỉ</b>
                  Trường Đại Học Cần Thơ, đường 3 tháng 2, phường Hưng Lợi, quận Ninh Kiều, tp Cần Thơ.</span>
              </div>
              <br>
              <div class="row mt-3">

                <span class="font-weight-bold"> &emsp;<i class="fa fa-phone w3-text-green"></i> <b>Điện thoại</b> <a
                    href="tel:012345678" title="012345678"> 012345678</a></span>

              </div><br>
              <div class="row mt-3">

                <span class="font-weight-bold"> &emsp; <i class="fa fa-envelope w3-text-khaki"></i> <b>Email</b></span>
                <a href="mailto:oanh@gmail.com" title="oanh@gmail.com">oanhcoffee@gmail.com</a>
              </div><br>

              <div class="row mt-3">

                <span class="font-weight-bold">&emsp;<i class="fa fa-clock w3-text-brown"></i> <b>Thời gian làm việc</b>
                  22/24</span>

              </div>

            </div>
            <?php 
                    if(isset($_POST['gui'])){
                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $sodt=$_POST['phone'];
                        $noidung=$_POST['noidung'];
                        $sql="INSERT INTO lienhe (LH_MA, LH_TENKH, LH_EMAIL, LH_SDT,LH_NGAYGUI, LH_NOIDUNG) VALUES ('','$name','$email','$sodt', now(),'$noidung')";
                        $query=mysqli_query($conn, $sql);
                       
                    }
                ?>
            <div class="col-sm-8 p-3 ">
              <form action="" id="form" name="form" method="post" onsubmit="return validateForm()" class="form"
                enctype="multipart/form-data">
                <h1 class=" w3-text-cyan w3-center">Form liên hệ</h1>
                <div class="w3-row w3-section">

                  <div class="w3-col w3-text-green" style="width:50px"><i class="w3-xlarge fa fa-user"></i></div>
                  <div class="w3-rest">
                    <input class="w3-input w3-border" name="name" type="text" placeholder="Họ và tên của bạn">
                  </div>
                </div>

                <div class="w3-row w3-section">
                  <div class="w3-col w3-text-green" style="width:50px"><i class="w3-xlarge fa fa-envelope"></i></div>
                  <div class="w3-rest">
                    <input class="w3-input w3-border" name="email" type="text" placeholder="Email của bạn">
                  </div>
                </div>

                <div class="w3-row w3-section">
                  <div class="w3-col w3-text-green" style="width:50px"><i class="w3-xlarge fa fa-phone"></i></div>
                  <div class="w3-rest">
                    <input class="w3-input w3-border" name="phone" type="text" placeholder="số điện thoại của bạn">
                  </div>
                </div>

                <div class="w3-row w3-section">
                  <div class="w3-col w3-text-green" style="width:50px"><i class="w3-xlarge fa fa-comment"></i></div>
                  <div class="w3-rest">
                    <input class="w3-input w3-border" name="noidung" type="text" placeholder="Nội dung">
                  </div>
                </div>

                <button type="submit" name="gui"
                  class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Gửi</button>

              </form>
            </div>
          </div>
          <div class="row mt-2">

            <div class="col col-md-12">
              <iframe style="width: 100%;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.698701330885!2d105.77051744029951!3d10.03483994756375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x44438ff5102c4bd6!2zS8O9IHTDumMgeMOhIEtodSBB!5e0!3m2!1svi!2s!4v1664868704461!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- Footer -->
  <footer class="text-center ">
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-lg-4 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>về chúng tôi
            </h6>
            <div class="w3-text-grey">

              <p>
                OanhCoffee® là không gian của chúng mình nên mọi thứ ở đây đều vì sự thoải mái của chúng mình. Đừng giữ
                trong lòng, hãy
                chia sẻ với chúng mình điều bạn mong muốn để cùng nhau giúp OanhCoffee® trở nên tuyệt vời hơn
              </p>
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Danh mục sản phẩm</h6>

            <p>
              <a href="#!" class="text-muted">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-muted">React</a>
            </p>
            <p>
              <a href="#!" class="text-muted">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-muted">Laravel</a>
            </p>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div> -->
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Liên hệ</h6>
            <div class="w3-text-grey">
              <p><i class="fa fa-home me-3"></i> Xuân Khánh, quận Ninh Kiều, Cần Thơ</p>
              <p>
                <i class="fa fa-envelope me-3"></i>
                OanhCoffee.com
              </p>
              <p><i class="fa fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fa fa-print me-3"></i> + 01 234 567 89</p>
            </div>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-reset fw-bold w3-text-white" href="#">OanhCoffee.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</body>

</html>