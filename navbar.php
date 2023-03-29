<?php
include_once ("connectDB.php");
$conn = new DB_conn;

?>

<!--navbar start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container ">
      <a class="navbar-brand col-sm-1 p-1 my-3 me-auto" href="#"><img class ="logo "src="img/otop.jpg" alt=""width="85" height="85"></a>
      <button class="navbar-toggler ms-auto " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="firstpage.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item ">

            <a class="nav-link line " href="cart.php"  >
              <i class="fa-solid fa-cart-shopping"></i>
          <?php
          if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
            echo '<span class = "cart_font " >'.$count.'</span>';
          }
          else{
            echo '<span class = "cart_font  ">0</span>';

          }

?>
          
          </a>
          </li>
          <li class="nav-item ">
            
            <a class="nav-link " href="logout.php"  >Logout</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


<!--navbar end-->