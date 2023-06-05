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
    <title>Phân công làm việc</title>
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
        <a href="nhanvien.php"><i class="fa fa-fw fa-users w3-small"></i> &nbsp; Quản lý nhân viên</a>
        <a href="chucvu.php"><i class="fa fa-fw fa-calendar-check w3-small"></i> &nbsp; Quản lý chức vụ</a>
        <a class="active" href="phancong.php"><i class="fa fa-fw fa-calendar w3-small"></i> &nbsp; Phân công nhân viên</a>
        <a href="calamviec.php"><i class="fa fa-fw fa-calendar-check w3-small"></i> &nbsp; Quản lý ca làm
            việc</a>
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
                        <h4 class="mt-5"><b>Danh sách phân công</b></h4>
                    </div>
                    <div class="col-md-6">


                        <a href="phancong_them.php"><button class="mt-5 btn btn-primary w3-right" style="margin-bottom:10px"><i class="fa fa-plus text-white small"></i>
                                Thêm</button></a>

                    </div>
                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>


                <!-- thanh search -->
                <div style="margin-right: -15px; ">
                    <form method="post" class="navbar-form  w3-right search">
                        <div class="input-group">
                            <input  id="myInput" name="noidung" type="search" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button name="timkiem" class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['timkiem'])) {
                    $noidung = $_POST['noidung'];
                } else {
                    $noidung = false;
                }
                ?>

                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr class="small">
                            <th>
                                <h5><b>Nhân viên</b></h5>
                            </th>
                            <th>
                                <h5><b>Ca</b></h5>
                            </th>
                            <th>
                                <h5><b>Ngày làm</b></h5>
                            </th>
                            <th>
                                <h5><b>Số tiền </b></h5>
                            </th>
                            <th>
                                <h5><b>Chức năng</b></h5>
                            </th>



                        </tr>
                    </thead>
                    <?php
                    $query = "select * from phancong a, nhanvien b, ngaylam c, sotien d, calamviec e
                     where a.NV_MA=b.NV_MA AND a.NL_NGAY=c.NL_NGAY AND d.NL_NGAY=c.NL_NGAY AND
                     d.CLV_MA=e.CLV_MA AND e.CLV_TEN LIKE '%$noidung%'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tbody  id="myTable">
                            <tr>
                                <td>
                                    <h5><?php echo $row['NV_HOTEN']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['CLV_TEN']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['NL_NGAY']; ?></h5>
                                </td>
                                <td>

                                    <h5><?php echo number_format($row['ST_TIEN'], 0, ',', '.');
                                        echo ' VNĐ' ?></h5>
                                </td>
                                <td class="w3-center" width="150px">
                                    <h5><a href="phancong_xoa.php?id=<?php echo $row['id']; ?>"  onclick="return confirm('Bạn có thực sự muốn xóa?')"><button class="btn btn-danger"><i class="fa fa-trash small text-white"></i></button></a></h5>

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