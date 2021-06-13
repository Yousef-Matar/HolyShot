<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

		$username=$_POST['username'];
		$password=$_POST['password'];
		$_SESSION['loggedin']=false;
		$check=mysqli_query($conn,"select * from patient where Username='$username' and Password='$password'");
		$check1=mysqli_query($conn,"select * from receptionist where RUserName='$username' and RPassword='$password'");
		$check2=mysqli_query($conn,"select * from doctor where DR_username='$username' and DR_password='$password'");
		$check3=mysqli_query($conn,"select * from admin where AdminUserName='$username' and AdminPass='$password'");


		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['username']=$username;
			$_SESSION['loggedin']=true;
			$_SESSION['role']=0;

            header("Location: index.html");
		}
		elseif(mysqli_num_rows($check1)>0){
			$_SESSION['username']=$username;
			$_SESSION['loggedin']=true;
			$_SESSION['role']=1;

            header("Location: Receptionist_Panel.html");

		}
		elseif(mysqli_num_rows($check2)>0){
			$_SESSION['username']=$username;
			$_SESSION['loggedin']=true;
			$_SESSION['role']=2;

            header("Location: Doctor_Panel.html");

		}
		elseif(mysqli_num_rows($check3)>0){
			$_SESSION['username']=$username;
			$_SESSION['loggedin']=true;
			$_SESSION['role']=3;
            header("Location: Admin_Panel.html");

		}
		else{
			echo '<script type="text/javascript">alert("Wrong Username or Password, please try again.");
			location="login.html";</script>' ;
		}
		mysqli_close($conn);
	
?>