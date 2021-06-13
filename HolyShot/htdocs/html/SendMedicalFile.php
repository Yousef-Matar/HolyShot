<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        
        $reportID=$_POST['reportID'];
        $reportID = mysqli_real_escape_string($conn,$reportID); 
        $doctorUsername=$_SESSION["username"];
        $patientUsername=$_POST['puname'];
        $patientUsername = mysqli_real_escape_string($conn,$patientUsername); 
        $time = date('h:i A',strtotime($_POST['appointmenttime']));
        $time = mysqli_real_escape_string($conn,$time); 
        $diagnosis = $_POST['diagnosis'];
        $diagnosis = mysqli_real_escape_string($conn,$diagnosis); 
        $prescription = $_POST['prescription'];
        $prescription = mysqli_real_escape_string($conn,$prescription); 

        
mysqli_query($conn, "INSERT INTO medicalreport (REPORT_ID, DRNAME, PatientName, DIAGNOSIS, Prescription,AppointmentTime)  VALUES('$reportID','$doctorUsername','$patientUsername','$diagnosis','$prescription','$time')");
              
              echo '<script type="text/javascript">alert("Medical File added successfully!");
			location="MedicalFile.php";</script>' ;

    ?>