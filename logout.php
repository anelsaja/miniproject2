<?php 
require "session.php";

session_unset();
session_destroy();
header("Location: halamanutama.php");
exit();
?>