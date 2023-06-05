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
    <title>Quản lý cửa hàng</title>
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
            <a href="cuahang.php" class="btn btn-outline-secondary mt-1 text-white"><i class="fa fa-comment"></i>Tin nhắn</a>
            <div class="w3-right">
                <a href="cuahang.php" class=" active btn btn-outline-secondary mt-1 text-white">Cửa hàng</a>
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
                    <div class="col-md-6">
                        <h4 class="mt-5"><b>Thông tin cửa hàng</b></h4>
                    </div>
                    <!-- <div class="col-md-6">

                        <button class="mt-5 btn btn-success w3-right"><a href="cuahang_sua.php?id=<?php echo $row['CH_MA']; ?>"><i class="fa fa-pencil-square text-white small"></i>
                                Cập nhật</a></button>


                    </div> -->
                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>

                <?php
                $query = "select * from cuahang";
                $query_up = mysqli_query($conn, $query);
                $row_up = mysqli_fetch_assoc($query_up);

                if (isset($_POST['name'])) {

                    $name = $_POST['name'];

                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];

                    $sql = "UPDATE cuahang SET CH_TEN='$name', 
                        CH_SDT='$phone', CH_EMAIL='$email', CH_DIACHI='$address'";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>window.open('cuahang.php','_self')</script>";
                    } else {
                        echo "Lỗi";
                    }
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <h5><b>Tên quán</b></h5>

                        </div>

                        <div class="col-md-8">
                            <h5><input value="<?php echo $row_up['CH_TEN']; ?>" type="text" class="form-control" id="name" name="name"></h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">

                            <h5><b>Chủ nhà hàng</b></h5>

                        </div>

                        <div class="col-md-8">
                            <h5><input readonly value="<?php echo $row_up['CH_CHUQUAN']; ?>" type="text" class="form-control mt-4" id="owner" name="owner"></h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5><b>Điện thoại</b></h5>
                        </div>

                        <div class="col-md-8">
                            <h5><input value="<?php echo $row_up['CH_SDT']; ?>" type="number" class="form-control mt-4" id="phone" name="phone"></h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5><b>Email</b></h5>
                        </div>

                        <div class="col-md-8">
                            <h5><input value="<?php echo $row_up['CH_EMAIL']; ?>" type="email" class="form-control mt-4" id="email" name="email"></h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5><b>Địa chỉ</b></h5>
                        </div>

                        <div class="col-md-8">
                            <h5><input value="<?php echo $row_up['CH_DIACHI']; ?>" type="text" class="form-control mt-4" id="address" name="address"></h5>
                        </div>

                    </div>
                    <button class="mt-5 btn btn-success w3-right"><i class="fa fa-pencil-square text-white small"></i> Cập nhật</button>
                </form>

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