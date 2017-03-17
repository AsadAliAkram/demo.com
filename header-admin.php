<?php
session_start();
include_once ("connection.php");
?>

<?php
if ($_SESSION['u_cat'] == NULL) {
  $url='index.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
} 
?>

<?php
if (isset($_POST['signout'])){

session_unset(); 
session_destroy(); 

  $url='index.php';
  echo '<script>window.location = "'.$url.'";</script>';
  die;  
}
?>
	<nav id="head-t" class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
			</div>

			<?php
				if ($_SESSION['u_cat'] == '0' AND $_SESSION['u_cat'] == '2') {
					$urls = "admin.php";
				} elseif ($_SESSION['u_cat'] == '1') {
					$urls = "user.php";
				} 
			?>


			<div class="collapse navbar-collapse" id="myNavbar">
				<form method="post" action="">
				<ul class="nav navbar-nav navbar-right">
                    <li> <a href="<?php echo $urls; ?>">MY ACCOUNT</a></li>
                    <li> <a href="profile.php">
                      <span class="glyphicon glyphicon-user"></span>
                    </a></li>
                    <li><input name="signout" type="submit" class="lgout" value="LOG OUT" /></li>
                  </ul>
              </form>
			</div>
		</div>
	</nav>  
<div class="container">
	<div class="header">
		<div class="row">
			<div class="col-xs-5">
				<nav class="navbar navbar-default" style="background:none; border:none"> 
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my1Navbar">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="my1Navbar">
						<form>
							<ul class="nav navbar-nav navbar-left">
								<li><input name="srch" type="search" placeholder="Search..."/></li>
								<li><select>
									<option>All Categories</option>
									<option>Categoyy</option>
									<option>Categoyy</option>
									<option>Categoyy</option>
								</select>
							</li>
							<li><button type="button" class="btn-srch" ><span class="glyphicon glyphicon-search"></span></button></li>
						</ul>
					</form>
				</div>
			</nav>
		</div>
		<div class="col-xs-2">
			<a href="index.php"><img src="img/logo.png" alt=" logo image Did't Load"></a>
		</div>
		<div class="col-xs-5">
			<nav class="navbar navbar-default" style="background:none; border:none">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle">
						<span class="glyphicon glyphicon-shopping-cart"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="my2Navbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><span class="glyphicon glyphicon-comment"></span></a></li>
						<li><a href="#"><span class="glyphicon glyphicon-heart"></span></a></li>
						<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="row">
		<nav class="navbar navbar-default" style="background:none; border:none;" >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mymNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
			</div>
			<div class="collapse navbar-collapse" id="mymNavbar">
				<ul class="nav navbar-nav  text-center">
					<li class="dropdown"><a class="dropdown-toggle"href="#">PRODUCTS<span class="caret"></span></a>
						<ul class="s-manu">
							<li><a href="product.php">All PRODUCTS</a></li>
							<?php
								if ($_SESSION['u_cat'] == '0') { 
									?>
									<li><a href="admin.php">MY Products</a></li>
							<?php } ?>
							
							<li><a href="#">Page 1-3</a></li>
						</ul>
					</li>
					<li><a href="#">Home</a></li>
					<li><a href="#">Page 2</a></li>
					<li class="dropdown"><a class="dropdown-toggle"href="#">Page 1 <span class="caret"></span></a>
						<ul class="s-manu">
							<li><a href="#">Page 1-1</a></li>
							<li><a href="#">Page 1-2</a></li>
							<li><a href="#">Page 1-3</a></li>
						</ul>
					</li>
					<li><a href="#">Page 3</a></li>
					<li><a href="#">Page 3</a></li>
					<li><a href="#">Page 3</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
</div>
