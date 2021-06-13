<nav>
            <ul class="topnav" id="nav_active" >
                <li class="float-shadow"><a class="active" href="../html/index.html">Home</a></li>
                <li class="float-shadow"><a href="../html/gallery.html">Gallery</a></li>
                <li class="float-shadow"><a href="../html/About.html">About Us</a></li>
                <li><a href="../html/contact.html">Contact Us</a></li>
                <?php 

                if($_SESSION['loggedin'])
                  
                    echo' <li id="booking_btn"><a href="../html/appointments.html">Book</a></li>';
                ?>
                  
                <ul>
                    <li class="logo"><img id="logo" src="../img/Edeni_El_حo2na-removebg-preview.png" /></li>
                </ul>
                <div style="float: right;" >
                <?php 

                if($_SESSION['loggedin'])
                  { 
                    echo '<li id="profile"><a href="../html/profilepage.html" > Profile</a></li>';

                    echo '<li id="logout" ><a href="../html/logout.php">Logout</a></li>';

                  }
                else
                  {
                    echo' <li id="login"><a href="../html/login.html">Login</a></li>';
                    echo' <li id="register"><a href="../html/Register.html">Register</a></li>';
                  }
                ?>
            </div>
            </ul>
        </nav>