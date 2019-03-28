<?php
$host='35.187.65.87';
$uname='root';
$pwd='';
$db='scale';
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

$r=mysqli_query($con,"select weight,Date from weight where userprofilenr = 5 AND Date IN (select max(Date) from weight) limit 1");

while($row=mysqli_fetch_assoc($r))
{
$cls["data2"]=$row;
}

echo json_encode($cls);
mysqli_close($con);


?>