<?php require_once'../condb/condb.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Chi tiết sản phẩm</title>
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
    <a href="lienhe.php">Liên hệ</a>
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
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="../image/NU08.jpg" width="350px">
        </div>
        <div class="col-md-8">
          <h5>CÀ PHÊ TRUYỀN THỐNG</h5>
          <p class="text-muted">NU08</p>
          <p class="text-muted">1000d</p>
          <p>Dòng sản phẩm</p>
        </div>
      </div>
      <br>
      <div>
        <h3 class="text-danger"><b>Mô tả sản phẩm</b></h3>
        <p>một chút bổ sung nói: “Nghe nói hai người thành hôn sau quan hệ cũng không tốt, Nhị hoàng tử cũng thường
          xuyên tìm Lạc Ly tra, Lạc Ly cùng hắn gặp mặt liền véo đã không phải bí văn.”
          Lâu Mộ Yên buồn cười nói: “Nguyên lai tiểu dã miêu cũng có nữ nhân điên cuồng theo đuổi a!”
          “...” Mấy người nghe được nàng đối Lạc Ly xưng hô mí mắt đều nhịn không được nhảy nhảy.</p>
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

              <?php
                            
                            $danhmuc='SELECT * FROM loainuoc ';
                            $dm= $conn->query($danhmuc);
                            while($r=mysqli_fetch_array($dm)){ 
                        ?>  
                <ul class="nav nav-pills nav-stacked ">
                    <a class="text-muted" href="menu.php?page=loainuoc&LN_MA=<?php echo $r['LN_MA']?>" value="<?php echo $r['LN_MA']?>"><?php echo $r['LN_TEN'];?></a>
                   
                </ul>
                <?php } ?>
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