<?php
include_once('../condb/condb.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM calamviec WHERE CLV_MA='$id'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
header ("Location: calamviec.php");
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
?>