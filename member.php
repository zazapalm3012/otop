<?php
/*
ณัฐนนท์ ชมภูนุช 6430200213
*/
include_once("connectDB.php");
$conndb = new DB_conn;  //สร้าง obj ชื่อ $conndb
$con = $conndb->conn;   //การดข้าถึงตัวแปรใน class ตั้งชื่อเป็น $conn

#------ทำการรับค่าจากหน้าสมัครสมาชิก-------------#

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$mname = $_POST['mname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['rdType'];

echo $fname;



$sql = $conndb->insert_member($fname,$lname,$mname,$email,$username,$password,$type);
//$sql = $conndb->insert_member();

if(mysqli_query($con,$sql)){
    printf(" %d Row inserts.\n", mysqli_affected_rows($con));
}

mysqli_close($con);
?>