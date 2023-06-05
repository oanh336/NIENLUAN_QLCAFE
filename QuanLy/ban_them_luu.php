<?php require_once'../condb/condb.php'; 
   $sql = "INSERT INTO ban VALUES ('".$_POST["inputMa"] ."','".$_POST["inputKV"] ."','".$_POST["inputTen"] ."', 
   '".$_POST["inputSC"] ."', '".$_POST["inputTT"] ."')";
 
   if ($conn->query($sql) === TRUE) {
     echo "Thêm bàn thành công";
   //neu thuc hien thanh cong, chung ta se cho di chuyen den dangnhap.php
     header('Location: ban.php');
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
?>
