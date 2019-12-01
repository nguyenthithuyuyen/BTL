<?php
error_reporting("all");
include('../connectdb.php');
$connectdb= new connect();
$con=$connectdb->connect_db();
session_start();
if($_SESSION[login] != 1)
{
	header("location: ../index.php");
}
session_destroy();
header("location: ../index.php")
?>