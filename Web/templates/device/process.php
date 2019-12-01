<?php

error_reporting("all");
include('../connectdb.php');
$connectdb= new connect();
session_start();

//Lây thời gian thực
$user_ip=$_SERVER['REMOTE_ADDR'];
$ip_array=$connectdb->get_ip_detail($user_ip);
$city=$ip_array->timezone;

date_default_timezone_set($city);
$datetime=date("d/m/y H:i:s");
//////


if($_SESSION[login] != 1)
{
	header("location: ../index.php");
}

//Đăng kí thiết bị mới
if(isset($_POST[btnregist]))
{
	$con=$connectdb->connect_db();
	$serinum=$_POST[txtser];
	if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM devicere WHERE serinum='$serinum'"))>0)
	{
		echo '<script>
				alert("Device already exists!");
				window.location="addevice.php";
			</script>';
	}
	else
	{
		$userid=$_SESSION[userid];
		$name=$_POST[txtname];
		$place=$_POST[place];
		$type=$_POST[type];
		$sql="INSERT INTO devicere(userid, serinum) VALUES ('$userid','$serinum')";
		if(mysqli_query($con, $sql)){
			$kq1=mysqli_fetch_array(mysqli_query($con,"SELECT deviceid FROM devicere WHERE serinum='$serinum'"));
			$deviceid=$kq1[deviceid];

			$sql1="INSERT INTO devices( deviceid , name, serinum, status, time, placeid, typeid) VALUES ( $deviceid,'$name','$serinum','0','$datetime','$place','$type')";
			if(mysqli_query($con, $sql1)){
				echo '<script>
						alert("Registing Success!");
						window.location="addevice.php";
					</script>';
			}
			else
			{
				echo '<script>
						alert("Registing Fail!");
						window.location="addevice.php";
					</script>';
			}
		}
	}

}

//Sửa thiết bị
if(isset($_POST[btnupdate]))
{
	$con    = $connectdb->connect_db();
	$id     = $_POST[txtid];
	$seri   = $_POST[txtser];
	$name   = $_POST[txtname];
	$place  = $_POST[place];
	$type   = $_POST[type];

	$sql="SELECT * FROM devices WHERE deviceid=$id";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);
	$seriold=$row[serinum];
	$num=mysqli_num_rows($result);
	if($num>0){
		if($seriold != $seri)
		{
			//update lai bang devicere (truong serinum)
			$sql2="UPDATE devicere SET serinum ='$seri' WHERE deviceid=$id";
			$result2=mysqli_query($con, $sql2);
		}
		//sql update bảng devices
		$sql1="UPDATE devices SET name='$name',serinum='$seri', placeid=$place, typeid=$type WHERE deviceid=$id";
		if(mysqli_query($con, $sql1))
		{
				echo '<script>
						alert("Update Success!");
						window.location="list_device.php";
					</script>';
		}
		else
		{
			echo '<script>
						alert("Update Fail!");
						window.location="alterinfordevice.php";
					</script>';
		}
	}
	else{
		
		echo '<script>
				alert("Device does not exist!");
				window.location="alterinfordevice.php";
			</script>';
	}
}
?>


