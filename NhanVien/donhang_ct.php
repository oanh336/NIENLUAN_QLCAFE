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
    <title>Chi tiết đơn hàng</title>
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
        <a href="hoso.php"><i class="fa fa-fw fa-user w3-small"></i> &nbsp; Thông tin tài khoản</a>
        <a href="menu.php"><i class="fa fa-fw fa-eye w3-small"></i> &nbsp; Tạo đơn hàng</a>
        <a class="active" href="dsdonhang.php"><i class="fa fa-fw fa-sack-dollar w3-small"></i> &nbsp; Danh sách đơn hàng</a>
        <a href="tracuuban.php"><i class="fa fa-fw fa-magnifying-glass w3-small"></i> &nbsp; Tra cứu bàn</a>
        <!-- <a class="active" href="chuyenban.php"><i class="fa fa-fw fa-repeat w3-small"></i> &nbsp; Chuyển bàn</a> -->

    </div>
    <main id="main">
        <div style="padding-left:16px; padding-top:20px">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-5"><b>Chi tiết đơn hàng</b></h4>
                    </div>
                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h5><b>Sản phẩm</b></h5>
                            </th>
                            <th>
                                <h5><b>Đơn giá</b></h5>
                            </th>
                            <th>
                                <h5><b>Số lượng</b></h5>
                            </th>
                            <th>
                                <h5><b>Thành tiền</b></h5>
                            </th>
                        </tr>
                    </thead>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = mysqli_query($conn, "select * from ban_donhang f, donhang a, chitietdonhang b, dongia c, nuocuong d 
                        where f.DH_MA=a.DH_MA and c.NU_MA=d.NU_MA and b.NU_MA=d.NU_MA and a.DH_MA=b.DH_MA and a.DH_MA='$id'");
                    }
                    ?>
                    <tbody>
                        <?php
                        $tongsotien = 0;

                        $pos = 1;
                        $tongsotien = 0;
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $tongsotien += $row['CTDH_SOLUONG'] * $row['DG_GIA'];
                        ?>
                            <tr>

                                <td>
                                    <h5><img class="group list-group-image img-circle" src="../image/<?php echo $row['NU_HINHANH']; ?>" style="width:50px; height:45px">
                                    &nbsp;<?php echo $row['NU_TEN'] ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo number_format(($row['DG_GIA']), 0, ",", ".") ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['CTDH_SOLUONG'] ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo number_format(($row['CTDH_SOLUONG'] * $row['DG_GIA']), 0, ",", ".") ?></h5>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><h5><b>Tổng cộng</b></h5></td>
                            <td><h5><?php echo number_format(($tongsotien), 0, ",", ".") ?></h5></td>
                        </tr>
                    </tbody>
                </table>
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