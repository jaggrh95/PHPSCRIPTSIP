<?php
$host='35.242.253.184';
$uname='root';
$pwd='smartscale';
$db='scale';

error_reporting(E_ERROR);
$con = mysqli_connect($host,$uname,$pwd) or die("connection failed");
mysqli_select_db($con,$db) or die("db selection failed");



$count = 0;

if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        
    }
if(isset($_POST['table'])){
        
        $table = $_POST['table'];

        
    }

 $dataask=$table;
   
$r=mysqli_query($con,"select $table,Date from $table where UserprofileNr = '$id'");

while($row=mysqli_fetch_assoc($r))
{
$cls["dataset$count"]=$row;
$count = $count + 1;
//echo $fin."<br>";
}
if(empty($cls["dataset0"]))
{
	$cls["dataset0"]->weight = "0";
	
	$cls["dataset0"]->Date = "0";
	$cls["dataset0"]->bmi="0";

	$cls["dataset0"]->fat ="0";
	
}
echo json_encode($cls);

mysqli_close($con);

?>