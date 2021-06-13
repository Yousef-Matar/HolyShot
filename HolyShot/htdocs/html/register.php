<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    if (isset($_REQUEST['username'])){
      $fname = stripslashes($_POST['fname']);
      $fname = mysqli_real_escape_string($conn,$fname); 
      $username = stripslashes($_POST['username']);
      $username = mysqli_real_escape_string($conn,$username); 
      $email = stripslashes($_POST['email']);
      $email = mysqli_real_escape_string($conn,$email);
      $password = stripslashes($_POST['password']);
      $password = mysqli_real_escape_string($conn,$password);
    }
  	      mysqli_query($conn, "INSERT INTO patient (Name,Username, Email, Password)  VALUES('$fname','$username', '$email', '$password')");
  	      $_SESSION['username'] = $username;
  	      header('location: login.html');
  ?>