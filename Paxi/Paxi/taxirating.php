<?php
session_start();
include_once 'dbconnect.php';

$user_id = $_SESSION['usr_id'];
$taxi_id = $_SESSION['txi_id'];
$intUserId = (int)$user_id;
$intTaxiId = (int)$taxi_id;


if (isset($_POST['send'])) {
	$rating = $_POST['sel1'];
	$intRating = (int)$rating;
	$comment = $_POST['comment'];
	$date = date("Y-m-d");

	if(empty($_POST['comment'])) {
		$errormsg =  "Comment is required";
	} else{
		

        $commentValue = mysqli_query($con, "SELECT * FROM comment WHERE taxiid = '$taxi_id'");

        $TotalComment = mysqli_num_rows($commentValue);

        $taxiRating = mysqli_query($con, "SELECT * FROM taxi WHERE taxiid = '$taxi_id'");
        $row = mysqli_fetch_array($taxiRating);
        $intTaxiRating = (float)$row['TaxiRating'];
        $newTaxiRating = (($intTaxiRating * $TotalComment) + $intRating) / ($TotalComment + 1);


        if(!empty($commentValue) and !empty($taxiRating)){
        	$query = "INSERT INTO comment (taxiid, commentid, userid, commenttext, commentrating, commentdate) VALUES
            ($intTaxiId, NULL, $intUserId, '$comment', $intRating, '$date')";

        	$result = mysqli_query($con, $query);

        	$update = mysqli_query($con, "UPDATE taxi SET taxirating = $newTaxiRating WHERE taxiid = '$taxi_id'");
        	if(!empty($result) and !empty($update)) {
          		 header("Location: taxi.php");
        	} else {
           		 $errormsg = 'Something happened'; 
        	}
        }

        

        
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Taxi Rating</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/paxistyle.css">
  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    
	<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  
	  <a class="navbar-brand" href="main.php">
		<img src="icons/48x48.png" width="30" height="30">
	   </a>
	  </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="profile.php">Profile</a></li>
		<li><a href="favorites.php">Favorites</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
		
		<h3>Taxi Rating</h3>
		<h5 class="margin">Choose your rating and leave a comment.</h5>
		
		<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="commentform">
				
				<div class="form-group">
				  <label for="sel1">Rate this Taxi:</label>
				  <select class="form-control" name="sel1">
				    <option>5</option>
				    <option>4</option>
				    <option>3</option>
				    <option>2</option>
				    <option>1</option>
				  </select>
				</div>
				
				<h1 class="margin"></h1>

				<div class="form-group">
				<label for="name">Comment:</label>
				<textarea class="form-control" rows="4" maxlength="140" name="comment" placeholder="Make your comment here!"></textarea>
				</div>
			
				<input type="hidden" name="rating" />

				<div class="form-group">
					<input type="submit" name="send" value="Send" class="btn btn-default btn-lg" />
				</div>
		</form>
		<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg;} ?></span>

		<div class="form-group">
  		<a href="taxi.php" class="btn btn-default btn-lg btn-space">
   		<i class="glyphicon glyphicon-menu-left
		"></i></a>

</div>

</body>
</html>
