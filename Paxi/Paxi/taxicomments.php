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
  
  <h5>Here are the comments for this taxi:</h5>

  <table class="table table-striped">                     
    <div class="table responsive">
        <thead>
            <tr>
              
              <th>User Name</th>
              <th>Rating</th>
              <th>Comment</th>
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

    $result = mysqli_query($con, "SELECT taxi.*, comment.*, register.* FROM taxi INNER JOIN comment ON comment.taxiid = taxi.taxiid  INNER JOIN user ON comment.userid = user.userid INNER JOIN register ON user.userid = register.userid WHERE taxi.taxiid = $intTaxiId");
    
    $count = mysqli_num_rows($result) or die(mysqli_error($con));


    if ($count > 0) {
     // output data of each row

      while($row = $result->fetch_assoc()) {


        echo '<tr>
                  <td scope="row">' . $row["UserName"]. '</td>
                  <td>' . $row["CommentRating"] .'</td>
                  <td> '.$row["CommentText"] .'</td>
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
  <a href="taxi.php" class="btn btn-default btn-lg btn-space">
   <i class="glyphicon glyphicon-menu-left
"></i></a>
  </div>
</div>







</body>
</html>
