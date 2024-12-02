<?php
session_start();
$con=null; 
$error=null;
$success=null;
$host_name="localhost";
$username="root";
$password="";
$database="aut_php";
try{
    $con=mysqli_connect($host_name,$username,$password,$database);
}catch(mysqli_sql_exception $e){
    $error="Error connecting to database: ".$e->getMessage();
    // die();
}
?>