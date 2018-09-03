<!DOCTYPE html>
<html lang="en">
<head>
  <title>Taxi Profile</title>
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
	<table class="table table-striped">                     
    <div class="table responsive">
        <thead>
            <tr>
              
              <th>Plate</th>
              <th>Model Year</th>
              <th>Manufacturer</th>
              <th>Model</th>
              <th>Station</th>
              <th>Raiting</th>
            </tr>
        </thead>
        <tbody>
  <?php 
  
    session_start();
    include_once 'dbconnect.php';
    $user_id = $_SESSION['usr_id'];
    $taxi_id = $_SESSION['txi_id'];
    $intUserId = (int)$user_id;
    $intTaxiId = (int)$taxi_id;

    $isFavourite = mysqli_query($con, "SELECT * FROM favourite WHERE taxiid = '$taxi_id' and userid = $user_id");


    if(!empty($isFavourite)){
      $myFavorite = false;
    }else{
      $myFavorite = trye;
    }

    
    $result = mysqli_query($con, "SELECT taxi.*, vehicle.*, station.*  FROM taxi INNER JOIN vehicle ON vehicle.vehicleid = taxi.vehicleid INNER JOIN station ON taxi.stationid = station.stationid WHERE taxi.taxiid = '$taxi_id'");
    
    $count = mysqli_num_rows($result) or die(mysqli_error());


    if ($count > 0) {
     // output data of each row

      while($row = $result->fetch_assoc()) {


        echo '<tr>
                  <td scope="row">' . $row["Plate"]. '</td>
                  <td>' . $row["ModelYear"] .'</td>
                  <td> '.$row["Manufacturer"] .'</td>
                  <td> '.$row["Model"] .'</td>
                  <td> '.$row["StationName"] .'</td>
                  <td> '.$row["TaxiRating"] .'</td>
                </tr>';





      }
    } else {
        echo "0 results";
      }

      if (isset($_POST['makefavorite'])) {
        if($myFavorite){
          
        }else{
          $query = "INSERT INTO favourite (taxiid, userid) VALUES
            ($intTaxiId, $intUserId)";

            $result = mysqli_query($con, $query);

            if(!empty($result)) {
              echo "Added to Favorites!"; 
              } else {
                  echo 'Warning!: The taxi is already in favorite list.'; 
                }
        }
      } 
  ?>
       </tbody>
    </div>
</table>

<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="favoriteform">


                    <div class="form-group">
                        <input type="submit" name="makefavorite" value="Add to your favorites" class="btn btn-default" />
                    </div>

</form>

   <div class="form-group">
  <a href="taxirating.php" class="btn btn-default btn-lg btn-space">
  Make Comments <i class="glyphicon glyphicon-edit"></i></a>
  </div>

  <div class="form-group">
  <a href="taxicomments.php" class="btn btn-default btn-lg btn-space">
  Show Comments <i class="glyphicon glyphicon-comment"></i></a>
  </div>
  
	
	
</div>




</body>
</html>
