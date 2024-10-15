<?php
try{ 
$conn=mysqli_connect("localhost","root","","db_shop");

if (!$conn) {
    throw new Exception("Connect to the data first ");
}
}
catch (Exception $exc){
    echo $exc -> getMessage();
    }
?>