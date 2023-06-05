<?php include_once '../condb/condb.php'; ?>
<?php
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: dangnhap.php');
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
    <title>Hồ sơ cá nhân</title>
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

    <!--  -->
    <div class="topnav ">
        <a href="trangchu.php"><img src="../image/logochu.png" width="250px"></a>
        <!-- Sidebar Toggle-->
        <button class="openbtn btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" onclick=" myFunction()"><i class="fa fa-bars icon"></i></button>

        <!-- <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div> -->
        <div class="w3-right">
            <a class="btn btn-outline-secondary text-white mt-1"><?php echo $rows['NV_HOTEN'];  ?></button>

                <div class="w3-right">
                    <a href="dangxuat.php" class="btn btn-outline-secondary mt-1 text-white">Đăng xuất</a>
                </div>
        </div>

    </div>

    <div class="sidenav" id="mySidebar">
        <!-- <a href="trangchu.php"><i class="fa fa-fw fa-home w3-small"></i> &nbsp; Trang chủ</a> -->
        <a class="active" href="hoso.php"><i class="fa fa-fw fa-user w3-small"></i> &nbsp; Thông tin tài khoản</a>
        <a href="menu.php"><i class="fa fa-fw fa-eye w3-small"></i> &nbsp; Tạo đơn hàng</a>
        <a href="dsdonhang.php"><i class="fa fa-fw fa-sack-dollar w3-small"></i> &nbsp; Danh sách đơn hàng</a>
        <a href="tracuuban.php"><i class="fa fa-fw fa-magnifying-glass w3-small"></i> &nbsp; Tra cứu bàn</a>
        <!-- <a href="chuyenban.php"><i class="fa fa-fw fa-repeat w3-small"></i> &nbsp; Chuyển bàn</a> -->

    </div>
    <main id="main">
        <div style="padding-left:16px; padding-top:20px">
            <div class="container-fluid px-4">


                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-5"><b>Thông tin nhân viên</b></h4>
                    </div>
                    <div class="col-md-6">

                        <a href="hoso_sua.php?id=<?php echo $rows['NV_MA'];  ?>"> <button class="mt-5 btn btn-success w3-right" style="margin-bottom:10px"><i class="fa fa-pencil-square text-white small"></i> Cập nhật</button> </a>
                        <!-- -->



                    </div>
                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Mã nhân viên</b></h5>
                            </label>
                            <h5> <input disabled name="ma" value=" <?php echo $rows['NV_MA'];  ?>" readonly class="form-control" type="text"></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Vị trí</b></h5>
                            </label>
                            <h5> <input disabled name="cv" value=" <?php echo $rows['CV_MA'];
                                                                    echo " - ";
                                                                    echo $rows['CV_TEN'] ?>" readonly class="form-control" type="text"></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Họ và tên</b></h5>
                            </label>
                            <h5> <input disabled name="ten" value=" <?php echo $rows['NV_HOTEN']; ?>" class="form-control" type="text"></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Mật khẩu</b></h5>
                            </label>
                            <h5> <input disabled name="pass" value=" <?php echo $rows['NV_PASSWD']; ?>" class="form-control" type="text"></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>CCCD</b></h5>
                            </label>
                            <h5><input disabled value=" <?php echo $rows['NV_CCCD']; ?>" name="cccd" class="form-control" type="text" placeholder="Name"> </h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Ngày sinh</b></h5>
                            </label>
                            <h5> <input disabled value=" <?php echo $rows['NV_NGAYSINH']; ?>" name="ngaysinh" class="form-control" type="text"> </h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Giới tính</b></h5>
                            </label>
                            <h5> <input disabled value=" <?php echo $rows['NV_GIOITINH']; ?>" name="gtinh" class="form-control" type="text"></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Số điện thoại</b></h5>
                            </label>
                            <h5> <input disabled value=" <?php echo $rows['NV_SDT']; ?>" name="sdt" class="form-control" type="text"></h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Email</b></h5>
                            </label>
                            <h5> <input disabled value=" <?php echo $rows['NV_EMAIL']; ?>" name="email" class="form-control" type="email"> </h5>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="inputs"> <label>
                                <h5><b>Ngày vào làm</b></h5>
                            </label>
                            <h5> <input disabled value=" <?php echo $rows['NV_NGAYVAOLAM']; ?>" name="ngaylam" class="form-control" type="text"></h5>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-inputs"> <label>
                                <h5><b>Địa chỉ</b></h5>
                            </label> <input disabled value=" <?php echo $rows['NV_DIACHI']; ?>" name="dchi" class="form-control" type="text"> </div>
                    </div>
                </div>


                <!-- <div class="mt-3 gap-2 d-flex justify-content-end"> 
                <button class="px-3 btn btn-sm btn-outline-primary">Cancel</button> 
                <button class="px-3 btn btn-sm btn-primary">Save</button> 
            </div> -->

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