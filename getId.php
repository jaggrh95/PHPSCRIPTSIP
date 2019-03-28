<?php
$host='35.187.65.87';
$uname='root';
$pwd='';
$db='scale';
$con = mysqli_connect($host,$uname,$pwd) or die("connection failed");
mysqli_select_db($con,$db) or die("db selection failed");

if(isset($_POST['username'])){
        
        $username = $_POST['username'];
        
    }
    if(isset($_POST['password'])){
        
        $password = $_POST['password'];
        
    }
   
$hashed_password = md5($password);
$r=mysqli_query($con,"select id from users where username = '$username' AND password = '$hashed_password' limit 1");

while($row=mysqli_fetch_assoc($r))
{
$cls["id"]=$row;
//echo $fin."<br>";
}
echo json_encode($cls);

mysqli_close($con);

?>