<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $username=$_SESSION['username'];
    $role=$_SESSION['role'];
    if($role==2){
      $sql = "SELECT * FROM patient where Username= (Select PATIENTNAME from appointment where DR_USERNAME= '$username')";

    }
    elseif($role==3){
      $sql = "SELECT * FROM patient";
    }
    $result=  mysqli_query($conn, $sql);

    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Patients Information</title>
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
  <body>
    <div class="wrapper">
      <div class="title-container">
        <h1 class="centered">Patients' Information</h1>
        <div class="right-btn">
        <a href="MedicalFile.php" target="_blank"><button
              class="lrg-green-btn"
            
            >
              Medical File
              <i class="fa fa-file"></i>
            </button></a>
          <button class="lrg-green-btn" onclick="window.print()">
            Print <i class="fa fa-print"></i>
          </button>
        </div>
      </div>
      <table class="table-style">
        <tr>
 
          <th>Name</th>
          <th>UserName</th>
          <th>Email</th>
        </tr>
        <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['Username'];?></td>
                <td><?php echo $rows['Email'];?></td>
                
            </tr>
            <?php
                }
             ?>
      </table>
    </div>
  </body>
</html>
