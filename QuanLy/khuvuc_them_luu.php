<?php require_once'../condb/condb.php'; 
   $sql = "INSERT INTO khuvuc VALUES ('".$_POST["inputMa"] ."','".$_POST["inputTen"] ."')";
 
   if ($conn->query($sql) === TRUE) {
     echo "Thêm khu vực thành công";
   //neu thuc hien thanh cong, chung ta se cho di chuyen den dangnhap.php
     header('Location: khuvuc.php');
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
?>
