<?php
	require('include/common.php');
?>
<html>
<head>
<title>SIGN UP</title>
<link rel='stylesheet' href='boot.css' >
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' >
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</head>
<body>
	<?php
		include 'include/header1.php';
	?> <br> <br>
	<div class='container'>
	<center> <form action="sign1.php" method="POST">	
		<div class='row'>
			<font color='Orange'><h3> SIGN UP </h3></font>
		</div>
		<div class='form-group'>
        	<input name='name' type='text' placeholder='Name'>
        </div>
        <div class='form-group'>
        	<input name='email' type='email' placeholder='Email'>
        </div>
        <div class='form-group'>
        	<input name='password' type='password' placeholder='Password'>
        </div>
        <div class='form-group'>
        	<input name='number' type='Number' placeholder='Contact No'>
        </div>
        <div class='form-group'>
        	<input name='city' type='text' placeholder='City'>
        </div>
        <div class='form-group'>
        	<input name='address' type='text' placeholder='Address'>
        </div>
        <div class='form-group'>
        	<button class="btn btn-primary" name="submit">Submit</button>
        </div>
       </center></form></div> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
    <?php
    	include 'include/footer.php';
    ?>
</body>
</html>
   