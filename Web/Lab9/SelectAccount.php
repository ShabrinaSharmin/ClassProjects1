<?php
session_start();
if(!isset($_SESSION['emailAddressK']) ){
	header("Location: Admin.php");
	//header("Location:https://www.shabrinasharmin.com/CST8238/Lab9/Login.php");
	exit;
}
require "ConnectionInfo.php";
?>

<!DOCTYPE html>
<html lang = "en">

<head>
	<link type="text/css" rel="stylesheet" href="style/styleSheet.css">
</head>

<body>

<?php include 'Header.php';?>

<div id = "content">

<?php
			//connecting to the server and thge database
  			$serverConnection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

  			if (mysqli_connect_error()) {
    			die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  			}

			 $sqlQuery = "SELECT firstName, lastName, emailAddress, phnNum, sinNum, designation FROM Employee ";
			//Query to the database
			$result = mysqli_query($serverConnection, $sqlQuery);	
			if($result){
				if($result->num_rows > 0){
					echo"<div class = \"cvtable\">";
       						echo"<table class=\"table\">";
           				
				 			while($row = mysqli_fetch_array($result))
     						{
     							echo"<tr>";
                    echo"<td>";
                    echo"<form action = \"UpdateAccount.php\" method = \"post\">";
                    echo"<input type=\"submit\" value=\"Edit\"></input>";
                    echo"</td>";
     								echo"<td>First Name: ".$row['firstName']."</td>";
               			echo"<td>LastName: ".$row['lastName']."</td>";
     							echo"<tr>";
    						}
             			echo"</table>";
           			echo"</div>";
           		}
			 } else {
			 	die(mysqli_errno($serverConnection));
			 }
		 $serverConnection->close();
			
?>



</div>

<?php include 'Footer.php';?>

</body>
</html>
