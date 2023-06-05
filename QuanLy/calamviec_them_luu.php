<?php require_once'../condb/condb.php'; 
   $sql = "INSERT INTO calamviec VALUES ('".$_POST["inputMa"] ."','".$_POST["inputTen"] ."', 
   '".$_POST["inputGioBD"] ."', '".$_POST["inputGioKT"] ."')";
 
   if ($conn->query($sql) === TRUE) {
     echo "Thêm ca làm việc thành công";
   //neu thuc hien thanh cong, chung ta se cho di chuyen den dangnhap.php
    
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
?>
