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


	<?php
	if (isset($_POST['add-to-cart'])) {
		if (isset($_SESSION['shoping-cart'])) {
			$item_array_id = array_column($_SESSION['shoping-cart'], "item_id");
			if (!in_array($_GET['id'] , $item_array_id)) {

				$count = count($_SESSION['shoping-cart']);
				$item_array = array (
					'item_id'   	=>  $_GET['id'],
					'item_image'	=>  $_POST['hidden-image'],
					'item_name'   	=>  $_POST['hidden-name'],
					'item_price'  	=>  $_POST['hidden-price'],
					'item_quantity' =>  $_POST['quantity'],
					);
				$_SESSION['shoping-cart'][$count] = $item_array;
			  }
			} 
			else {
				echo '<script>alert("item already added")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
		else {
			$item_array = array (
				'item_id'   	=>  $_GET['id'],
				'item_image'	=>  $_POST['hidden-image'],
				'item_name'  	=>  $_POST['hidden-name'],
				'item_price'  	=>  $_POST['hidden-price'],
				'item_quantity' =>  $_POST['quantity'],
				);
			$_SESSION['shoping-cart'][0] = $item_array;
		}
		?>
		
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
					if (isset($_GET['nid'])) {
						$id = $_GET['nid'];
						$start = ($id-1)*$limit;
					} else {
						$id = 1;
					}
					$page = ceil($total/$limit);
					$sqli = mysqli_query($conn, "SELECT * FROM products WHERE pquantity > '0' LIMIT $start, $limit"); 
					if (mysqli_num_rows($sqli) > 0) {
						while ($row = mysqli_fetch_array($sqli)) {
							?>
							<div class="col-sm-3" style="padding: 50px 0px">
							
								<form method="post" action="index.php?action=add&id=<?php echo $row['pid']; ?>">
									<div style="height:230px">
										<center><a href="all-products.php?pid=<?php echo $row["pid"];?>"><img style='width:190px;' src='<?php echo "images/" . $row['pimage']?>' /></a></center>
									</div>
									<center><h4><?php echo $row['pname']; ?></h4></center>
									<center><h4><?php echo $row['pdiscription']; ?></h4></center>
									<center><h4> $ <?php echo $row['prealprice']; ?></h4></center>
									<center>
										<div class="row" style="padding: 0px 30px">
											<div class="col-sm-4"><h4 style="padding: 10px">Quantity:</h4></div> <div class="col-sm-8"><input name="quantity" type="number" value="1"></div>
										</div>
									</center>
									<input type="hidden" name="hidden-image" value="<?php echo "images/" . $row['pimage']?>">
									<input type="hidden" name="hidden-name" value="<?php echo $row['pname']; ?>">
									<input type="hidden" name="hidden-price" value="<?php echo $row['prealprice']; ?>">
									<center><input type="submit" name="add-to-cart" class="btn btn-success" value="Add to Cart"></center>
								</form>	
							</div>
							<?php	
						}
					}
					?>
				</div>
			</div>
			<ul class="pagination">
				<?php
				if ($id > 1) {
					?>
					<li><a href="?nid=<?php echo ($id-1) ;?>">Previous</a></li>
					<?php } ?>
					<?php
					for($i=1 ; $i <= $page ; $i++)
						{ ?>		
					<li><a href="?nid=<?php echo $i ;?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<?php
					if ($id != $page) {
						?>
						<li><a href="?nid=<?php echo ($id+1) ;?>">Next</a></li>
						<?php } ?>
					</ul>
					<?php
					if (isset($_SESSION['u_id'])) {
						 ?>
					<a href="cart-page.php" class="btn btn-default">View Cart<span class='glyphicon glyphicon-shopping-cart'></span></p></script></a>
					<?php
				}  else {
					?>
					<a href="signin.php" class="btn btn-default">View Cart<span class='glyphicon glyphicon-shopping-cart'></span></p></script></a>
					<?php
				}
				?>
<!-- <form method="post" action="cart-page.php">
<input type="submit" name="checkout"value="CHECK OUT<span class='glyphicon glyphicon-shopping-cart'></span>" onclick="this.form.target='_blank';return true;">

</form> -->
</div>
	<?php
	include_once ("footer.php");
	?>
</body>
</html>
