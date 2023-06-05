<?php include_once '../condb/condb.php'; ?>
<?php
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: dangnhap.php');
}
$user = (isset($_SESSION['username'])) ? $_SESSION['username'] : [];

?>
<?php

$sql_up = "SELECT * FROM nhanvien where NV_MA='$user'";
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
    <title>Đặt món</title>
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
                        <h4 class="mt-5"><b>Đặt món</b></h4>
                    </div>

                    <hr style="height:3px;border-width:1px;color:gray;background-color:black">
                </div>
                <?php

                if (isset($_POST['submit_luu'])) {
                    $tang = $_POST['tang'];
                    $manv = $_POST['manv'];
                    $ngaylap =  $_POST['ngaylap'];
                    $ban = $_POST['ban'];
                    $numa = $_POST['numa'];
                    $quantity = $_POST['quantity'];
                    if(empty($_POST['madonhang'])) {
                        echo "<script>alert('Chưa nhập mã đơn hàng!!!')</script>";
                    }else{
                        $madh = $_POST['madonhang'];

                        //insert donhang
                        $sql_dh = mysqli_query($conn, "INSERT INTO donhang (DH_MA, NV_MA, DH_NGAYLAP) VALUES ('$madh',
                    '$manv','$ngaylap')");

                        //insert ban_donhang
                        $sql_b=mysqli_query($conn,"INSERT INTO ban_donhang (B_MA, DH_MA) VALUES ('$ban','$madh')");
                        if(isset($sql_b)){
                            $update=mysqli_query($conn,"UPDATE ban SET B_TRANGTHAI='Có khách' WHERE B_MA='$ban'");
                        }
                        //insert chitetdonhang
                        $all_numa = $_POST["numa"];
                        $all_quantity = $_POST['quantity'];
                        for ($x = 0; $x < count($all_numa); $x++) {
                            $sql_ctdh=mysqli_query($conn,"INSERT INTO chitietdonhang (NU_MA,DH_MA,CTDH_SOLUONG) VALUES ('$all_numa[$x]','$madh','$all_quantity[$x]')");
                            header("Location: dsdonhang.php");
                        }

                    }
                 

                }

                ?>

                <form action="" method="post">
                    <div class="row">
                        <input type="hidden" value="<?php echo $rows['NV_MA']; ?>" name="manv">

                        <div class="col-sm">
                            <div class="inputs">
                                <label>
                                    <h5><b>Khu vực  <span class="text-danger">(*)</span></b></h5>
                                </label>

                                <select require name="tang" id="tang" class="form-control tang" aria-label=".form-select-lg example" style="height: 35px">
                                    <option selected>Chọn khu vực</option>

                                    <?php
                                    $sql_ot = "select * from khuvuc";
                                    $query_ot = mysqli_query($conn, $sql_ot);
                                    $nums = mysqli_num_rows($query_ot);
                                    if ($nums > 0) {


                                        foreach ($query_ot as $key => $value) { ?>
                                            <option value="<?php echo $value['KV_MA']; ?>" name="tang" id="tang"><?php echo $value['KV_TEN']; ?></option>
                                    <?php }
                                    } ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-sm">
                            <div class="inputs"> <label>
                                    <h5><b>Bàn  <span class="text-danger">(*)</span></b></h5>
                                </label>
                                <select name="ban" id="ban" class="form-control ban" aria-label=".form-select-lg example" style="height: 35px">
                                    <option selected>Chọn bàn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="inputs">
                                <label>
                                    <h5><b>Mã đơn hàng <span class="text-danger">(*)</span></b></h5>
                                </label>
                                <input require name="madonhang" class="form-control" type="text" style="height: 35px">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="inputs"> <label>
                                    <h5><b>Ngày lập hóa đơn</b></h5>
                                </label> <input type="date" name="ngaylap" value="<?php echo date("Y-m-d"); ?>" class="form-control" style="height: 35px"> </div>
                        </div>
                    </div>



            

                <div class="d-flex mx-auto justify-content-center gap-2 mt-3">
                    <a href="menu.php">
                        <div class="btn btn-danger">Quay về</div>
                    </a>
                    <button type="submit" name="submit_luu" class="btn btn-success">Lưu</button>
                </div>
            
        
            <table class="table table-bordered table-hover mt-3">
                <thead class="table-light">
                    <tr class="small text-center">
                        <th>
                            <h5><b>STT</b></h5>
                        </th>
                        <th>
                            <h5><b>Sản phẩm</b></h5>
                        </th>
                        <th>
                            <h5><b>Đơn giá (VNĐ)</b></h5>
                        </th>
                        <th>
                            <h5><b>Số lượng</b></h5>
                        </th>
                        <th>
                            <h5><b>Thành tiền (VNĐ)</b></h5>
                        </th>




                    </tr>
                </thead>
                <?php
                if (isset($_POST["submit"])) {
                    $soluong = 1;
                    $all_id = $_POST["menu"];
                    $ex = implode("','", $all_id);
                    $sql = "select * from dongia d, nuocuong n
                                    WHERE d.NU_MA=n.NU_MA AND n.NU_MA IN ('$ex')";
                    // echo($sql);
                    $result = mysqli_query($conn, $sql);
                }


                ?>
                <tbody>
                    <?php
                    $tong = 0;
                    $i = 0;
                    foreach ($result as $key => $row) {
                        $i += 1;
                        $thanhtien = (int) $row["DG_GIA"] * (int) $soluong;
                        $tong += $thanhtien;

                    ?>

                        <tr class="text-center">
                            <td width="20px">
                                <h5>
                                    <?php echo $i; ?>
                                    <input type="hidden" name="stt" value="<?php echo $i; ?>">
                                </h5>
                            </td>
                            <td>
                                <h5>
                                    <?php echo $row['NU_TEN']; ?>
                                    <input type="hidden" name="numa[]" value="<?php echo $row['NU_MA']; ?>">
                                </h5>
                            </td>

                            <td>
                                <h5>
                                    <?php echo $row['DG_GIA'] ?>
                                    <input type="hidden" name="gia" class="price" disabled value="<?php echo $row['DG_GIA'] ?>">
                                </h5>


                            </td>
                            <td>
                                <h5>
                                    <input class="quantity" type="number" name="quantity[]" value="<?php echo $soluong ?>" min="1" max="10">
                                </h5>

                            </td>
                            <td>
                                <h5><input name="thanhtien" disabled class="total" value="<?php echo $thanhtien ?>"></h5>
                            </td>

                        </tr>

                    <?php } ?>
                    <h5>Tổng tiền: <input name="tong" disabled id="total_price" value="<?php echo  $tong; ?>"> VNĐ</h5>


                </tbody>

            </table>
            </form>

        </div>
        </div>
    </main>

</body>
<script>
    // Cập nhật số lượng
    var price = document.getElementsByClassName('price');
    var quantity = document.getElementsByClassName('quantity');
    var total = document.getElementsByClassName('total');
    var total_price = document.getElementById('total_price');

    function subTotal() {
        var tong_tt = 0;
        for (i = 0; i < price.length; i++) {
            var a = parseInt(price[i].value) * parseInt(quantity[i].value);
            total[i].value = a + "";
            tong_tt = tong_tt + a;
        }
        total_price.value = tong_tt + "";
    }

    // end cập nhật số lượng
    // combobox bàn và khu vực
    $(document).ready(function() {
        $(".tang").change(function() {
            var id = $(".tang").val();
            $.post("data.php", {
                id: id
            }, function(data) {
                $(".ban").html(data);
            })
        });
        $(".quantity").change(function() {
            subTotal();
        });
    })
    // end combobox


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