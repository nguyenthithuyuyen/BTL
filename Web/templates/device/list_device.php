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

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Home</title>
</head>
<style type="text/css">
 table{
 	width: 90%;
 	height: 100%;
 	margin-top: 100px;
 	border: #93b1de;
 }
 body{
 	background-color:#e9ebee;
 }
 h2{
 	color: #ffff;
 }
 tr.tieude{
 	width: 20%;
 	height: 50px;
 	background-image: linear-gradient(to left, #9c79fd, #34c9fe);/*#74ebd5#9face6*/
 }
 tr.tieude1{
 	height: 45px;
 	font-size: 19px;
 	font-weight: bold;
 	text-align: center;
 	background-color: #c8d8f1;
 }
 tr.noidung{
 	width: 20%;
 	height: 40px;
 	background-color: #ffff;
 	text-align: left;
 	font-size: 18px;
 }
 a{
 	text-decoration: none;
 }
 a.style{
 	font-size: 20px;
 	align-items: center;
 }
 .link{
 	padding: 20px 0px;
 	width: 100%;
 	height: auto;
 	text-align: center;
 } 
</style>
<body>

</body>
	<table align="center" border="1" cellspacing="0" width="600">
		<tr class="tieude"><td colspan="7" align="center"><h2>My Device List</h2></td></tr>
		<tr class="tieude1">
			<td>Num</td>
			<td>Serinumber</td>
			<td>Name</td>
			<td>Place</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
<?php

if(isset($_GET[id]))
{
	$idtb=$_GET[id];
	//echo "delete from khachhang where makh=$makh";
	if(mysqli_query($con,"DELETE FROM devices WHERE deviceid=$idtb"))
		if(mysqli_query($con,"DELETE FROM devicere WHERE deviceid=$idtb"))
		{}//echo 'Xóa thành công';
	else
		{}//echo 'Xóa thất bại';		
}

	$sql="SELECT d.name, d.serinum, d.status, d.deviceid, p.name as place, t.name as type FROM devices d inner join devicere dr on d.deviceid=dr.deviceid inner join place p on d.placeid=p.placeid inner join type t on d.typeid=t.typeid WHERE dr.userid=$_SESSION[userid]";
	$result=mysqli_query($con,$sql);
	$num=1; // số thứ tự
	while($row=mysqli_fetch_array($result))
	{
		echo'<tr class="noidung">
			<td style="text-align: center;">'.$num.'</td>
			<td style="padding: 0px 10px;">'.$row[serinum].'</td>
			<td style="padding: 0px 10px;">'.$row[name].'</td>
			<td style="text-align: center;">'.$row[place].'</td>
			<td style="text-align: center;"><a href="alterinfordevice.php?id='.$row[deviceid].'">Edit</a></td>
			<td style="text-align: center;"><a onclick=" return confirmDele(\' '.$row[name].'\')" href="list_device.php?id='.$row[deviceid].'">Delete</a></td>
		</tr>';
		$num++;
	}
?>		
	</table>
	<div class="link">
		<a href="home.php" class="style">My home</a> |
		<a href="addevice.php" class="style">Registration device</a>
	</div>
</html>

<script>
function confirmDele(value)
{
	return confirm('Are you sure you want to delete the device '+value);	
}
</script>