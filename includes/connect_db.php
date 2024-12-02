<?php
session_start();
require "vendor/autoload.php";
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(str_replace("\\includes","",__DIR__));
$dotenv->load();
$con=null; 
$error=null;
$success=null;
$host_name=$_ENV['HOST_NAME'];
$username=$_ENV['USERNAME'];
$password=$_ENV['PASSWORD'];
$database=$_ENV['DATABASE'];
try{
    $con=mysqli_connect($host_name,$username,$password,$database);
}catch(mysqli_sql_exception $e){
    $error="Error connecting to database: ".$e->getMessage();
}
?>