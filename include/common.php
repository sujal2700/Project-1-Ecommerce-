<?php
  $conn=mysqli_connect("localhost","root","","store");
  if(!$conn){
      die("Connection failed because" .mysqli_connect_error());
  }
  
?>
