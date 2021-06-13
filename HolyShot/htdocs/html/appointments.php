<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        $pname = $_SESSION["username"];

        $date = date('Y-m-d', strtotime($_POST['appDate']));
        $date = mysqli_real_escape_string($conn,$date); 
        $time = date('h:i A',strtotime($_POST['appTime']));
        $time = mysqli_real_escape_string($conn,$time); 
        $specialization = $_POST['doctorSpecilization'];


        $specialization = mysqli_real_escape_string($conn,$specialization); 
        $drq="SELECT DR_username FROM doctor WHERE Specialization='$specialization'";
        $result = $conn->query($drq);

            $dr = $result->fetch_array()[0] ?? '';
        
        
      
              mysqli_query($conn, "INSERT INTO appointment (DR_USERNAME, PATIENTNAME, Day, Time, specialization)  VALUES('$dr','$pname','$date', '$time', '$specialization')");
              
              echo '<script type="text/javascript">alert("Appointment booked successfully!");
			location="profilepage.html";</script>' ;

    ?>