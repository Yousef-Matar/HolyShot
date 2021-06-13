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
      $sql = "SELECT * FROM appointment";
    }
    else{
    $sql = "SELECT * FROM appointment where DR_USERNAME= '$username'";
    }
    $result=  mysqli_query($conn, $sql);
    ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Doctor Schedule</title>
    <meta
      name="viewport"
      content="user-scalable=no, width=device-width, initial-scale=1.0"
    />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <script src="../js/scripts.js"></script>
  </head>
  <body onload="getScheduleUrlParams()">
    <div class="wrapper">
      <div class="title-container">
        <h1 class="centered">Doctor's Schedule</h1>
        <ul class="list-style">
          <li>Username:<?php echo $_SESSION['username']; ?> </li>
        </ul>
        <div class="right-btn">
          <button class="lrg-green-btn" onclick="window.print()">
            Print <i class="fa fa-print"></i>
          </button>
        </div>
      </div>
      <table class="table-style">
        <tr>
          <th>Appointment ID</th>
          <th>Doctor Username</th>
          <th>Patient Username</th>
          <th>Date</th>
          <th>Time Slot</th>
  
        </tr>
        <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['App_ID'];?></td>
                <td><?php echo $rows['DR_USERNAME'];?></td>
                <td><?php echo $rows['PATIENTNAME'];?></td>
                <td><?php echo $rows['Day'];?></td>
                <td><?php echo $rows['Time'];?></td>
            </tr>
            <?php
                }
             ?>
      </table>
    </div>
  </body>
</html>
