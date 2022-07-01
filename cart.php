<?php
session_start();
$product_ids=array();
//session_destroy();
if(filter_input(INPUT_POST,"add_cart"))
{
   if(isset($_SESSION['cart']))
   {
       $count=count($_SESSION['cart']);
       $product_ids=array_column($_SESSION['cart'],'p_id');
       if(!in_array(filter_input(INPUT_GET,'id'),$product_ids))
       {
       	  $_SESSION['cart'][$count]=array
       	   (
                   'id' => filter_input(INPUT_GET,'id'),
                   'p_name'=> filter_input(INPUT_POST,'name'),
                   'price' => filter_input(INPUT_POST,'price'),
                   'quantity' =>filter_input(INPUT_POST,'quantity')       
             
       	   );
       }
       else
       {
       	 for($i=0;$i<count($product_ids);$i++){
       	 	if($product_ids[$i]==filter_input(INPUT_GET,'id')){
       	 		$_SESSION['cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');

       	 	}
       	 }
       }

   }
   else
   {
   	 $_SESSION['cart'][0]=array
   	   (
           'id' => filter_input(INPUT_GET,'id'),
           'p_name'=> filter_input(INPUT_POST,'name'),
            'price' => filter_input(INPUT_POST,'price'),
            'quantity' =>filter_input(INPUT_POST,'quantity')
   	   );
   }
}

if(filter_input(INPUT_GET,'action')=='delete'){
	foreach($_SESSION['cart'] as $key=> $product)
	{
		if($product['id']==filter_input(INPUT_GET,'id'))
		{
			unset($_SESSION['cart'][$key]);
		}
	}
    $_SESSION['cart']=array_values($_SESSION['cart']);
}


pre_r($_SESSION);
function pre_r($array)
{
    echo '<pre>';
 //   print_r($array);
    echo '</pre>';
}
?>


<html>
<head>
	<title>CART</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="cart1.css"/>
</head>
<body>
    <?php
        include 'include/header2.php';
    ?>
    <br> <br>
   <div class="container">	
   <?php
	  require("include/common.php");
    $que="SELECT * FROM product ORDER BY id ASC";
    $result=mysqli_query($conn,$que);
    if($result):
    
	    if(mysqli_num_rows($result)>0):
	    
		    while($product=mysqli_fetch_assoc($result)):
		    ?>
		    <div class="col-sm-4 col-md-3">
		    	<form method="post" action="cart.php?action=add&id="<?php echo $product['id']; ?>">
		    		<div class="pro">
		    			<img src="<?php echo $product['image'];?>" class="img-responsive" />
		    			<h4 class="text-info"><?php echo $product['p_name'];?></h4>
		    			<h4>Rs<?php echo $product['price'];?></h4>
		    			<input type="number" name="quantity" class="form-control" required min="0" />
		    			<input type="hidden" name="id" value="<?php echo $product['id'];?>" />
		    			
		    			<input type="hidden" name="name" value="<?php echo $product['p_name'];?>" />
		    			<input type="hidden" name="price" value="<?php echo $product['price'];?>" /> <br>
		    			<input type="submit" name="add_cart" class="btn btn-info" value="ADD TO CART" />
		    		</div>
		    	</form>
		    </div>
		    <?php
		    endwhile;
		endif;
	endif;
	?>
    <div style="clear:both"></div>
    <br />
    <div class="table-responsive">
    	<table class="table">
    		<tr><th colspan="5"><h3>ORDER DETAILS</h3></th></tr>
    	<tr>
    		<th width="40%">Product Name</th>
    		<th width="10%">Quantity</th>
    		<th width="20%">Price</th>
    		<th width="15%">Total</th>
    		
    	</tr>
    	<?php
    	if(!empty($_SESSION['cart'])):

    	    $total=0;
    	    foreach($_SESSION['cart'] as $key =>$product):
    	?>
    	<tr>
    		<td><?php echo $product['p_name'];?></td>
    		<td><?php echo $product['quantity'];?></td>
    		<td><?php echo $product['price'];?></td>
    		<td>Rs <?php echo number_format($product['quantity']*$product['price'],2);?></td>
    	</tr>
        <?php 
        	$total=$total+ ($product['quantity']*$product['price']);
            endforeach;
        ?>
        <tr>
        	<td colspan="3" align="right">TOTAL</td>
        	<td align="right">Rs <?php echo number_format($total,2);?></td>
            <td></td>
        </tr>
        <tr>
        	<td colspan="5">
        	<?php
        		if(isset($_SESSION['cart'])):
        		if(count($_SESSION['cart'])>0):
        	?>
        	  <a href="checkout.php?tot=$total" method="get" class="button btn btn-primary">CHECKOUT</a>
        	<?php endif; endif; ?>
            </td>
            <td>
    		   <a href="cart.php?action=delete&id=<?php echo $product['id'];?>"><button class="btn btn-danger">CLEAR CART</button></a>	
    		</td>
        
        </tr>
        <?php
        endif;
    ?>
        </table>
    </div>
</div>
</body>
</html>     
