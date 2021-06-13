<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $username=$_SESSION['username'];
    $role=$_SESSION['role'];
    if($role==0){
      $sql = "SELECT * FROM medicalreport where PatientName= '$username'";
    }
    elseif($role==1||$role==3){
      $sql = "SELECT * FROM medicalreport";
    }
    elseif($role==2){
      $sql = "SELECT * FROM medicalreport where DRNAME='$username'";
    }
    
    $result=  mysqli_query($conn, $sql);
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Medical File</title>
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
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="../js/scripts.js"></script>
  </head>
  <body onload="getMedicalFileUrlParams()">
    <div class="wrapper">
      <div class="title-container">
        <h1 class="centered">Patient's Medical File</h1>
        <ul class="list-style">
          <li id="PatientName">Username:  <?php echo $_SESSION['username']; ?></li>

        </ul>

        <div class="right-btn">
          <?php

if($role==2)
{ 
  echo '

          <button
            class="lrg-green-btn"
            onclick="formtoggleAddReport()"
          >
            Add Report <i class="fa fa-plus"></i>
          </button>';
}
          ?>
          <button class="lrg-green-btn" onclick="window.print()">
            Print <i class="fa fa-print"></i>
          </button>
        </div>
      </div>
      <div class="form-popup" id="AddReportForm">
        <form class="form-inline"
        method="post";
          action="SendMedicalFile.php"
          onsubmit="return validateForm(document.getElementById('AddReportForm').id)">
          <div class="label-input">
            <label for="reportID">Report's ID</label>
            <input
              id="reportID"
              type="text"
              placeholder="Enter the Report's ID"
              name="reportID"
              required
            />
          </div>
          <div class="label-input">
            <label for="appointmentdate">Patient's Username</label>
            <input
              id="puname"
              type="text"
              placeholder="Enter Patient's username"
              name="puname"
              required
            />
          </div>
          <div class="label-input">
            <label for="appointmenttime">Appointment's Time</label>
            <input
              id="appointmenttime"
              type="time"
              name="appointmenttime"
              required
            />
          </div>
         
          <div class="label-input">
            <label for="diagnosis">Diagnosis</label>
            <input
              id="diagnosis"
              type="text"
              placeholder="Enter the Diagnosis"
              name="diagnosis"
              required
            />
          </div>
          <div class="label-input">
            <label for="prescription">Prescription</label>
            <input
              id="prescription"
              type="text"
              placeholder="Enter the Prescription"
              name="prescription"
              required
            />
          </div>
          <div class="label-input">
            <button
              class="lrg-green-btn"
              type="submit"
              class="submit-btn"
              id="addReportBtn"
            >
              Confirm
            </button>
            <button
              type="button"
              class="lrg-red-btn"
              onclick="formtoggleAddReport()"
            >
              Close
            </button>
          </div>
        </form>
      </div>
      <table class="table-style" id="MedicalReportTable">
        <tr>
          <th>Report ID</th>
          <th>Appointment Time</th>
          <th>Doctor Username</th>
          <th>Patient Username</th>
          <th>Diagnosis</th>
          <th>Prescription</th>
        </tr>
        <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['REPORT_ID'];?></td>
                <td><?php echo $rows['AppointmentTime'];?></td>
                <td><?php echo $rows['DRNAME'];?></td>
                <td><?php echo $rows['PatientName'];?></td>
                <td><?php echo $rows['DIAGNOSIS'];?></td>
                <td><?php echo $rows['Prescription'];?></td>
            </tr>
            <?php
                }
             ?>
      </table>
    </div>
  </body>
</html>
