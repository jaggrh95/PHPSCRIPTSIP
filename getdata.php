<?php
$host='35.242.253.184';
$uname='root';
$pwd='smartscale';
$db='scale';
$con = mysqli_connect($host,$uname,$pwd) or die("connection failed");
mysqli_select_db($con,$db) or die("db selection failed");

if(isset($_POST['username'])){
        
        $username = $_POST['username'];
        
    }
   
$r=mysqli_query($con,"select id from users where username = '$username' limit 1");

while($row=mysqli_fetch_assoc($r))
{
$cls["id"]=$row;
//echo $fin."<br>";
}
echo json_encode($cls);

mysqli_close($con);

?>