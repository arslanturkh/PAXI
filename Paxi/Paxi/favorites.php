<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Favorites</title>
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
              
              <th>Name</th>
              <th>Last Name</th>
              <th>Plate</th>
            </tr>
        </thead>
        <tbody>
  <?php 
  
    session_start();
    include_once 'dbconnect.php';
    $user_id = $_SESSION['usr_id'];
    $user_id;

    $result = mysqli_query($con, "SELECT taxi.*, user.* FROM favourite INNER JOIN user ON user.userid = favourite.userid INNER JOIN taxi ON taxi.taxiid = favourite.taxiid WHERE user.userid = '$user_id'");
    
    $count = mysqli_num_rows($result) or die(mysqli_error($con));


    if ($count > 0) {
     // output data of each row

      while($row = $result->fetch_assoc()) {


        echo '<tr>
                  <td scope="row">' . $row["NameOfUser"]. '</td>
                  <td>' . $row["SurnameOfUser"] .'</td>
                  <td> '.$row["Plate"] .'</td>
                </tr>';





      }
    } else {
        echo "0 results";
      } 
  ?>
       </tbody>
    </div>
  </table>
  <div class="form-group">
  <a href="profile.php" class="btn btn-default btn-lg btn-space">
   <i class="glyphicon glyphicon-menu-left
"></i></a>
</div>




</body>
</html>
