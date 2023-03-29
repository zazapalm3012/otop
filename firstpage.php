<?php
session_start();
include_once ("connectDB.php");
$conn = new DB_conn;


if (isset($_POST['p_add'])){

  if(isset($_SESSION['cart']))    ///มีสินค้า
  {  
    $_SESSION['count']=array();
      $item_array_id = array_column($_SESSION['cart'],'pId');     
      $item_array_count = array_column($_SESSION['count'],'pId');     
  
      if(in_array(($_POST['pId']),$item_array_id)){           //add สินค้าซ้ำ
          echo '<script> alert ("มีสินค้านี้อยู่ในตะกร้าแล้ว")</script>';
          echo '<script> window.location = "firstpage.php"</script>';
          $item_array = array('pId'=> $_POST['pId']);
          $_SESSION['count'][$count] = $item_array;

          print_r($_SESSION['count']);
          print_r( $_SESSION['count']);

      }
      else   
      {
          $count = count($_SESSION['cart']);         //add สินค้าไม่ซ้ำ
          $item_array = array('pId'=> $_POST['pId']);
          $_SESSION['cart'][$count] = $item_array;
          $_SESSION['count'][$count] = $item_array;

          print_r($_SESSION['count']);

          /*$_SESSION['strQty'][$item_array_id] = 1;  
          print_r($item_array_cart );*/

      } 

  }
  else   ///ไม่มีสินค้า
  {
    
      $item_array = array('pId'=>$_POST['pId']);
      $_SESSION['cart'][0] = $item_array;
      echo  "\xA";
      
  
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
    

  </head>
  <body>
    <?php

    if(isset($_SESSION['name'])){  //check NOT NULL
      
      $query = $conn->select_all_product();
      if($_SESSION['name'] == 'Nattanon'){ //check admin
        include_once("navbar_admin.php");
        }   
        else{
          include_once("navbar.php");
          include_once("corousel.html");   
          include_once("component2.php");   
          while($data = mysqli_fetch_array($query))
          {
            echo component($data['pName'], $data['pDetail'],$data['pPrice'],$data['pImage'],$data['pId']);
            }
            }
          }

    else if(!isset($_SESSION['name'])){    //check NULL
    include_once("navbar_index.php");
    include_once("corousel.html");   
  
    }


    ?>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>