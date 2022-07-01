<?php
session_start();
require('include/common.php');
if (isset($_POST['em'])&& isset($_POST['paw']))
{
   $email=$_POST['em'];
   $pass=$_POST['paw'];
   if(empty($email)){
   	 echo "Email is Required!";
   }
   else if(empty($pass)){
   	 echo "Password is Required!!";
   }
   else
   {
      $sql="SELECT * FROM sign WHERE Email='$email' AND Password='$pass'";
      $result=mysqli_query($conn,$sql);
      if (mysqli_num_rows($result)===1)
      {
      	$row=mysqli_fetch_array($result);
      	if($row['Email']===$email && $row['Password']===$pass)
      	{
      		$_SESSION['Email']=$row['Email'];
      		$_SESSION['Name']=$row['Name'];
      		$_SESSION['City']=$row['City'];
      		$_SESSION['Phone']=$row['Phone'];
      		$_SESSION['Address']=$row['Address'];
      		header('location:cart.php');
      	}
      	else{
      		echo "INVALID Email Or Password!!";
      	}
      }
      else{
      	echo "Login Carefully!";
      }
   }
}
?> 

      }
   }

}