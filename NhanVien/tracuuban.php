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
    <title>Tra cứu bàn</title>
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
        <a href="dsdonhang.php"><i class="fa fa-fw fa-sack-dollar w3-small"></i> &nbsp; Danh sách đơn hàng</a>
        <a class="active" href="tracuuban.php"><i class="fa fa-fw fa-magnifying-glass w3-small"></i> &nbsp; Tra cứu bàn</a>
        <!-- <a href="chuyenban.php"><i class="fa fa-fw fa-repeat w3-small"></i> &nbsp; Chuyển bàn</a> -->

    </div>
    <main id="main">
        <div style="padding-left:16px; padding-top:20px">
            <div class="container-fluid px-4">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mt-5"><b>Tra cứu bàn</b></h4>
                    </div>
                    <div class="col-md-6">

                        <!-- thanh search -->
                        <form class="navbar-form w3-right mt-5" method="post">
                            <?php
                            $khuvuc = "select * from khuvuc";
                            $kv = mysqli_query($conn, $khuvuc);

                            ?>
                            <div class="input-group">
                                <input id="myInput"  name="khuvuc" type="text" class="form-control" placeholder="Chọn khu vực" list="ide">

                                <datalist id="ide">
                                    <?php while ($k = mysqli_fetch_array($kv)) { ?>
                                        <option value="<?php echo $k['KV_TEN'] ?>"></option><?php } ?>
                                </datalist>
                                <div class="input-group-btn">
                                    <button name="timkiem" class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['timkiem'])) {
                            $noidung = $_POST['khuvuc'];
                        } else {
                            $noidung = false;
                        }

                        ?>

                    </div>
                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>
                <?php

                $query = "select * from ban a, khuvuc b where a.KV_MA=b.KV_MA and b.KV_TEN LIKE '%$noidung%'";
                $result = mysqli_query($conn, $query);
                ?>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr class="small">
                            <th>
                                <h5><b>Mã bàn</b></h5>
                            </th>
                            <th>
                                <h5><b>Tên bàn</b></h5>
                            </th>
                            <th>
                                <h5><b>Số chổ</b></h5>
                            </th>
                            <th>
                                <h5><b>Tình trạng</b></h5>
                            </th>
                            <th>
                                <h5><b>Khu vực</b></h5>
                            </th>
                          



                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php

                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td>
                                    <h5><?php echo $row['B_MA']; ?></h5>
                                </td>

                                <td>
                                    <h5><?php echo $row['B_TEN']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['B_SOCHO']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['B_TRANGTHAI']; ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo $row['KV_TEN']; ?></h5>
                                </td>
                              
                            </tr>
                        <?php } ?>
                    </tbody>

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
    $("#menu li a").click(function() {
        $(this).parent().parent().find("li").removeClass("active").removeClass("hover").addClass("hover");
        $(this).parent().removeClass("hover").addClass("active");
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


