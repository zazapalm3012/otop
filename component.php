<?php
include_once ("connectDB.php");
$conn = new DB_conn;
?>

<div class = "container-fluid pt-5">
    <div class = "text-center mb-4">
        <h2 class = "section-title px-5"><span class="px-2">Trandy Products</span></h2>
    </div>
    <div class= "row px-xl-5 pb-3">
        <?php
        $query = $conn->select_all_product();
        
        whlie($data = mysqli_fetch_array($query)){
            $element = '
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                <form action="#" method="POST">
                <div class="col">
                    <div class="card">
                        <img src="p_img/'.$data["pImage"].' ">
                            <div class="card-body">
                            <h5 class="card-title">'.$data["pName"].'</h5>
                            <p class="card-text">asdadasdasdasd</p>
                            </div>
                    </div>
                </div>
              </form>
            </div>
            
            '
            ;
        
           echo ($element);
        }

        ?>
    </div>
</div>