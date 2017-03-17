<?php
session_start();
include_once ("connection.php");
?>

<!DOCTYPE html >
<html>
<head>
	<title>DEMO | Create Product</title>

	<?php
	include_once ("CDN.php");
	?>
</head>
<body>
	<?php
	  include_once ("header-admin.php");
	?>
<div class="container">
	<?php
	if(isset($_POST['addpro'])) { 
		$targate = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$pname = $_POST['pname'];
		$pcategory = $_POST['pcategory'];
		$oname = $_POST['oname'];
		$rprice = $_POST['pprice'];
		$quantity = $_POST['quantity'];
		$des = $_POST['pdescription'];
		$uid = $_SESSION['u_id'];
		$sql = "INSERT INTO products (pid, pname, pimage, pcategory, prealprice, pquantity, pownername, pdiscription, pownid) VALUE 
		('NULL','$pname','$image','$pcategory','$rprice','$quantity','$oname','$des','$uid')";
		if (mysqli_query($conn, $sql)) {
			echo "New record created";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		if (move_uploaded_file($_FILES['image']['tmp_name'], $targate)) {
			$msg = " And Image Is Uploaded successfully";
		} else {
			$msg = " And Image Is Not Uploaded";
		}	
		echo $msg;
	}
	?>


	<h3>Create Your Product</h3>
	<div class="registr-form">
		<h4>PRODUCT INFORMATION</h4>
		<form method="post" action="create-product.php" enctype="multipart/form-data" />     
		<div class="row">      
			<div class="col-lg-6 col-md-6">
				<label>Product Name<span class="sin-span">*</span></label>
				<input name="pname" type="text" required />
			</div>
			<div class="col-lg-3 col-md-3">
				<label>Product Quantity<span class="sin-span">*</span></label>
				<input type="number" name="quantity" min="1" max="" required />
			</div>
			<div class="col-lg-3 col-md-3">
				<label>Product Category<span class="sin-span">*</span></label>
				<select name="pcategory" style="width:100%" required >
					<option>Select Product Category</option>
					<option>Toys</option>
					<option>Fashon</option>
					<option>Cosmatics</option>
					<option>Other</option>
				</select>
			</div>
		</div>
		<div class="row">      
			<div class="col-lg-6 col-md-6">
				<label>Product Owner Name<span class="sin-span">*</span></label><br />
				<input name="oname" type="text" required />
			</div>
			<div class="col-lg-6 col-md-6">
				<label>Product Price<span class="sin-span">*</span></label><br />
				<input name="pprice" type="number" required />
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-0">
			</div>
			<div class="col-md-6 col-sm-12">
				<textarea name="pdescription" placeholder="Enter Short Description" style="width:100%" required ></textarea>
			</div>
			<div class="col-md-3 col-sm-0">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="pro_pic" style="width:10px">
					<input style="float:left" name="image" type="file" required />
				</div>
			</div>
			<div class="col-sm-6">
				<input name="addpro" type="submit" class="sin-sup" value="Submit">
			</div>
		</div>
	</form>
</div>
</div>
</body>
</html>