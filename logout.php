<?php 
// session_start();
// setcookie("name","",time()-3600);
// session_destroy();

// header("location:login.php");
require "session.php";

session_unset();
session_destroy();
header("Location: halamanutama.php");
exit();
?>