<?php
error_reporting("all");

class connect{
	function connect_db(){
		$con="localhost";
		$user="root";
		$pass="";
		$database="home";
		$connect=mysqli_connect($con, $user, $pass, $database) or die ("connecting database is fail!");
		mysqli_set_charset($connect, 'utf8');
		return $connect;
	}


	function get_ip_detail($ip){
		$ip_respone=file_get_contents('http://ip-api.com/json/'.$ip);
		$ip_array=json_decode($ip_respone);
		return $ip_array;
	}
}
?>
