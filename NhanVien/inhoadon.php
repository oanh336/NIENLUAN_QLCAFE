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

</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tohoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 11cm;
        overflow: hidden;
        min-height: 150mm;
        padding: 1cm;
        margin-left: auto;
        margin-right: auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    @page {
        size: A4;
        margin: 0;
    }

    button {
        width: 100px;
        height: 24px;
    }

    .header {
        overflow: hidden;
    }

    .logo {
        background-color: #FFFFFF;
        text-align: left;
        float: left;
    }



    .title {
        text-align: center;
        position: relative;
        color: #000;
        font-size: 12px;
        top: 1px;
        font-weight: bold;

    }

    .addr {
        text-align: center;
        position: relative;
        color: #000;
        font-size: 10px;
    }

    .footer-left {
        position: relative;
        width: 50%;
        color: #000;
        float: left;
        font-size: 10px;
        bottom: 5px;
        line-height: 15px;
    }

    .TableData {
        background: #ffffff;
        font: 11px;
        width: 100%;
        border-collapse: collapse;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 10px;
        border: thin solid #d3d3d3;
    }

    .TableData TH {
        background: rgba(0, 0, 255, 0.1);
        text-align: center;
        font-weight: bold;
        color: #000;
        border: solid 1px #ccc;
        height: 24px;
    }

    .TableData TR {
        height: 24px;
        border: thin solid #d3d3d3;
    }

    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;
        border: thin solid #d3d3d3;
    }

    .TableData TR:hover {
        background: rgba(0, 0, 0, 0.05);
    }

    .TableData .cotSTT {
        text-align: center;
        width: 10%;
    }

    .TableData .cotTenSanPham {
        text-align: left;
        width: 40%;
    }

    .TableData .cotHangSanXuat {
        text-align: left;
        width: 20%;
    }

    .TableData .cotGia {
        text-align: right;
        width: 120px;
    }

    .TableData .cotSoLuong {
        text-align: center;
        width: 50px;
    }

    .TableData .cotSo {
        text-align: right;
        width: 120px;
    }

    .TableData .tong {
        text-align: right;
        font-weight: bold;
        text-transform: uppercase;
        padding-right: 4px;
        font-size: 8px;
    }

    .TableData .cotSoLuong input {
        text-align: center;
    }

    @media print {
        @page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>

<body onload="window.print();">
    <div id="page" class="page">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = mysqli_query($conn, "select * from ban_donhang f, donhang a, chitietdonhang b, dongia c, nuocuong d 
    where f.DH_MA=a.DH_MA and c.NU_MA=d.NU_MA and b.NU_MA=d.NU_MA and a.DH_MA=b.DH_MA and a.DH_MA='$id'");
        }
        $nv = $rows['NV_MA'];


        $insert = mysqli_query($conn, "INSERT INTO hoadon (NV_MA, DH_MA, HD_NGAYMUA) VALUES ('$nv','$id',now())");

        ?>
        <div class="header">
            <div class="logo"><img src="../image/logo.png" width="50px"></div>
        </div>
        <br />
        <div class="title">
            OANHCOFFEE
        </div>

        <div class="addr">Đường 3/2, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ</div>

        <br />
        <?php

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // Return current date from the remote server
        $date = date('Y-m-d h:i:s');
        ?>
        <div class="footer-left">
            Mã đơn hàng: <?php echo $id ?><br>
            Thời gian: <?php echo $date; ?><br>
            Nhân viên: <?php echo $rows["NV_MA"] ?> - <?php echo $rows["NV_HOTEN"] ?>
        </div>
        <br />
        <table class="TableData">
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            $tongsotien = 0;

            $pos = 1;
            $tongsotien = 0;
            while ($row = mysqli_fetch_assoc($sql)) {
                $ban = $row['B_MA'];
                $update = mysqli_query($conn, "UPDATE ban SET B_TRANGTHAI='Trống' WHERE B_MA='$ban'");
                $tongsotien += $row['CTDH_SOLUONG'] * $row['DG_GIA'];
                echo "<tr>";
                echo "<td class=\"cotSTT\">" . $pos++ . "</td>";
                echo "<td class=\"cotTenSanPham\">" . $row['NU_TEN'] . "</td>";
                echo "<td class=\"cotGia\"><div id='giasp" . $row['NU_MA'] . "' name='giasp" . $row['NU_MA'] . "' value='" . $row['DG_GIA'] . "'>" . number_format($row['DG_GIA'], 0, ",", ".") . "</div></td>";
                echo "<td class=\"cotSoLuong\" align='center'>" . $row['CTDH_SOLUONG'] . "</td>";
                echo "<td class=\"cotSo\">" . number_format(($row['CTDH_SOLUONG'] * $row['DG_GIA']), 0, ",", ".") . "</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <td colspan="4" class="tong">Tổng cộng</td>
                <td class="cotSo"><?php echo number_format(($tongsotien), 0, ",", ".") ?></td>
            </tr>
        </table>


    </div>
</body>

</html>