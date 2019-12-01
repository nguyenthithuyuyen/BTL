<?php
error_reporting("all");

//Kết nối database
include("connectdb.php");
$connectdb= new connect();

//Kiểm tra nhấn nút Sign Up thì lưu thông tin đăng kí vào database
if(isset($_POST[signup])){
	
	$con=$connectdb->connect_db();
	$user=$_POST[user];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE username='$user'"))>0)
	{
		echo '<script>alert("Sign up fail, acount alrealy exit!")</script>';
		echo '<meta http-equiv="refresh" content="0; URL=register.php">';
	}
	else
	{
		$fullname=$_POST[name];
		$password=md5(md5($_POST[password]));
		$email=$_POST[email];
		$phone=$_POST[phone];
		$sql="INSERT INTO users(username, password, fullname, email, phone) VALUES ('$user','$password','$fullname','$email','$phone')";
		if($result=mysqli_query($con, $sql))
		{
			echo '<script>alert("Sign up sucess!")</script>';
			echo '<meta http-equiv="refresh" content="0; URL=index.php">';
		}
		else
		{
			echo '<script>alert("Sign up fail try again please!")</script>';
			echo '<meta http-equiv="refresh" content="0; URL=register.php">';
		}
	}
}

//Kiểm tra Đăng nhập (Nhấn nút Login)
if(isset($_POST[login])){
	$con=$connectdb->connect_db();
	$user=$_POST[user];
	$password=md5(md5($_POST[password]));
	$sql="SELECT * FROM users WHERE username='$user' and password='$password'";
	$result=mysqli_query($con,$sql);
	$num=mysqli_num_rows($result);
	//echo $num;
	if($num>0)
	{
		session_start();
		$row=mysqli_fetch_array($result);
		$_SESSION[fullname]=$row[fullname];
		$_SESSION[userid]=$row[userid];
		$_SESSION[login]=1;
		header("location:device/home.php");
	}
	else
	{
		echo '<meta http-equiv="refresh" content="0; URL=index.php">';
		echo '<script>alert("Username Or Password Incorrect")</script>';
	}


}
?>