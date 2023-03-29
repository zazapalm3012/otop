<?php
include_once ("connectDB.php");
$conn = new DB_conn;

session_start();
function logout(){
    session_destroy();
}

logout();

if(!isset($_SESSION['name'])){  //check NOT NULL
    header("location:firstpage.php");
    $query = $conn->select_all_product();
  include_once("navbar.php");
  include_once("corousel.html");   
  include_once("component2.php");   
  while($data = mysqli_fetch_array($query)){
    echo component($data['pName'], $data['pDetail'],$data['pPrice'],$data['pImage'],$data['pId']);
    }
  }
  else {    //check NULL
    header("location:firstpage.php");
    include_once("navbar_index.php");
    include_once("corousel.html");   
    
    }





?>