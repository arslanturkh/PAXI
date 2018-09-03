<?php
session_start();
include_once 'dbconnect.php';

$user_id = $_SESSION['usr_id'];

if (isset($_POST['search'])) {
	$plate = $_POST['plate'];
	$upperCasePlate = strtoupper($plate);

	
    if((strlen($plate) != 9)) {
    	$error_message = " Invalid plate";
    } else{
    	$result = mysqli_query($con, "SELECT * FROM taxi WHERE plate = '$upperCasePlate'");
    	$count = mysqli_num_rows($result);
    	$row = mysqli_fetch_array($result);

    	if($count > 0){
    		$taxi_id = $row['TaxiID'];
        	$_SESSION['txi_id'] = $taxi_id;
        	header("Location: taxi.php");
    	}else{
        $error_message = "The taxi you are looking for is not registered in our database.";
      }
    }
  	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search by Plate</title>
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
	
<h3>Enter Taxi Plate</h3>
  
<?php if(!empty($success_message)) { ?> 
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?> 
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>

	<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="searchform">
    
		<div class="form-group">
		<label for="name">You can manually enter taxi plate with spaces:</label>
		<input type="text" class="form-control" name="plate" placeholder="e.g. 01 T XXXX" required  value="<?php if(isset($_POST['plate'])) echo $_POST['plate']; ?>">
		</div>
	
		<div class="form-group">
		<input type="submit" name="search" value="Search" class="btn btn-default btn-lg" />
		</div>
	</form>


	
</div>

</body>
</html>
