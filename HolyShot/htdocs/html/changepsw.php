<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $username=$_SESSION['username'];
     $role=$_SESSION['role'];
    if($role==1){
        $sqli="SELECT * FROM receptionist WHERE RUserName='$username'";
    }
    elseif($role==2){
        $sqli="SELECT * FROM doctor WHERE DR_username='$username'";
      }
      elseif($role==3){
        $sqli="SELECT * FROM admin WHERE AdminUserName='$username'";
      }
    
	$res=mysqli_query($conn,$sqli);
    if(isset($_POST['newpsw'])){
        $newPassword=$_POST['newpsw'];
        $newPassword = mysqli_real_escape_string($conn,$newPassword); 
        if($role==1){
            $sqli  = "UPDATE receptionist SET RPassword='$newPassword' WHERE RUserName='$username'";
        }
        elseif($role==2){
            $sqli  = "UPDATE doctor SET DR_password='$newPassword' WHERE DR_username='$username'";
          }
          elseif($role==3){
            
            $sqli  = "UPDATE admin SET AdminPass='$newPassword' WHERE AdminUserName='$username'";

          }
        
        $res    = mysqli_query($conn,$sqli); 
    }
    mysqli_close($conn);
    if($role==1){
        header('location: Receptionist_Panel.html');
    }
    elseif($role==2){
        header('location: Doctor_Panel.html');
      }
      elseif($role==3){
        header('location: Admin_Panel.html');

      }
    

    ?>