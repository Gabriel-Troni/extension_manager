<?php
if(!isset($_SESSION["name"], $_SESSION["email"], $_SESSION["password"])){
   header("location: logout.php");
   exit();
 }
 ?>