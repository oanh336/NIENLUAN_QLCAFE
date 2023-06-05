<?php require_once'../condb/condb.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Giới thiệu</title>
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
        <a class="active"  href="gioithieu.php">Giới thiệu</a>
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

    <div class="content container">
        <h3>Giới thiệu</h3>

        <pa>Oanh Coffee® thuộc Công ty TNHH ABC tự hào là đơn vị phân phối hợp lệ và độc quyền cho tất
            cả các sản phẩm đóng gói mang thương hiệu Oanh Coffee®- Thương hiệu cà phê sinh ra từ đất Việt. </pa>
        <br><br>

        <pa>Từ tình yêu với Việt Nam và niềm đam mê cà phê, năm 2000, thương hiệu Oanh Coffee® ra đời với khát vọng
            nâng tầm di sản cà phê lâu đời của Việt Nam và lan rộng tinh thần tự hào, kết nối hài hoà giữa truyền thống
            với hiện đại.</pa><br><br>

        <pa>Bắt đầu với sản phẩm cà phê đóng gói tại Hồ Chí Minh vào năm 2003, chúng tôi đã nhanh chóng phát triển và mở rộng
            thành thương hiệu quán cà phê nổi tiếng và không ngừng mở rộng hoạt động trong và ngoài nước từ năm 2005.
        </pa><br><br>

        <pa>Qua một chặng đường dài, chúng tôi đã không ngừng mang đến những sản phẩm cà phê thơm ngon, sánh đượm trong
            không gian thoải mái và lịch sự. Những ly cà phê của chúng tôi không chỉ đơn thuần là thức uống quen thuộc
            mà còn mang trên mình một sứ mệnh văn hóa phản ánh một phần nếp sống hiện đại của người Việt Nam.</pa>
        <br><br>

        <pa>Đến nay, Oanh Coffee® vẫn duy trì khâu phân loại cà phê bằng tay để chọn ra từng hạt cà phê chất lượng
            nhất, rang mới mỗi ngày và phục vụ quý khách với nụ cười rạng rỡ trên môi. Bí quyết thành công của chúng tôi
            là đây: không gian quán tuyệt vời, sản phẩm tuyệt hảo và dịch vụ chu đáo với mức giá phù hợp.</pa><br><br>

        <pa>Không chỉ dừng lại ở đó,Oanh Coffee® mong muốn đưa hương vị cà phê đến gần hơn với nhiều hơn gia đình
            Việt trên mọi miền đất nước, thưởng thức ngay tại nhà khi không có thời gian tới quán. Mang đến nhiều lựa
            chọn cà phê rang xay sẵn hoặc uống liền với mức độ bận rộn khác nhau của nhịp sống hằng này.</pa><br><br>

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
                                OanhCoffee® là không gian của chúng mình nên mọi thứ ở đây đều vì sự thoải mái của chúng
                                mình. Đừng giữ trong lòng, hãy
                                chia sẻ với chúng mình điều bạn mong muốn để cùng nhau giúp OanhCoffee® trở nên tuyệt
                                vời hơn
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