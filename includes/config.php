<?php
try{ 
$conn=mysqli_connect("localhost","root","","db_sales2024_ns");

if (!$conn) {
    throw new Exception("Connect to the database first! ");
    
}
}
catch (Exception $exc){
    echo $exc -> getMessage();
    }
?>