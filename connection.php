<?php
//Connection query for database 
$con= mysqli_connect("localhost","root","","Practice");
if(!$con)
{
    $q=mysqli_error($con);
    echo "error in connecting." .$q;
}
else
//echo "connection successfull.";
?>
