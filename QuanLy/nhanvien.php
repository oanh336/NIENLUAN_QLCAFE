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
    <title>Quản lý nhân viên</title>
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
        <a class="active" href="nhanvien.php"><i class="fa fa-fw fa-users w3-small"></i> &nbsp; Quản lý nhân viên</a>
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
        <div style="padding-left:15px; padding-top:20px">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-5"><b>Quản lý nhân viên</b></h4>
                    </div>
                    <div class="col-md-6">
                        <a href="nhanvien_them.php"><button class="mt-5 btn btn-primary w3-right" style="margin-bottom:10px"><i class="fa fa-plus text-white small"></i>
                                Thêm</button></a>

                    </div>
                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>


                <!-- thanh search -->
                <div style="margin-right: -15px; ">
                    <form method="post" class="navbar-form  w3-right search">
                        <div class="input-group">
                            <input id="myInput" name="noidung" type="search" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button name="timkiem" class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <h5>Tổng nhân viên:
                    <?php
                    if (isset($_POST['timkiem'])) {
                        $noidung = $_POST['noidung'];
                    } else {
                        $noidung = false;
                    }
                    ?>
                    <?php
                    $sql = "SELECT * FROM nhanvien";
                    //thuc thi cau lenh sql va dua doi tuong vao $result
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        //load du lieu moi len dua vao bien result
                        $result = $conn->query($sql);
                        $result_all = $result->fetch_all();
                        $rowcount = mysqli_num_rows($result);
                        printf("%d", $rowcount);
                        // Free result set
                        mysqli_free_result($result);
                    }
                    ?>
                </h5>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr class="small">
                            <th>
                                <h5><b>Mã</b></h5>
                            </th>
                            <th>
                                <h5><b>Họ và tên</b></h5>
                            </th>
                            <th>
                                <h5><b>CCCD</b></h5>
                            </th>
                            <th>
                                <h5><b>Ngày sinh</b></h5>
                            </th>
                            <th>
                                <h5><b>Giới tính</b></h5>
                            </th>
                            <th>
                                <h5><b>Số điện thoại</b></h5>
                            </th>
                            <th>
                                <h5><b>Email</b></h5>
                            </th>
                            <th>
                                <h5><b>Địa chỉ</b></h5>
                            </th>
                            <th>
                                <h5><b>Ngày vào làm</b></h5>
                            </th>
                            <th>
                                <h5><b>Vị trí</b></h5>
                            </th>
                            <th>
                                <h5><b>Chức năng</b></h5>
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $query = "select * from nhanvien, chucvu where chucvu.CV_MA=nhanvien.CV_MA AND NV_HOTEN LIKE '%$noidung%'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody id="myTable">
                            <tr>
                                <td>
                                    <h5><?php echo $row['NV_MA']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NV_HOTEN']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NV_CCCD']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NV_NGAYSINH']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NV_GIOITINH']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NV_SDT']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NV_EMAIL']; ?></h5>
                                </td>
                                <td width="100px">
                                    <h5><?php echo $row['NV_DIACHI']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NV_NGAYVAOLAM']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['CV_TEN']; ?></h5>
                                </td>
                                <td class="w3-center" width="98px">

                                    <a href="nhanvien_sua.php?id=<?php echo $row['NV_MA']; ?>"><button class="btn btn-success me-0"><i class="fa fa-pen-to-square small"></i></button></a>
                                    <a href="nhanvien_xoa.php?id=<?php echo $row['NV_MA']; ?>"  onclick="return confirm('Bạn có thực sự muốn xóa?')"><button class="btn btn-danger"><i class="fa fa-trash small"></i></button></a>

                                </td>
                            </tr>

                        </tbody>
                    <?php } ?>
                </table>

            </div>
        </div>
    </main>
</body>
<script>
    // search
     // Search
     $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
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