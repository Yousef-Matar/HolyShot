<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
	$username=$_SESSION['username'];
	$sqli="SELECT * FROM patient WHERE Username='$username'";
	$res=mysqli_query($conn,$sqli);
		if (isset($_POST['fname']))
		{
			$newName=$_POST['fname'];
			$newName = mysqli_real_escape_string($conn,$newName); 
			$sqli  = "UPDATE patient SET Name='$newName' WHERE Username='$username'";
			$res    = mysqli_query($conn,$sqli); 	
		}
        if(isset($_POST['email'])){
			$newEmail=$_POST['email'];
			$newEmail = mysqli_real_escape_string($conn,$newEmail); 
			$sqli  = "UPDATE patient SET Email='$newEmail' WHERE Username='$username'";
			$res    = mysqli_query($conn,$sqli);  
        }
        if(isset($_POST['newpsw'])){
			$newPassword=$_POST['newpsw'];
			$newPassword = mysqli_real_escape_string($conn,$newPassword); 
			$sqli  = "UPDATE patient SET Password='$newPassword' WHERE Username='$username'";
			$res    = mysqli_query($conn,$sqli); 
        }
		
	
		mysqli_close($conn);
		header('location: profilepage.html');

	
?>