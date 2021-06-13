<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        
        $DoctorName=$_POST['doctorname'];
        $DoctorName = mysqli_real_escape_string($conn,$DoctorName); 
        $doctorUsername=$_POST['doctorusername'];
        $doctorUsername = mysqli_real_escape_string($conn,$doctorUsername); 
        $doctorshift=$_POST['shift'];
        $_POST['password']='doctor1234';
        $doctorpassword=$_POST['password'];
        $doctorphone=$_POST['doctorphone'];
        $doctorphone = mysqli_real_escape_string($conn,$doctorphone); 
        $specialization = $_POST['doctorSpecilization'];

        
mysqli_query($conn, "INSERT INTO doctor (DR_Name, DR_username, DR_password, Shift, Phonenumber,Specialization)  VALUES('$DoctorName','$doctorUsername','$doctorpassword','$doctorshift','$doctorphone','$specialization')");
              
              echo '<script type="text/javascript">alert("Doctor added successfully!");
			location="Manage_Doctors.php";</script>' ;

    ?>