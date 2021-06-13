<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $username=$_SESSION['username'];
    $sql = "SELECT * FROM appointment where PATIENTNAME= '$username'";
    $result=  mysqli_query($conn, $sql);

    ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Upcoming Appointments</title>
    <meta
      name="viewport"
      content="user-scalable=no, width=device-width, initial-scale=1.0"
    />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?ver=3.3.1"></script>
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
  ></script>
  <script src="../js/scripts.js"></script>
  <link rel="stylesheet" href="../css/styles.css" />
  </head>
  <body>
    <div class="wrapper">
      <div class="title-container">
        <h1 class="centered">Upcoming Appointments</h1>
        <ul class="list-style">
          <li >Username: <?php echo $_SESSION['username']; ?></li>

        </ul>
        <div class="right-btn">
          <button class="lrg-green-btn" onclick="window.print()">
            Print <i class="fa fa-print"></i>
          </button>
        </div>
      </div>
      <table class="table-style" id="UpcomingAppointmentsTable">
        <tr>
          <th>Appointment ID</th>
          <th>Appointment Doctor</th>
          <th>Appointment Time</th>
          <th>Appointment Date</th>
          <th>Doctor Specilization</th>
          <th>Manage</th>
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
                <td><?php echo $rows['Time'];?></td>
                <td><?php echo $rows['Day'];?></td>
                <td><?php echo $rows['specialization'];?></td>
                <td>
            <button class="s-red-btn" onclick="refresh();" id="cancelappointmentBtn" data-id= "<?php echo $rows['App_ID']; ?>">
              Cancel <i class="fa fa-minus"></i>
            </button>
          </td>
            </tr>
            <?php
                }
             ?>
      </table>
    </div>
    <script>
     $("#UpcomingAppointmentsTable").on(
        "click",
        "#cancelappointmentBtn",
        function() {
            var _id = $(this).attr('data-id');
         
            $.ajax({
                url: 'delete.php',
                data: {
                    App_ID: _id
                },
                type: 'POST',
                dataType: 'html',
                success: function(__resp) {
                    
                }
            });

        }
    );</script>
  </body>
</html>