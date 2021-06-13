<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $username=$_SESSION['username'];
    $sql = "Select * from doctor";
    $result=  mysqli_query($conn, $sql);

    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Manage Doctors</title>
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
  <body>
    <div class="wrapper">
      <div class="title-container">
        <h1 class="centered">Manage Doctors</h1>
        <div class="right-btn">
          <button
            class="lrg-green-btn"
            onclick="formtoggle(document.getElementById('AddDoctorForm').id)"
          >
            Add Doctor <i class="fa fa-plus"></i>
          </button>
          <button class="lrg-green-btn" onclick="window.print()">
            Print <i class="fa fa-print"></i>
          </button>
        </div>
      </div>
      <div class="form-popup" id="AddDoctorForm">
        <form class="form-inline"
        onsubmit="return validateForm(document.getElementById('AddDoctorForm').id)"
        method="post";
          action="AddDoctor.php"
          >
       
          <div class="label-input">
            <label for="doctorname">Doctor's Name</label>
            <input
              id="doctorname"
              type="text"
              placeholder="Enter the Doctor's name"
              name="doctorname"
              required
            />
          </div>
          <div class="label-input">
            <label for="doctorusername">Doctor's Username</label>
            <input
              id="doctorusername"
              type="text"
              placeholder="Enter the Doctor's username"
              name="doctorusername"
              required
            />
          </div>
          <div class="label-input">
            <label for="shift">Shift:</label>
            <select id="doctorshift" name="shift">
              <option value="Morning" selected>Morning</option>
              <option value="Night">Night</option>
            </select>
          </div>
          <div class="label-input">
            <label for="doctorphone">Doctor's Phone</label>
            <input
              id="doctorphone"
              type="text"
              placeholder="Enter the Doctor's phone"
              name="doctorphone"
              required
            />
          </div>
          <div class="label-input">
            <label for="doctorspecilization">Doctor's Specilization</label>
            <select
              id="doctorSpecilization"
              name="doctorSpecilization"
            >
              <option value="Dentist">Dentist</option>
              <option value="Cardiologist">Cardiologist</option>
              <option value="Dermatologist">Dermatologist</option>
              <option value="Neurologist">Neurologist</option>
              <option value="Tamargy">Intern</option>
            </select>
          </div>
          <div class="label-input">
            <button
              class="lrg-green-btn"
              type="submit"
              class="submit-btn"
              id="addDoctorBtn"
            >
              Confirm
            </button>
            <button
              type="button"
              class="lrg-red-btn"
              onclick="formtoggle(document.getElementById('AddDoctorForm').id)"
            >
              Close
            </button>
          </div>
        </form>
      </div>
      <table class="table-style" id="ManageDoctorTable">
        <tr>
          <th>Name</th>
          <th>UserName</th>
          <th>Shift</th>
          <th>Phone Number</th>
          <th>Specilization</th>
      
        </tr>
        <tr>
        <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['DR_Name'];?></td>
                <td><?php echo $rows['DR_username'];?></td>
                <td><?php echo $rows['Shift'];?></td>
                <td><?php echo $rows['Phonenumber'];?></td>
                <td><?php echo $rows['Specialization'];?></td>
            
             
            </tr>
            <?php
                }
             ?>
          
      </table>
    </div>
  
  </body>
</html>
