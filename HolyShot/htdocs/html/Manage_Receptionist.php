<?php
	session_start();
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "31S!VQ2z[lzTBe4_";
    $db = "clinicdatabase";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    $username=$_SESSION['username'];
    $sql = "SELECT * FROM receptionist";
    $result=  mysqli_query($conn, $sql);
    ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Manage Receptionists</title>
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
        <h1 class="centered">Manage Receptionists</h1>
        <div class="right-btn">
          <button
            class="lrg-green-btn"
            onclick="formtoggle(document.getElementById('AddReceptionistForm').id)"
          >
            Add Receptionist <i class="fa fa-plus"></i>
          </button>
          <button class="lrg-green-btn" onclick="window.print()">
            Print <i class="fa fa-print"></i>
          </button>
        </div>
      </div>
      <div class="form-popup" id="AddReceptionistForm">
        <form class="form-inline"
        method="POST"
                  action="AddRecptionist.php">
         
          <div class="label-input">
            <label for="receptionistname">Receptionist's Name</label>
            <input
              id="receptionistname"
              type="text"
              placeholder="Enter the Receptionist's name"
              name="receptionistname"
              required
            />
          </div>
          <div class="label-input">
            <label for="receptionistusername">Receptionist's Username</label>
            <input
              id="receptionistusername"
              type="text"
              placeholder="Enter the Receptionist's username"
              name="receptionistusername"
              required
            />
            <div class="label-input">
              <label for="shift">Shift:</label>
              <select id="receptionistshift" name="shift">
                <option value="Morning" selected>Morning</option>
                <option value="Night">Night</option>
              </select>
            </div>
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
              onclick="formtoggle(document.getElementById('AddReceptionistForm').id)"
            >
              Close
            </button>
          </div>
        </form>
      </div>
      <table class="table-style" id="ManageReceptionistTable">
        <tr>
        
          <th>Name</th>
          <th>UserName</th>
          <th>Shift</th>
          <th>Manage</th>
        </tr>
  
        <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['Name'];?></td>
                <td><?php echo $rows['RUserName'];?></td>
                <td><?php echo $rows['Shift'];?></td>
                <td>
            <button class="s-red-btn" onclick="refresh();" id="FireReceptionistBtn"data-id= "<?php echo $rows['RUserName']; ?>">
              Fire <i class="fa fa-minus"></i>
            </button>
          </td>
            </tr>
            <?php
                }
             ?>
      </table>
    </div>
    <script>
     $("#ManageReceptionistTable").on(
        "click",
        "#FireReceptionistBtn",
        function() {
            var _id = $(this).attr('data-id');
         
            $.ajax({
                url: 'FireReceptionist.php',
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
