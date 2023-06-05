<?php include_once '../condb/condb.php'; ?>
<?php
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: ../NhanVien/dangnhap.php');
}

?>
<?php
$user = (isset($_SESSION['username'])) ? $_SESSION['username'] : [];

$sql_up = "SELECT * FROM nhanvien a, chucvu b where a.CV_MA=b.CV_MA and a.NV_MA='$user'";
$query_up = mysqli_query($conn, $sql_up);
$rows = mysqli_fetch_assoc($query_up);
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Thông tin tài khoản</title>
    <link rel="icon" type="image/x-icon" href="../image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
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
        <button class="openbtn icon btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" onclick=" myFunction()"><i class="fa fa-bars"></i></button>

        <!-- <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div> -->
        <div class="w3-right">
            <!-- <button class="btn btn-outline-light mt-1">Đăng nhập</button> -->
            <a href="hoso.php" class="btn btn-outline-secondary mt-1 text-white"><?php echo $rows['NV_HOTEN'];  ?></a>
            <div class="w3-right">
                <a href="dangxuat.php" class="btn btn-outline-secondary mt-1 text-white">Đăng xuất</a>
            </div>
        </div>
    </div>

    <div class="sidenav" id="mySidebar">

        <a href="trangchu.php"><i class="fa fa-fw fa-home w3-small"></i> &nbsp; Trang chủ</a>
        <a href="nhanvien.php"><i class="fa fa-fw fa-users w3-small"></i> &nbsp; Quản lý nhân viên</a>
        <a href="chucvu.php"><i class="fa fa-fw fa-calendar-check w3-small"></i> &nbsp; Quản lý chức vụ</a>
        <a href="phancong.php"><i class="fa fa-fw fa-calendar w3-small"></i> &nbsp; Phân công nhân viên</a>
        <a href="calamviec.php"><i class="fa fa-fw fa-calendar-check w3-small"></i> &nbsp; Quản lý ca làm việc</a>
        <a href="luongnv.php"><i class="fa fa-fw fa-sack-dollar w3-small"></i> &nbsp; Tra cứu lương nhân viên</a>
        <a href="nuocuong.php"><i class="fa fa-fw fa-mug-hot w3-small"></i> &nbsp; Quản lý thức uống</a>
        <a href="danhmuc.php"><i class="fa fa-fw fa-bars-staggered w3-small"></i> &nbsp; Quản lý danh mục</a>
        <a href="khuvuc.php"><i class="fa fa-fw fa-layer-group w3-small"></i> &nbsp; Quản lý khu vực</a>
        <a href="ban.php"><i class="fa fa-fw fa-layer-group w3-small"></i> &nbsp; Quản lý bàn</a>
        <a href="donhang.php"><i class="fa fa-fw fa-box-open w3-small"></i> &nbsp; Quản lý đơn hàng</a>
        <a href="doanhthu.php"><i class="fa fa-fw fa-chart-column w3-small"></i> &nbsp; Thống kê doanh thu</a>
        <!-- <button class="dropdown-btn"><i class="fa fa-fw fa-chart-pie w3-small"></i> &nbsp; Thống kê
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="doanhthu.php">Thống kê doanh thu</a>
            <a href="thongkeban.php">Thống kê bàn</a>

        </div> -->
        <!-- <div class="dropup">
            <a href="dangxuat.php"><i class="fa fa-power-off"></i></a>
        </div> -->
    </div>
    <main id="main">
        <div style="padding-left:16px; padding-top:20px">
            <div class="container-fluid px-4">
                <div class="row">
                    <?php
                    $id=$rows['NV_MA'];
                    $select=mysqli_query($conn,"select * from nhanvien a, chucvu b where a.CV_MA=b.CV_MA and a.NV_MA='$id'");
                    $row=mysqli_fetch_array($select);
                    
                    ?>
                       <div class="row">
                            <div class="col-md-6">
                                <h4 class="mt-5"><b>Thông tin nhân viên</b></h4>
                            </div>
                            <div class="col-md-6">

                                <a href="hoso_sua.php?id=<?php echo $row['NV_MA'];?>"><button class="mt-5 btn btn-success w3-right" style="margin-bottom:10px"><i class="fa fa-pencil-square text-white small"></i> Cập nhật</button></a>
                                <!-- -->



                            </div>
                            <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Mã nhân viên</b></h5>
                                    </label>
                                    <h5> <input disabled name="ma" value=" <?php echo $row['NV_MA'];  ?>" readonly class="form-control" type="text"></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Vị trí</b></h5>
                                    </label>
                                    <h5> <input name="cv" value=" <?php echo $row['CV_MA'];
                                                                    echo " - ";
                                                                    echo $row['CV_TEN'] ?>" disabled class="form-control" type="text"></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Họ và tên</b></h5>
                                    </label>
                                    <h5> <input disabled name="ten" value=" <?php echo $row['NV_HOTEN']; ?>" class="form-control" type="text"></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Mật khẩu</b></h5>
                                    </label>
                                    <h5> <input disabled name="pass" value=" <?php echo $row['NV_PASSWD']; ?>" class="form-control" type="text"></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>CCCD</b></h5>
                                    </label>
                                    <h5><input disabled value=" <?php echo $row['NV_CCCD']; ?>" name="cccd" class="form-control" type="text" placeholder="Name"> </h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Ngày sinh</b></h5>
                                    </label>
                                    <h5> <input disabled value=" <?php echo $row['NV_NGAYSINH']; ?>" name="ngaysinh" class="form-control" type="text"> </h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Giới tính</b></h5>
                                    </label>
                                    <h5> <input disabled value=" <?php echo $row['NV_GIOITINH']; ?>" name="gtinh" class="form-control" type="text"></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Số điện thoại</b></h5>
                                    </label>
                                    <h5> <input disabled value=" <?php echo $row['NV_SDT']; ?>" name="sdt" class="form-control" type="text"></h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Email</b></h5>
                                    </label>
                                    <h5> <input disabled value=" <?php echo $row['NV_EMAIL']; ?>" name="email" class="form-control" type="email"> </h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputs"> <label>
                                        <h5><b>Ngày vào làm</b></h5>
                                    </label>
                                    <h5> <input disabled value=" <?php echo $row['NV_NGAYVAOLAM']; ?>" name="ngaylam" class="form-control" type="text"></h5>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-inputs"> <label>
                                        <h5><b>Địa chỉ</b></h5>
                                    </label> <input disabled value=" <?php echo $rows['NV_DIACHI']; ?>" name="dchi" class="form-control" type="text"> 
                                </div>
                            </div>
                        </div>

                </div>
            </div>
    </main>
</body>
<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
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

</html>