<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: main.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	  $username = $_POST['username'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = (int)$_POST['age'];
    $gender = $_POST['gender'];
    $GENDER = strtoupper($gender);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    //name can contain only alpha characters and space
    if(!empty($_POST["signup"])) {
  /* Form Required Field Validation */
  foreach($_POST as $key=>$value) {
    if(empty($_POST[$key])) {
    $error_message = "All Fields are required";
    break;
    }
  }
  /* Password Matching Validation */
  if($_POST['password'] != $_POST['cpassword']){ 
  $error_message = 'Passwords should be same<br>'; 
  }

  /* Email Validation */
  if(!isset($error_message)) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $error_message = "Invalid Email Address";
    }
  }

  /* Validation to check if gender is selected */
  if(!isset($error_message)) {
    if(!isset($_POST["gender"])) {
    $error_message = " All Fields are required";
    }
  }

  if(!isset($error_message)) {
    if(!isset($_POST["age"])) {
    $error_message = " All Fields are required";
    }
  }

  if(!isset($error_message)) {
    if(!isset($_POST["name"])) {
    $error_message = " All Fields are required";
    }
  }

  if(!isset($error_message)) {
    if(!isset($_POST["surname"])) {
    $error_message = " All Fields are required";
    }
  }


  if(!isset($error_message)) {

    if(isset($username)){

      $mysql_get_users = mysqli_query($con, "SELECT * FROM register where username='$username'");
      $get_rows = mysqli_affected_rows($con);

      if($get_rows >=1){

        $error_message = "Username exists.";
        
      }
      else{
    
    $query = "INSERT INTO user (userid, nameofuser, surnameofuser, age, emailuser, gender) VALUES
    (NULL, '" . $_POST["name"] . "', '" . $_POST["surname"] . "', '" . $_POST["age"] . "', '" . $_POST["email"] . "', '" . $_POST["gender"] . "')";
    $result = mysqli_query($con, $query);

    $resultofdb = mysqli_query($con, "SELECT * FROM user WHERE emailuser = '$email' ") or die(mysql_error());

    $row = mysqli_fetch_array($resultofdb);

    $query = "INSERT INTO register (userid, username, password) VALUES
    ('" . $row["UserID"] . "', '" . $_POST["username"] . "', '" . $_POST["password"] . "')";
    $result2 = mysqli_query($con, $query);

    if(!empty($result) and !empty($result2)) {
      $error_message = "";
      $success_message = "You have registered successfully!"; 
      unset($_POST);
      header("Location: login.php");
    } else {
      $error_message = "Problem in registration. Try Again!"; 
    }
  }
}
}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
	  
	  <a class="navbar-brand" href="login.php">
		<img src="icons/48x48.png" width="30" height="30">
	   </a>
	  </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Sign Up</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
	

<?php if(!empty($success_message)) { ?> 
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?> 
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>

		<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				
				<h3 class="margin">Sign Up</h3>

				<div class="form-group">
					<label for="name">Username</label>
					<input type="text" name="username" placeholder="Enter Your Username e.g Lena91" required value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" class="form-control" />
					
				</div>

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" placeholder="Enter Your Name e.g Lena" required value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" class="form-control" />
					
				</div>
				
				<div class="form-group">
					<label for="name">Surname</label>
					<input type="text" name="surname" placeholder="Enter Your Surname e.g Oxton" required value="<?php if(isset($_POST['surname'])) echo $_POST['surname']; ?>" class="form-control" />
					
				</div>
				
				<div class="form-group">
					<label for="name">Age</label>
					<input type="number" name="age" placeholder="Enter Your Age e.g 26" required value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>" class="form-control" />
					
				</div>

				<div class="form-group">
					<label for="name">Gender</label>
					<input type="text" name="gender" placeholder="Male or Female" required value="<?php if(isset($_POST['gender'])) echo $_POST['gender']; ?>" class="form-control" />
					
				</div>
				
				<div class="form-group">
					<label for="name">Email</label>
					<input type="text" name="email" placeholder="Email e.g email@xxx.com" required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" class="form-control" />
					
				</div>

				<div class="form-group">
					<label for="name">Password</label>
					<input type="password" name="password" placeholder="Password" required class="form-control" />
					
				</div>

				<div class="form-group">
					<label for="name">Confirm Password</label>
					<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
					
				</div>

				<div class="form-group">
					<input type="submit" name="signup" value="Sign Up" class="btn btn-default btn-lg" />
				</div>
		</form>

	<h5>Already Registered? <a href="login.php">Login Here</a></h5>
</div>

<!-- Footer -->
<footer class="footer-fluid bg-2 text-center ">

  <p>Paxi: Sosyal Taksi is a group project of </p>
  <p>Halil Onur Arslantürk, Tolgahan Vahaplar and Kerem Ürman</p> 
   
   <a href="http://www.google.com" ><i style="margin-right: 5px; color: #000000;" class="glyphicon glyphicon-globe"></i></a>
   <a href="http://www.twitter.com" ><i style="margin-right: 5px; color: #000000;" class="glyphicon glyphicon-retweet"></i></a>
   <a href="http://www.gmail.com" ><i style="margin-right: 5px; color: #000000;" class="glyphicon glyphicon-envelope"></i></a>
   
</footer>

</body>
</html>
