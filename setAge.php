<?php
$host='35.242.253.184';
$uname='root';
$pwd='smartscale';
$db='scale';
$con = mysqli_connect($host,$uname,$pwd) or die("connection failed");
mysqli_select_db($con,$db) or die("db selection failed");

if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        
    }
if(isset($_POST['value'])){
        
        $value = $_POST['value'];

        
    }
$r=mysqli_query($con,"update users set age='$value' where id='$id'");

if ($r)
 {
    $json['success'] = 1;
    $json['message'] = "Successfully updated";
} else {
    $json['success'] = 0;
    $json['message'] = "Update Failed";
}

echo json_encode($json);
mysqli_close($con);


?>