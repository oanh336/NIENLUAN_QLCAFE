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
                    <h4 class="mt-5"><b>Cập nhật nhân viên</b></h4>


                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>

                <!-- Form Thêm sản phẩm -->
                <?php
                ob_start();
                $sql = "select * from chucvu";
                $result = mysqli_query($conn, $sql);


                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql_up = "SELECT * from nhanvien where NV_MA='$id'";
                    $query_up = mysqli_query($conn, $sql_up);
                    $row_up = mysqli_fetch_assoc($query_up);
                }
                if (isset($_POST['inputMa'])) {
                    $sql = "UPDATE nhanvien SET NV_MA='" . $_POST["inputMa"] . "',CV_MA='" . $_POST["inputCV"] . "',NV_PASSWD='" . $_POST["inputPass"] . "'
        ,NV_HOTEN='" . $_POST["inputTen"] . "',NV_CCCD='" . $_POST["inputCCCD"] . "',NV_NGAYSINH='" . $_POST["inputNS"] . "',
        NV_GIOITINH='" . $_POST["inputGT"] . "',NV_SDT='" . $_POST["inputSDT"] . "',NV_EMAIL='" . $_POST["inputEmail"] . "',
        NV_DIACHI='" . $_POST["inputDC"] . "',NV_NGAYVAOLAM='" . $_POST["inputNgay"] . "' WHERE NV_MA ='$id' ";



                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>window.open('hoso.php','_self')</script>";
                    } else {
                        echo "Lỗi";
                    }
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <!-- mã nhân viên -->
                    <div class="form-group row">
                        <label for="inputMa" class="col-sm-2 col-form-label">
                            <h5><b>Mã nhân viên</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_MA']; ?>" type="text" name="inputMa" class="form-control" id="inputMa" placeholder="Nhập mã nhân viên">
                        </div>
                    </div>
                    <!-- họ tên nhân viên -->
                    <div class="form-group row">
                        <label for="inputTen" class="col-sm-2 col-form-label">
                            <h5><b>Họ và tên</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_HOTEN']; ?>" type="text" name="inputTen" class="form-control" id="inputTen" placeholder="Nhập họ và tên nhân viên">
                        </div>
                    </div>
                    <!-- họ tên nhân viên -->
                    <div class="form-group row">
                        <label for="inputPass" class="col-sm-2 col-form-label">
                            <h5><b>Mật khẩu</b></h5>
                        </label>
                        <div class="col-sm-10">
                        <div class="input-container">
                                <input value="<?php echo $row_up['NV_PASSWD']; ?>" type="password" name="inputPass" class="form-control input-field" id="inputPass">
                                <button class="input-group-text mt-3"  id="toggleBtn" type="button" onclick="togglePassword()" >Hiện mật khẩu</button>
                        
                            </div>               
                        </div>
                    </div>
                    <!-- căn cước công dân -->
                    <div class="form-group row">
                        <label for="inputCCCD" class="col-sm-2 col-form-label">
                            <h5><b>CCCD</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_CCCD']; ?>" type="number" name="inputCCCD" class="form-control" id="inputCCCD" placeholder="Nhập căn cước công dân">
                        </div>
                    </div>
                    <!-- ngày sinh -->
                    <div class="form-group row">
                        <label for="inputNS" class="col-sm-2 col-form-label">
                            <h5><b>Ngày sinh</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_NGAYSINH']; ?>" type="date" name="inputNS" class="form-control" id="inputNS" placeholder="Nhập ngày sinh">
                        </div>
                    </div>
                    <!-- giới tính -->
                    <div class="form-group row">
                        <label for="inputGT" class="col-sm-2 col-form-label">
                            <h5><b>Giới tính</b></h5>
                        </label>
                        <div class="col-sm-10">

                            <label class="radio-inline"><input value="Nam" type="radio" name="inputGT" <?php if ($row_up['NV_GIOITINH'] == 'Nam') {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <h5><b>Nam</b></h5>
                            </label>
                            <label class="radio-inline"><input value="Nữ" type="radio" name="inputGT" <?php if ($row_up['NV_GIOITINH'] == 'Nữ') {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                                <h5><b>Nữ</b></h5>
                            </label>

                        </div>
                    </div>
                    <!-- số điện thoại -->
                    <div class="form-group row">
                        <label for="inputSDT" class="col-sm-2 col-form-label">
                            <h5><b>Số điện thoại</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_SDT']; ?>" type="number" name="inputSDT" class="form-control" id="inputSDT" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <!-- email -->
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">
                            <h5><b>Email</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_EMAIL']; ?>" type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Nhập email">
                        </div>
                    </div>
                    <!-- địa chỉ -->
                    <div class="form-group row">
                        <label for="inputDC" class="col-sm-2 col-form-label">
                            <h5><b>Địa chỉ</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_DIACHI']; ?>" type="text" name="inputDC" class="form-control" id="inputDC" placeholder="Nhập địa chỉ">
                        </div>
                    </div>

                    <!-- địa chỉ -->
                    <div class="form-group row">
                        <label for="inputNgay" class="col-sm-2 col-form-label">
                            <h5><b>Ngày vào làm</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <input value="<?php echo $row_up['NV_NGAYVAOLAM']; ?>" type="date" name="inputNgay" class="form-control" id="inputDC" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <!-- vị trí chức vụ -->
                    <div class="form-group row">
                        <label for="inputCV" class="col-sm-2 col-form-label">
                            <h5><b>Vị trí</b></h5>
                        </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="inputCV" id="inputCV">

                                <?php foreach ($result as $key => $value) { ?>
                                    <option value="<?php echo $value['CV_MA']; ?>" <?php echo ($value['CV_MA'] == $row_up['CV_MA']) ? 'selected' : '' ?> name="inputCV" id="inputCV"><?php echo $value['CV_TEN']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w3-right" name="luu">Lưu</button>

                </form>
                <a href="nhanvien.php"><button class="btn btn-danger w3-right me-2" name="btnsubmit">Thoát</button></a>
            </div>
        </div>
    </main>
    
</body>
<script>
    // Hiển thị mật khẩu
    function togglePassword() {
	var upass = document.getElementById('inputPass');
	var toggleBtn = document.getElementById('toggleBtn');
	if(upass.type == "password"){
		upass.type = "text";
		toggleBtn.value = "Hide Password Characters";
	} else {
		upass.type = "password";
		toggleBtn.value = "Show Password Characters";
	}
}
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