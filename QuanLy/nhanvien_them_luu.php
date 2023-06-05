<?php require_once'../condb/condb.php'; 
   $sql = "INSERT INTO nhanvien VALUES ('".$_POST["inputMa"] ."','".$_POST["inputCV"] ."','".$_POST["inputPass"] ."'
   ,'".$_POST["inputTen"] ."','".$_POST["inputCCCD"] ."','".$_POST["inputNS"] ."',
   '".$_POST["inputGT"] ."','".$_POST["inputSDT"] ."','".$_POST["inputEmail"] ."',
   '".$_POST["inputDC"] ."','".$_POST["inputNgay"] ."')";
 
   if ($conn->query($sql) === TRUE) {
     echo "<alert>Thêm nhân viên thành công</alert>";
   //neu thuc hien thanh cong, chung ta se cho di chuyen den dangnhap.php
     header('Location: nhanvien.php');
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
?>
