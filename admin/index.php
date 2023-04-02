
<?php include("inc/header.php")?>
<?php 
use TechStore\Classes\Models\Product;
use TechStore\Classes\Models\Cats;
use TechStore\Classes\Models\Order;
$pd = new Product;
$productCount = $pd->getCount();

$ct = new Cats;
$catCount = $ct->getCount();

$od = new Order;
$orderCount = $od->getCount();




?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?= $productCount?></h5>
                          <a href="<?=AURL?>products.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?= $catCount?></h5>
                          <a href="<?=AURL?>categories.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5><?= $orderCount?></h5>
                          <a href="<?=AURL?>orders.php" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
   <?php include("inc/footer.php")?>