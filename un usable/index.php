<?php
session_start();
// session_destroy();
include_once ("connection.php");
$ucat = $_SESSION['u_cat'];

if ($ucat == 0 AND $ucat == 2) {
  $url='admin.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
} elseif ($ucat == 1) {
  $url='user.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
}

?>

<!DOCTYPE html >
<html>
<head>
<title>DEMO | Home</title>

<?php
include_once ("CDN.php");
?>
</head>


<body>
<div class="fluid-container">
<?php
include_once ("header.php");
?>
	
	<div class="container">
	  <div class="row">
	    <div class="col-lg-9 col-md-9 col-xs-12">

	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <li data-target="#myCarousel" data-slide-to="2"></li>
	        <li data-target="#myCarousel" data-slide-to="3"></li>
	      </ol>

	      <!-- Wrapper for slides -->
	      <div class="carousel-inner" role="listbox">

	        <div class="item active">
	          <img src="img/slid1.jpg" alt="Chania" width="460" height="345">
	          <div class="carousel-caption">
	            <h3>Chania</h3>
	            <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
	          </div>
	        </div>
	      
	        <div class="item">
	          <img src="img/slid2.jpg" alt="Flower" width="460" height="345">
	          <div class="carousel-caption">
	            <h3>Flowers</h3>
	            <p>Beatiful flowers in Kolymbari, Crete.</p>
	          </div>
	        </div>

	        <div class="item">
	          <img src="img/slid3.jpg" alt="Flower" width="460" height="345">
	          <div class="carousel-caption">
	            <h3>Flowers</h3>
	            <p>Beatiful flowers in Kolymbari, Crete.</p>
	          </div>
	        </div>
	    
	      </div>

	      <!-- Left and right controls -->
	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	      </a>
	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	      </a>
	    </div>


	    </div>

	    <div class="col-lg-3 col-md-3 col-xs-12">
	      
	      <div class="slidr-side">

	  <div class="row">
	    <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
	      <img src="img/side1.jpg" alt="Image Did't Load">
	    </div>

	    <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
	      <img src="img/side3.jpg" alt="Image Did't Load">
	    </div>
	    <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12">
	      <img class="side2" src="img/side2.jpg" alt="Image Did't Load">
	    </div>

	      </div>

	    </div>
	    </div>
	  </div>
	 </div>





	 <div class="container">
	 			

	 	<div class="registr-form">
	 		<div class="row">
	 			<center><h2>Products</h2></center><hr>
	 			<?php
	 			$sql = "SELECT * FROM products";
	 			$result = mysqli_query($conn, $sql);
	 			$total = mysqli_num_rows($result);
	 			$start = 0;
	 			$limit = 4;
	 			if (isset($_GET['id'])) {
	 				$id = $_GET['id'];
	 				$start = ($id-1)*$limit;
	 			} else {
	 				$id = 1;
	 			}
	 			$page = ceil($total/$limit);
	 			$sqli = mysqli_query($conn, "SELECT * FROM products WHERE pquantity > '0' LIMIT $start, $limit"); 
	 			while ($row = mysqli_fetch_array($sqli)) {
	 				?>
	 				<div class="col-sm-3">
	 				   	
	 					<?php
	 					$dprice = $row['prealprice']*(90/100) ;
	 					?>
	 					<div style="height:230px">
	 					<center><a href="all-products.php?pid=<?php echo $row["pid"];?>"><img style='width:190px; ' src='<?php echo "images/" . $row['pimage']?>' /></a></center>
	 					</div>
	 					<center><h3><?php echo $row['pname']; ?></h3></center>
	 					<center><p><?php echo  $row['pdiscription']; ?></p></center>
	 					<center><del><p><?php echo  $row['prealprice']."/= Rs"; ?></p></del></center>
	 					<center><p><?php echo  $dprice."/= Rs"; ?></p></center>
	 				
	 					<center><a href="?action=add&cid=<?php echo $row['pid']; ?>" class="btn btn-warning">add to cart</a></center>
	 				</div>
	 				<?php	
	 			}
	 			?>	 
	 		<?php
	 			if (isset($_GET['action'])) {
		        	 if (isset($_SESSION['shoping-cart'])) {
		        	 	$item_array_id = array_column($_SESSION['shoping-cart'], "item_id");
		        	 	if (!in_array($_GET['id'] , $item_array_id)) {
		        	 		
		        	 			$count = count($_SESSION['shoping-cart']);
		        	 			$item_array = array (
		        	 			'item_id'		=>	$_GET['pid'],
		        	 			'item_name'		=>	$_GET['pname'],
		        	 			'item_price'	=>	$_GET['prealprice'],
		        	 			'item_image'	=>	$_GET['pimage'],
		        	 			'item_image'	=>	$_GET['pimage'],
		        	 		);
		        	 			$_SESSION['shoping-cart'][$count] = $item_array;
		        	 	} else {
		        	 		echo '<script>alert("item already added")</script>';
		        	 		echo '<script>window.location="index.php"</script>';
		        	 	}
		        	 } else {
		        	 	$item_array = array (
		        	 			'item_id'		=>	$_GET['pid'],
		        	 			'item_name'		=>	$_GET['pname'],
		        	 			'item_price'	=>	$_GET['prealprice'],
		        	 			'item_image'	=>	$_GET['pimage'],
		        	 		);
		        	 	$_SESSION['shoping-cart'][0] = $item_array;
		        	 }
        		}

	 		?>

	 		</div>
	 	</div>
	 	<ul class="pagination">
	 		<?php
	 		if ($id > 1) {
	 			?>
	 			<li><a href="?id=<?php echo ($id-1) ;?>">Previous</a></li>
	 			<?php } ?>
	 			<?php
	 			for($i=1 ; $i <= $page ; $i++)
	 				{ ?>		
	 			<li><a href="?id=<?php echo $i ;?>"><?php echo $i; ?></a></li>
	 			<?php } ?>
	 			<?php
	 			if ($id != $page) {
	 				?>
	 				<li><a href="?id=<?php echo ($id+1) ;?>">Next</a></li>
	 				<?php } ?>
	 			</ul>




	 			<div>
	 				<h3>Order Details</h3>
	 				<table class="table table-bordered">
	 					<tr>
	 						<th width="20%">Item Image</th>
	 						<th width="20%">Item Name</th>
	 						<th width="10%">Quantity</th>
	 						<th width="20%">Price</th>
	 						<th width="15%">Total</th>
	 					</tr>
	 					<?php
	 					if(!empty($_SESSION['shoping-cart'])) {
	 						$tottal = 0;
	 						foreach ($_SESSION['shoping-cart'] as $key => $value) {
	 							?>
	 							<tr>
	 								<th><?php echo $value['item_name']; ?></th>
	 								<th><?php echo $value['item_image']; ?></th>
	 								<th> $ <?php echo $value['item_price']; ?></th>
	 								<th><?php echo $value['item_name']; ?></th>


	 							</tr>

	 							<?php
	 						}
	 					}

	 					?>

	 				</table>

	 			</div>

	 		</div>
	  </div>
</body>
</html>





