<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "31S!VQ2z[lzTBe4_";
 $db = "clinicdatabase";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>