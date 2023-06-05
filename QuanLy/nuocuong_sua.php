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
    <title>Quản lý sản phẩm</title>
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
        <a href="phancong.php"><i class="fa fa-fw fa-calendar w3-small"></i> &nbsp; Phân công nhân viên</a>
        <a href="calamviec.php"><i class="fa fa-fw fa-calendar-check w3-small"></i> &nbsp; Quản lý ca làm việc</a>
        <a href="luongnv.php"><i class="fa fa-fw fa-sack-dollar w3-small"></i> &nbsp; Tra cứu lương nhân viên</a>
        <a class="active" href="nuocuong.php"><i class="fa fa-fw fa-mug-hot w3-small"></i> &nbsp; Quản lý thức uống</a>
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

                    <h4 class="mt-5"><b>Cập nhật sản phẩm</b></h4>


                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>

                <!-- Form Thêm sản phẩm -->
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $sql_up = "select * from dongia d, ngay g, nuocuong n, loainuoc l 
                    WHERE d.NU_MA=n.NU_MA AND d.N_NGAY=g.N_NGAY AND l.LN_MA=n.LN_MA AND n.NU_MA='$id'";
                    $query_up = mysqli_query($conn, $sql_up);
                    $row_up = mysqli_fetch_assoc($query_up);
                }
                $danhmuc = mysqli_query($conn, "select * from loainuoc");
                $ngay = mysqli_query($conn, "select * from ngay");
                if (isset($_POST['btnsubmit'])) {
                    $inputMa = $_POST['inputMa'];
                    $inputTen = $_POST['inputTen'];
                    $inputLN = $_POST['inputLN'];
                    $inputMT = $_POST['inputMT'];
                    if (empty($_FILES['inputImg']['name'])) {
                        $image = $row_up['NU_HINHANH'];
                    } else {
                        $file = $_FILES['inputImg'];
                        $file_name = $file['name'];
                        move_uploaded_file($file['tmp_name'], '../image/' . $file['name']);
                        $image = $file_name;
                    }



                    // $sql2 = "UPDATE ngay SET N_NGAY='$inputNgay'";
                    // $result2 = mysqli_query($conn, $sql2) or die(" sql1 is failed" . mysqli_error($conn));

                    $sql1 = "UPDATE nuocuong SET NU_MA='$inputMa', LN_MA='$inputLN', 
                                NU_TEN='$inputTen', NU_HINHANH='$image', NU_MOTA= '$inputMT'  WHERE NU_MA ='$id' ";
                    $result1 = mysqli_query($conn, $sql1) or die(" sql2 is failed" . mysqli_error($conn));



                    // $gia = "UPDATE dongia SET NU_MA='$inputMa', N_NGAY='$inputNgay', DG_GIA='$inputGia' WHERE NU_MA ='$id' ";
                    // $result = mysqli_query($conn, $gia) or die(" sql is failed" . mysqli_error($conn));
                    // if ($result) {
                    //     header('Location: nuocuong.php');
                    // } else {
                    //     echo "Lỗi";
                    // }
                }



                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <!-- mã thức uống -->

                    <div class="form-group row">
                        <label for="inputMa" class="col-sm-4 col-form-label">
                            <h5><b>Mã thức uống</b></h5>
                        </label>
                        <div class="col-sm-8">

                            <input value="<?php echo $row_up['NU_MA']; ?>" type="text" class="form-control" name="inputMa" list="inputMa">


                        </div>
                    </div>

                    <!-- họ tên thức uống -->
                    <div class="form-group row">
                        <label for="inputTen" class="col-sm-4 col-form-label">
                            <h5><b>Tên thức uống</b></h5>
                        </label>
                        <div class="col-sm-8">
                            <input value="<?php echo $row_up['NU_TEN']; ?>" type="text" name="inputTen" class="form-control" id="inputTen" placeholder="Nhập tên thức uống">
                        </div>
                    </div>



                    <!-- vị trí chức vụ -->
                    <div class="form-group row">
                        <label for="inputLN" class="col-sm-4 col-form-label">
                            <h5><b>Loại nước</b></h5>
                        </label>
                        <div class="col-sm-8">
                            <select class="form-control" name="inputLN" id="inputLN">
                                <option value="" selected>-- Chọn loại --</option>
                                <?php foreach ($danhmuc as $key => $value) { ?>

                                    <option name="inputLN" id="inputLN" value="<?php echo $value['LN_MA']; ?>" <?php echo ($value['LN_MA'] == $row_up['LN_MA']) ? 'selected' : '' ?>>
                                        <?php echo $value['LN_TEN']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- căn cước công dân -->
                    <div class="form-group row">
                        <label for="inputImg" class="col-sm-4 col-form-label">
                            <h5><b>Hình ảnh</b></h5>
                        </label>
                        <div class="col-sm-8">
                            <input type="file" name="inputImg" class="form-control" accept=".png,.gif,.jpg,.jpeg" id="inputImg">
                            <img src="../image/<?php echo $row_up['NU_HINHANH'] ?>" alt="" width="100px;">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputMT" class="col-sm-4 col-form-label">
                            <h5><b>Mô tả</b></h5>
                        </label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="inputMT" id="inputMT" rows="5"><?php echo $row_up['NU_MOTA']; ?></textarea>
                        </div>
                    </div>



                    <button type="button" class="text-center btn btn-warning  w3-right" data-toggle="modal" data-target="#exampleModal">Cập nhật giá</button>


                    <button type="submit" class=" btn btn-primary  me-3 w3-right" name="btnsubmit">Lưu</button>


                </form>
                <a href="nuocuong.php"><button class="btn btn-danger me-3  w3-right">Thoát</button></a>

            </div>
        </div>
    </main>
    <!-- Modal -->
    <?php

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // Return current date from the remote server
    $date = date('Y-m-d h:i:s');
    $sanpham = mysqli_query($conn, "select * from nuocuong");
    if (isset($_POST["capnhatgia"])) {
        $inputNu = $_POST['inputNu'];
        $inputGia = $_POST["inputGia"];
        $inputNgay = $_POST["inputNgay"];

        $sql1 = "INSERT INTO ngay (N_NGAY) VALUE ('$inputNgay')";
        $result1 = mysqli_query($conn, $sql1) or die(" sql1 is failed" . mysqli_error($conn));

        $gia = "INSERT INTO dongia (NU_MA, N_NGAY, DG_GIA) VALUES ('$inputNu','$inputNgay','$inputGia')";
        $result = mysqli_query($conn, $gia) or die(" sql is failed" . mysqli_error($conn));
        if ($result) {
            echo "<script>window.open('nuocuong.php','_self')</script>";
        } else {
            echo "Lỗi";
        }
    }
    ?>
    <form method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Đặt món</h4>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                    </div>
                    <div class="modal-body">

                        <div class="form-group row">

                            <label for="inputNu" class="col-sm-4 col-form-label">
                                <h5><b>Sản phẩm</b></h5>
                            </label>
                            <div class="col-sm-8">

                                <input readonly value="<?php echo $row_up['NU_MA']; ?>" type="text" class="form-control" name="inputNu">

                            </div>
                        </div>

                        <div class="form-group">
                            <!-- đơn giá -->
                            <div class="form-group row">
                                <label for="inputGia" class="col-sm-4 col-form-label">Đơn giá</label>
                                <div class="col-sm-8">
                                    <input value="<?php echo  $row_up['DG_GIA']; ?>" type="number" class="form-control" name="inputGia">
                                </div>
                            </div>
                            <!--ngay -->

                            <div class="form-group row">
                                <label for="inputNgay" class="col-sm-4 col-form-label">Ngày cập nhật</label>
                                <div class="col-sm-8">
                                    <input value="<?php echo $date ?>" type="datetime-local" class="form-control" name="inputNgay" list="inputNgay">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="capnhatgia" class="btn btn-primary">Lưu</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
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