<?php 
include '../condb/condb.php';
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); // xóa session login
  
}
  header('Location: dangnhap.php');
$conn->close();
?>
