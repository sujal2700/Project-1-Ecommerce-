<?php
require('include/common.php');
$name=$_POST['name'];
$email=$_POST['email'];
$mail="/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/";
if (!preg_match($mail,$email)){
	echo "INCORRECT EMAIL";
}
$pass=$_POST['password'];
$num=$_POST['number'];
$city=$_POST['city'];
$addr=$_POST['address'];

if (strlen($pass)<6){
	echo "PASSWORD SHOULD HAVE MIN 6 CHARACTERS";
}
else
{
   $email=mysqli_real_escape_string($conn,$email);
   $pass=mysqli_real_escape_string($conn,$pass);
   if(isset($_POST['submit']))
   {
      $addr=mysqli_real_escape_string($conn,$addr);
      $que="INSERT INTO sign(Name,Email,Password,Phone,CITY,Address) values ('$name','$email','$pass','$num','$city','$addr')";
      $run=mysqli_query($conn,$que);
      if($run)
      {
         echo "<script>SIGNUP SUCCESSFUL! Now Login!</script>";
         header('location:login.php');
         
      }
      else{
	    echo 'SIGNUP NOT SUCCESSFUL';
      }
   }     
}
?>
