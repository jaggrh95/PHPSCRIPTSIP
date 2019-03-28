<?php
$host='35.187.65.87';
$uname='root';
$pwd='';
$db='scale';
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
echo json_encode($cls);

mysqli_close($con);

?>