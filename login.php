<?php
	require('include/common.php');
?>
<html>
<head>
<title>LOGIN</title>
<link rel='stylesheet' href='boot.css' >
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' >
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</head>
<body>
   <?php	
   include 'include/header1.php';
   ?>
    <center><form method="POST" action="log1.php"> <br> <br> <br> <br>
	<div class="panel panel-default">
		<div class="panel-heading">
			<font color="black"><b>LOGIN</b></font>
		</div>
		<div class="panel-body">
			<p>Login to make a purchase</p>
			<div class="form-group">
				<input type="email" placeholder="Email" name="em">
			</div>
			<div class="form-group">
				<input type="password" placeholder="Password" name="paw">
			</div>
			<a href="cart.htm"><button class="btn btn-primary" name="submit">Login</button></a>
		</div>
		<div class="panel-footer">
			
		</div>
	</div></center></form> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
    <?php
    include 'include/footer.php';
    ?>
</body>
</html>