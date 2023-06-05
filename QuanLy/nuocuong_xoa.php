<?php
include_once('../condb/condb.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!="" and isset($_REQUEST['date']) and $_REQUEST['date']!="" and isset($_REQUEST['price']) and $_REQUEST['price']!="" ){
$id=$_GET['id'];
$date=$_GET['date'];
$price=$_GET['price'];
$sql = "DELETE FROM dongia WHERE NU_MA='$id' AND N_NGAY='$date' AND DG_GIA='$price'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
header ("Location: nuocuong.php");
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>