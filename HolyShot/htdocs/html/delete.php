<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
   

    $App_ID = filter_input(INPUT_POST, 'App_ID', FILTER_SANITIZE_NUMBER_INT);
    $success = false;
    if($App_ID){
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        $sqli="delete from appointment where App_ID =  '$App_ID'";
        $result=mysqli_query($conn, $sqli);
        $success=true;

    }
    echo '<script type="text/javascript">alert("Appointment cancelled successfully!");
    location="UpcomingApps.php";</script>' ;

?>