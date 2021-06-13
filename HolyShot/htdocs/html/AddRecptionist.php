<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        
        $receptionistname=$_POST['receptionistname'];
        $receptionistname = mysqli_real_escape_string($conn,$receptionistname); 
        $receptionistusername=$_POST['receptionistusername'];
        $receptionistusername = mysqli_real_escape_string($conn,$receptionistusername); 
        $receptionistshift=$_POST['shift'];
        $_POST['password']='receptionist1234';
        $receptionistpassword=$_POST['password'];
      
        

        
mysqli_query($conn, "INSERT INTO receptionist (Name, RUserName, RPassword, Shift)  VALUES('$receptionistname','$receptionistusername','$receptionistpassword','$receptionistshift')");
              
              echo '<script type="text/javascript">alert("Receptionist added successfully!");
			location="Manage_Receptionist.php";</script>' ;

    ?>