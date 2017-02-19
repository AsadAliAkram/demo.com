<?php
include_once ("connection.php");
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

	    <div class="col-lg-3 col-md-3 col-xs-12" style="padding:0px">
	      
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



</body>
</html>