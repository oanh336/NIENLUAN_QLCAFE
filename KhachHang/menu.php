<?php require_once'../condb/condb.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Menu thức uống</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/x-icon" href="../image/logo1.ico">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2020.css">
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
    <a class="active" href="menu.php">Menu</a>
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



  <!-- Menu Container -->
<div class="container-fluid">
<h2 class="w3-center w3-padding-48"><b>THỨC UỐNG </b></h2>
<div class="row">
  <div class="col-md-3 " height="300px">
    <div class=" w3-card w3-2020-sandstone">
 <h5 class=" text-center w3-border w3-padding-16  w3-2020-fired-brick">DANH MỤC SẢN PHẨM</h5>
 
  
    <?php
                            
                            $danhmuc='SELECT * FROM loainuoc ';
                            $dm= $conn->query($danhmuc);
                            while($r=mysqli_fetch_array($dm)){ 
                        ?>  

                
        <a href="danhmuc.php?page=loainuoc&LN_MA=<?php echo $r['LN_MA']?>" value="<?php echo $r['LN_MA']?>" class="active w3-text-white">
          <div class=" tablink w3-padding  w3-panel w3-hover-light-gray"><h5><?php echo $r['LN_TEN'];?></h5></div>
        </a>
        <?php } ?>
    </div>
 
  </div>
  <div class="col-md-8 ">
  <div class="w3-container menu w3-padding-48 w3-card w3-2020-sandstone">
        <?php 
   
  $sanpham=mysqli_query($conn,"select n.NU_MA, n.NU_TEN, n.NU_HINHANH, l.LN_TEN, d.DG_GIA from nuocuong n 
  inner join loainuoc l on l.LN_MA=n.LN_MA
  inner join (select max(N_NGAY) as ngaymax, NU_MA from dongia GROUP BY NU_MA) ng on ng.NU_MA = n.NU_MA 
  inner join dongia d on d.NU_MA = n.NU_MA and ng.ngaymax = d.N_NGAY");
    while($row=mysqli_fetch_assoc($sanpham)){ 
        ?>
        <div class="row">
         
      
          <div class="col-md-3">
            <img src="../image/<?php echo $row['NU_HINHANH'];?>" class="img-circle" width="100px" class="rounded-circle">
          </div>
          <div class="col-md-4">
            <h5><a href="chitietsanpham.php" class="text-danger"></a><?php echo $row['NU_TEN'];?></a></h5>
            <p class="w3-text-dark">Danh mục: <?php echo $row['LN_TEN'];?></p><br>
          </div>
          <div class="col-md-4">
            <p class="hr"></p>
          </div>
          <div class="col-md-1"><?php echo number_format($row['DG_GIA'],0,',','.'); echo ' VNĐ'?></div>
        </div><br><br> <?php } ?>
      </div>
  </div>
  
</div>
</div>
<br>

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