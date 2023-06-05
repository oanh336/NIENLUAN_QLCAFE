<?php require_once'../condb/condb.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tin tức</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="../image/logo1.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <a class="active" href="tintuc.php">Tin tức</a>
        <a href="lienhe.php">Liên hệ</a>
        <form class="navbar-form navbar-right" action="timkiem.php" method="post">
            <div class="input-group btn-default">
                <input type="text" class="form-control" placeholder="Search" name="noidung">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="timkiem">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="container-fluid">
        <h2 class="text-center"><b>Tin tức</b></h2><br>
        <div class="row">

            <div class="col-sm-6 me-2 ">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="https://cafef.vn/7-sai-lam-can-tranh-khi-uong-ca-phe-neu-khong-muon-suc-khoe-bi-tan-pha-20230305211605379.chn"
                            target="_blank">
                            <img src="https://cafefcdn.com/zoom/260_162/203337114487263232/2023/3/5/photo1678025621091-16780256212611293346822.jpg"
                                width="200xp">
                        </a>

                    </div>
                    <div class="col-sm-8">

                        <h5>
                            <a href="https://cafef.vn/7-sai-lam-can-tranh-khi-uong-ca-phe-neu-khong-muon-suc-khoe-bi-tan-pha-20230305211605379.chn"
                                target="_blank">7 sai lầm cần tránh khi uống cà phê nếu không muốn sức khỏe bị tàn
                                phá</a>
                        </h5>
                        <p>Cà phê sẽ là đồ uống cực lành mạnh, giúp cơ thể chống lại nhiều bệnh tật nếu chúng ta tránh 7
                            sai lầm phổ biến sau đây khi uống cà phê.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 me-2 ">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="https://cafef.vn/ca-phe-thu-do-uong-voi-lich-su-lau-doi-va-nhung-bien-tau-mang-day-hoi-tho-cuoc-song-o-viet-nam-20230308070822293.chn"
                            target="_blank">

                            <img src="https://cafefcdn.com/zoom/260_162/203337114487263232/2023/3/8/photo1678234070935-1678234071113884075228.png"
                                width="200xp">
                        </a>
                    </div>
                    <div class="col-sm-8">

                        <h5>
                            <a href="https://cafef.vn/ca-phe-thu-do-uong-voi-lich-su-lau-doi-va-nhung-bien-tau-mang-day-hoi-tho-cuoc-song-o-viet-nam-20230308070822293.chn"
                                target="_blank">Cà phê: Thứ đồ uống với lịch sử lâu đời và những biến tấu mang đầy hơi
                                thở cuộc sống ở Việt
                                Nam</a>
                        </h5>
                        <p>Cà phê ở Việt Nam không chỉ là thức uống bắt đầu một ngày mới, người ta có thể uống sáng,
                            trưa, chiều, tối, nói chung là cả ngày.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 me-2 ">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="https://cafef.vn/ca-phe-viet-nam-dang-o-dau-tren-tam-nhin-20-ty-usd-20230310120847745.chn"
                            target="_blank">

                            <img src="https://cafefcdn.com/zoom/260_162/pr/2023/photo1678422739728-16784227398071049683665-63814046927995.jpeg"
                                width="200xp">
                        </a>
                    </div>
                    <div class="col-sm-8">

                        <h5>
                            <a href="https://cafef.vn/ca-phe-viet-nam-dang-o-dau-tren-tam-nhin-20-ty-usd-20230310120847745.chn"
                                target="_blank">Cà phê Việt Nam đang ở đâu trên tầm nhìn 20 tỷ USD?</a>
                        </h5>
                        <p>“Ngành cà phê Việt Nam có thể đem về lợi nhuận khoảng 20 tỷ USD/năm nếu chúng ta biết cách
                            làm tốt hơn hiện nay cũng như xây dựng được một chiến lược quốc gia về phát triển ngành
                            cà...</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 me-2 ">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="https://cafef.vn/xep-hang-ngon-so-2-tren-the-gioi-ca-phe-viet-nam-da-bung-no-ra-sao-trong-nam-2022-20230225102341939.chn"
                            target="_blank">
                            <img src="https://cafefcdn.com/zoom/260_162/203337114487263232/2023/2/25/photo1677295329015-16772953291822119767556.png"
                                width="200xp">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <h5>
                            <a href="https://cafef.vn/xep-hang-ngon-so-2-tren-the-gioi-ca-phe-viet-nam-da-bung-no-ra-sao-trong-nam-2022-20230225102341939.chn"
                                target="_blank">

                                Xếp hạng ngon số 2 trên thế giới, cà phê Việt Nam đã bùng nổ ra sao trong năm 2022?
                            </a>
                        </h5>
                        <p>Cà phê Việt Nam đang ngày càng vươn tầm rộng rãi ra thế giới.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

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