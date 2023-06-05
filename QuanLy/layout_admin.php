<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8" />
  <title>Trang chủ</title>
  <link rel="icon" type="image/x-icon" href="../image/logo.png">
  <link href="css/styles.css" rel="stylesheet" />
  <script type="module" src="js/scripts.js" rel="stylesheet"></script>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  
  </style>

</head>

<body>

  <div class="topnav ">
    <a href="trangchu.php"><img src="../image/logochu.png" width="250px"></a>
    <!-- Sidebar Toggle-->
    <button class="openbtn btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"
      onclick=" myFunction()"><i class="fa fa-bars icon"></i></button>

    <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="w3-right">
      <!-- <button class="btn btn-outline-light mt-1">Đăng nhập</button> -->
      <a href="cuahang.php" class="btn btn-outline-secondary mt-1 text-white"><i class="fa fa-comment"></i>Tin nhắn</a>
      <div class="w3-right">
        <a href="cuahang.php" class="btn btn-outline-secondary mt-1 text-white">Cửa hàng</a>
      </div>
    </div>

  </div>

  <div class="sidenav" id="mySidebar">

    <a class="active" href="trangchu.php"><i class="fa fa-fw fa-home w3-small"></i> &nbsp; Trang chủ</a>
    <button class="dropdown-btn"><i class="fa fa-fw fa-users w3-small"></i> &nbsp; Quản lý người dùng
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="nhanvien.php">Quản lý nhân viên</a>
      <a href="khachhang.php">Quản lý khách hàng</a>

    </div>
    <a href="calamviec.php"><i class="fa fa-fw fa-calendar-check w3-small"></i> &nbsp; Quản lý ca làm việc</a>
    <a href="luongnv.php"><i class="fa fa-fw fa-sack-dollar w3-small"></i> &nbsp; Quản lý lương nhân viên</a>
    <a href="nuocuong.php"><i class="fa fa-fw fa-mug-hot w3-small"></i> &nbsp; Quản lý thức uống</a>
    <a href="danhmuc.php"><i class="fa fa-fw fa-bars-staggered w3-small"></i> &nbsp; Quản lý danh mục</a>
    <a href="khuvuc.php"><i class="fa fa-fw fa-layer-group w3-small"></i> &nbsp; Quản lý khu vực</a>
    <a href="ban.php"><i class="fa fa-fw fa-layer-group w3-small"></i> &nbsp; Quản lý bàn</a>
    <a href="donhang.php"><i class="fa fa-fw fa-box-open w3-small"></i> &nbsp; Quản lý đơn hàng</a>
    <a href="khohang.php"><i class="fa fa-fw fa-warehouse w3-small"></i> &nbsp; Quản lý kho hàng</a>
    <a href="binhluan_danhgia.php"><i class="fa fa-fw fa-eye w3-small"></i> &nbsp; Xem bình luận đánh giá</a>
    <button class="dropdown-btn"><i class="fa fa-fw fa-chart-pie w3-small"></i> &nbsp; Thống kê
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="doanhthu.php">Thống kê doanh thu</a>
      <a href="thongkeban.php">Thống kê bàn</a>

    </div>
    <div class="dropup">
      <a class="dropdown-toggle" data-bs-toggle="dropdown">
        <i class="fa fa-th-large"></i>
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="cuahang.php">Cửa hàng</a></li>
        <li><a class="dropdown-item" href="thongbao.php">Thông báo</a></li>
        <li><a class="dropdown-item" href="dangxuat.php">Thoát</a></li>
      </ul>
    </div>
  </div>
  <main id="main">

    <div style="padding-left:16px; padding-top:20px">
      <div class="container-fluid px-4">
       
    </div>
    </div>
  </main>
</body>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("mySidebar");
  var y = document.getElementById("main");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.marginLeft = "250px";
  } else {
    x.style.display = "none";
    y.style.marginLeft = "0";
  }
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>



</html>
<div class="col-2 p-1 ">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-home w3-left"></i>
                  <a class="text-dark fw-bold" href="trangchu.php">Trang chủ</a>
                  <div class="card-footer mt-5">

                  <br>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-users w3-left"></i>
                  <a class="text-dark fw-bold" href="nhanvien.php">Nhân viên</a>
                  <div class="card-footer mt-5">

                  <br>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-calendar w3-left"></i>
                  <a class="text-dark fw-bold" href="chucvu.php">Chức vụ</a>
                  <div class="card-footer mt-5">
<br>
                  </div>
                  
                </div>


              </div>
            </div>

          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-calendar-check w3-left"></i>
                  <a class="text-dark fw-bold" href="calamviec.php">Ca làm việc</a>
                  <div class="card-footer mt-5">
<br>
                  </div>
                  

                </div>


              </div>
            </div>

          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-sack-dollar w3-left"></i>
                  <a class="text-dark fw-bold" href="luongnv.php">Lương nhân viên</a>
                  <div class="card-footer mt-5">

                  <br>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-mug-hot w3-left"></i>
                  <a class="text-dark fw-bold" href="mon.php">Thức uống</a>
                  <div class="card-footer mt-5">

                  <br>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-bars-staggered w3-left"></i>
                  <div class="dropdown">

                    <a class="text-dark fw-bold  dropdown-toggle" data-toggle="dropdown"> Khu vực/Bàn</a>

                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="khuvuc.php">Khu vực</a>
                      <a class="dropdown-item" href="ban.php">Bàn</a>
                    </div>
                  </div>
                  <div class="card-footer mt-5">
                  <br>

                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-layer-group w3-left"></i>
                  <div class="dropdown">

                    <a class="text-dark fw-bold  dropdown-toggle" data-toggle="dropdown"> Khu vực/Bàn</a>

                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="khuvuc.php">Khu vực</a>
                      <a class="dropdown-item" href="ban.php">Bàn</a>
                    </div>
                  </div>
                  <div class="card-footer mt-5">

                  <br>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body">
                  <i class="fa fa-fw fa-box-open w3-left"></i>
                  <a class="text-dark fw-bold" href="donhang.php">Đơn hàng</a>
                  <div class="card-footer mt-5">

                  <br>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-2 p-1">
            <div class="btn border-warning btn-outline-warning w-100">
              <div class="card-group ">
                <div class="card-body ">
                  <i class="fa fa-fw fa-chart-pie w3-left"></i>
                  <a class="text-dark fw-bold" href="doanhthu.php"> Thống kê</a>
                  <div class="card-footer mt-5">
                  <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>