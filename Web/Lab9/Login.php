<?php
session_start();
if(isset($_SESSION['emailAddressK'])){
	session_destroy();
}
$err= "";
require "ConnectionInfo.php";
?>
<?php
if(isset($_POST['emailAdd'])
		&& isset($_POST['pass']) )
{
	//connecting to database Server
	$serverConnection = mysqli_connect($db_host, $db_username, $db_password, $db_name);
	if (mysqli_connect_error()) {
    		die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  	}


	$emailAdd = $_POST['emailAdd'];
	$password= $_POST['pass'];
	$query = "Select * from Employee where emailAddress =  '$emailAdd' and  password = '$password'";
	$result = mysqli_query($serverConnection,$query);
	if($result && ($result->num_rows == 1)){
	 		$serverConnection->close();
			$_SESSION['emailAddressK'] = $emailAdd;
			header("Location:ViewAllEmployees.php");
			//echo"server";
			//header("Location:https://www.shabrinasharmin.com/CST8238/Lab9/ViewAllEmployees.php");
			exit;
	} else {
			 $err = "Please enter correct email address and password<br>";
	}
	$serverConnection->close();
}
?>
<!DOCTYPE html>
<html lang = "en">

<head>
	<link type="text/css" rel="stylesheet" href="style/styleSheet.css">
</head>

<body>

<?php include 'Header.php';?>

<div id = "content">
	<form method="post" action = "Login.php">
		<h2> LOGIN</h2></br>
		<label>Email Address</label>
		<input type = "email" name="emailAdd"></br>
		<label>Password</label>	
		<input type = "password" name="pass"></br>	
		<input type = "submit" name="login" value="Login">		
	</form>
	<?php echo $err ?>
</div>

<?php include 'Footer.php';?>

</body>
</html>