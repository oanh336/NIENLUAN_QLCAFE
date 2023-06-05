<?php require_once'../condb/condb.php'; 
   $sql = "INSERT INTO loainuoc VALUES ('".$_POST["inputMa"] ."','".$_POST["inputTen"] ."')";
 
   if ($conn->query($sql) === TRUE) {
     echo "Thêm danh mục thành công";
   //neu thuc hien thanh cong, chung ta se cho di chuyen den dangnhap.php
     header('Location: danhmuc.php');
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
?>
