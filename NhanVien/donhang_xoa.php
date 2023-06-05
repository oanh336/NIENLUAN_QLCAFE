<?php
include_once('../condb/condb.php');
$user = (isset($_SESSION['username'])) ? $_SESSION['username'] : [];

$sql_up = "SELECT * FROM nhanvien a, chucvu b where a.CV_MA=b.CV_MA and a.NV_MA='$user'";
$query_up = mysqli_query($conn, $sql_up);
$rows = mysqli_fetch_assoc($query_up);
?>
<?php

if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
    $id = $_GET['id'];
    $s = mysqli_query($conn, "select NV_MA from donhang where DH_MA='$id'");
    $r = mysqli_fetch_assoc($s);

    if ($r['NV_MA'] == $rows['NV_MA'] || $rows['CV_MA'] == 'QL01') {
        $update_b = mysqli_query($conn, "UPDATE ban SET B_TRANGTHAI='Trống'
WHERE B_MA in (select B_MA from ban_donhang where DH_MA='$id')");

        $sql = "DELETE FROM donhang  WHERE DH_MA='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Xoá thành công!";
            header("Location: dsdonhang.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }else{
        echo "<script>alert('Bạn không có quyền xóa đơn hàng!')</script>";
        echo "<script>window.open('dsdonhang.php','_self')</script>";
    }
}

?>