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
    <title>Xem menu</title>
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
        <a class="active" href="menu.php"><i class="fa fa-fw fa-eye w3-small"></i> &nbsp; Tạo đơn hàng</a>
        <a href="dsdonhang.php"><i class="fa fa-fw fa-sack-dollar w3-small"></i> &nbsp; Danh sách đơn hàng</a>
        <a href="tracuuban.php"><i class="fa fa-fw fa-magnifying-glass w3-small"></i> &nbsp; Tra cứu bàn</a>
        <!-- <a href="chuyenban.php"><i class="fa fa-fw fa-repeat w3-small"></i> &nbsp; Chuyển bàn</a> -->

    </div>
    <main id="main">
        <div style="padding-left:16px; padding-top:20px">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-5"><b>Danh sách menu</b></h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end search">

                            <!-- thanh search -->
                            <form class="navbar-form mt-5" method="post">
                                <?php
                                $loainuoc = "select * from loainuoc";
                                $ln = mysqli_query($conn, $loainuoc);

                                ?>
                                <div class="input-group">
                                    <input id="myInput"  name="content" type="text" class="form-control" placeholder="Chọn danh mục" list="ide">

                                    <datalist id="ide">
                                        <?php while ($l = mysqli_fetch_array($ln)) { ?>
                                            <option value="<?php echo $l['LN_TEN'] ?>"></option><?php } ?>
                                    </datalist>
                                    <div class="input-group-btn">
                                        <button name="timkiem" class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <form action="datmon.php" method="post">

                                <button type="submit" name="submit" class="btn btn-success mt-5" style="margin-bottom:10px">Đặt món</buttons>


                                    <?php
                                    if (isset($_POST['timkiem'])) {
                                        $noidung = $_POST['content'];
                                    } else {
                                        $noidung = false;
                                    }
                                    ?>
                        </div>
                    </div>

                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>
                <?php
                $query="select n.NU_MA, n.NU_TEN, n.NU_HINHANH, l.LN_TEN, d.DG_GIA from nuocuong n 
                inner join loainuoc l on l.LN_MA=n.LN_MA AND l.LN_TEN LIKE '%$noidung%'
                inner join (select max(N_NGAY) as ngaymax, NU_MA from dongia GROUP BY NU_MA) ng on ng.NU_MA = n.NU_MA 
                inner join dongia d on d.NU_MA = n.NU_MA and ng.ngaymax = d.N_NGAY";
                $result = mysqli_query($conn, $query);
                ?>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr class="small">
                            <th>
                                <h5><b>Sản phẩm</b></h5>
                            </th>
                            <th>
                                <h5><b>Loại sản phẩm</b></h5>
                            </th>
                            <th>
                                <h5><b>Đơn giá</b></h5>
                            </th>
                            <th>
                                <h5><b>Hình ảnh</b></h5>
                            </th>
                            <th>
                                <h5><b>Chọn</b></h5>
                            </th>


                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>

                                    <h5><?php echo $row["NU_TEN"] ?></h5>
                                </td>

                                <td>
                                    <h5><?php echo $row["LN_TEN"] ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo number_format($row['DG_GIA'], 0, ',', '.');
                                        echo ' VNĐ' ?></h5>
                                </td>
                                <td>
                                    <h5><img class="group list-group-image img-circle" src="../image/<?php echo $row['NU_HINHANH']; ?>" style="width:50px; height:45px"></h5>
                                </td>
                                <td class="w3-center" width="50px">

                                    <div class="form-check">
                                        <input onclick="myClick()" class="form-check-input" type="checkbox" name="menu[]" value="<?php echo $row["NU_MA"] ?>" id="flexCheckDefault">
                                    </div>
                                    <input type="hidden" name="sanpham" value="<?php echo $row["NU_MA"] ?>">

                                    <input type="hidden" name="price" value="<?php echo number_format($row['DG_GIA'], 0, ',', '.');
                                                                                echo ' VNĐ' ?>">

                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
                </form>
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
    // chọn món
    function myClick() {

    }
    // end

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