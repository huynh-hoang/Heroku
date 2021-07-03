<?php
session_start();
unset($_SESSION["shop"]);
unset($_SESSION["name"]);
header("Location:login.php");
?>