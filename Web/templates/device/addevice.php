<?php
error_reporting("all");
include('../connectdb.php');
$connectdb= new connect();
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
 	background-image: linear-gradient(to left, #9c79fd, #34c9fe);
 }
 tr.noidung{
 	width: 20%;
 	height: 60px;
 	background-color: #ffff;
 	text-align: left;
 	font-size: 30px;
 }
 td.tieude{
 	width: 30%;
 	text-align: right;
 	box-sizing: border-box;
 	padding-right: 20px;
 }
 td.input{
 	box-sizing: border-box;
 	padding: 3px 5px 3px 8px;
 	align-items: center;
 }
 select.style{
 	width: 50%; 
 	height: 95%;
 	font-size: 20px;
 }
 input.style{
 	font-size: 20px;
 	width: 99%;
 	height: 100%;
 	padding-left: 5px;
 }
 input.btn{
 	width: 10%;
 	height: 70%;
 	background-color: #81abea;
 	border-radius: 10px;
 	cursor: pointer;
 	font-size: 20px;
 	border: solid 0px;
 }
 input.btn:hover{
 	background-color: #16389a;
 	color: #ffff;
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
	<div>
		<form action="process.php" method="post" name="registdevice">
			<table align="center" border="0">
				<tr class="tieude"><td colspan="2" align="center"><h2>DEVICE REGISTRATION</h2></td></tr>
				<tr class="noidung">
					<td class="tieude">Serinumber</td>
					<td class="input"><input type="text" name="txtser" class="style"></input></td>
				</tr>
				<tr class="noidung">
					<td class="tieude">Device Name</td>
					<td class="input"><input type="text" name="txtname" class="style"></td>
				</tr>
				<tr class="noidung">
					<td class="tieude">Place</td>
					<td class="input">
						<select name="place" class="style">
							<option class="style">Choose a place</option>
							<option value="1">Living Room</option>
							<option value="2">Dining-Room</option>
						</select>
					</td>
				</tr>
				<tr class="noidung">
					<td class="tieude">Type of deice</td>
					<td class="input">
						<select name="type" class="style">
							<option class="style">Choose Type</option>
							<option value="1">Fan</option>
							<option value="2">Light</option>
						</select>
					</td>
				</tr>
				<tr class="noidung">
					<td colspan="2" align="center">
						<input type="submit" name="btnregist" class="btn" value="Sign up" onclick="return checkdata()">
						<input type="reset" name="btnreset" class="btn" value="Reset">
					</td>
				</tr>
			</table>
		</form>
		<div class="link">
			<a href="list_device.php" style="font-size: 20px;">Device List</a> |
			<a href="../device/" class="style">My home</a>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	function  checkdata(){
		var name=document.forms['registdevice']['txtname'].value
		var id=document.forms['registdevice']['txtid'].value
		if(name=="" || id=="")
		{
			alert("Please, input information");
			return false;
		}
	}
</script>