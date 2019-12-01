<?php
error_reporting("all");
include('../connectdb.php');
$connectdb = new connect();
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
 	padding: 3px 8px;
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
<?php
if(isset($_GET[id]))
{
	error_reporting("all");
	$idtb=$_GET[id];	
	$con = $connectdb->connect_db();
	$query="SELECT d.deviceid ,d.name, d.serinum, d.placeid, d.typeid ,p.name as place, t.name as type FROM devices d inner join devicere dr on d.deviceid=dr.deviceid inner join place p on d.placeid=p.placeid inner join type t on d.typeid=t.typeid WHERE d.deviceid=$idtb";
	$result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
}
?>
	<div>
		<form action="process.php" method="post" name="alter">
			<table align="center" border="0">
				<tr class="tieude"><td colspan="2" align="center"><h2>EDIT DEVICE INFORMATION</h2></td></tr>
				<tr class="noidung">
					<td class="tieude">Id Device</td>
					<td class="input"><input type="text" name="txtid" class="style" value="<?= $row[deviceid]?>" readonly></input></td>
				</tr>
				<tr class="noidung">
					<td class="tieude">Serinumber</td>
					<td class="input"><input type="text" name="txtser" class="style" value="<?= $row[serinum]?>"></input></td>
				</tr>
				<tr class="noidung">
					<td class="tieude">Device Name</td>
					<td class="input"><input type="text" name="txtname" class="style" value="<?= $row[name]?>"></td>
				</tr>
				<tr class="noidung">
					<td class="tieude">Place</td>
					<td class="input">
						<select name="place" class="style">
							<option value="<?= $row[placeid] ?>"><?= $row[place] ?></option>
					<?php 
						$qplace="SELECT * FROM place WHERE placeid not in (select placeid from devices WHERE devices.deviceid=$idtb)";
						$resultplace=mysqli_query($con, $qplace);
						while($rowplace=mysqli_fetch_array($resultplace))
						{
							echo'<option value="'.$rowplace[placeid].'">'.$rowplace[name].'</option>';
						}
					?>
						</select>
					</td>
				</tr>
				<tr class="noidung">
					<td class="tieude">Type of deice</td>
					<td class="input">
						<select name="type" class="style">
							<option value="<?=$row[typeid]?>"><?= $row[type] ?></option>
				<?php 
						$querytype="SELECT * FROM type WHERE typeid not in (select typeid from devices WHERE devices.deviceid=$idtb)";
						$resulttype=mysqli_query($con, $querytype);
						while($rowtype=mysqli_fetch_array($resulttype))
						{
							echo'<option value="'.$rowtype[typeid].'">'.$rowtype[name].'</option>';
						}
					?>
						</select>
					</td>
				</tr>
				<tr class="noidung">
					<td colspan="2" align="center">
						<input type="submit" name="btnupdate" class="btn" value="Update" onclick="return checkdata()">
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
		var name=document.forms['alter']['txtname'].value
		var id=document.forms['alter']['txtid'].value
		if(name=="" || id=="")
		{
			alert("Please, input information");
			return false;
		}
	}
</script>