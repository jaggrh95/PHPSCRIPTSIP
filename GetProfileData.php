<?php
$host='35.242.253.184';
$uname='root';
$pwd='smartscale';
$db='scale';
error_reporting(E_ERROR);
$con = mysqli_connect($host,$uname,$pwd) or die("connection failed");
mysqli_select_db($con,$db) or die("db selection failed");

if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        
    }


$r=mysqli_query($con,"select username,age,Length,desiredweight from users where id = '$id' limit 1");


while($row=mysqli_fetch_assoc($r))
{
$cls["data1"]=$row;
}

$r=mysqli_query($con,"select weight,Date from weight where userprofilenr = '$id' AND Date IN (select max(Date) from weight) limit 1");


while($row=mysqli_fetch_assoc($r))
{
$cls["data2"]=$row;
}

if(empty($cls["data2"]))
{
	$cls["data2"]->weight = "0";
	$cls["data2"]->Date = "0";
	
}

echo json_encode($cls);
mysqli_close($con);


?>