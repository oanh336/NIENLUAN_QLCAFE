<?php
include_once('../condb/condb.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];

$update_b=mysqli_query($conn,"UPDATE ban SET B_TRANGTHAI='Trống'
WHERE B_MA in (select B_MA from ban_donhang where DH_MA='$id')");

$sql = "DELETE FROM donhang  WHERE DH_MA='$id'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
header ("Location: donhang.php");

} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>