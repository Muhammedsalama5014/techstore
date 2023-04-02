<?php include("inc/header.php")?>

<?php
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetails;
if($request->getHas('id')){
  $id = $request->get('id');
}else
{
  $request->aredirect("orders.php");

  }
$order = new Order;
$orderDetails = $order->selectById($id,"orders.*, SUM(qty * price) AS total");


$det = new OrderDetails;
$details = $det->selectWithProduct($id);

?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Order : <?= $orderDetails['id'];?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">Customer</th>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Name</th>
                                <td><?= $orderDetails['name'];?></td>
                              </tr>
                              <tr>
                                <th scope="row">Email</th>
                                <td><?= $orderDetails['email']?? ".....";?></td>
                              </tr>
                              <tr>
                                <th scope="row">Phone</th>
                                <td><?= $orderDetails['phone'];?></td>
                              </tr>
                              <tr>
                                <th scope="row">Address</th>
                                <td><?= $orderDetails['address']?? ".....";?></td>
                              </tr>
                              <tr>
                                <th scope="row">Time</th>
                                <td><?=date("d M,Y h:i a",strtotime($orderDetails['created_at'])) ;?></td>
                              </tr>
                              <tr>
                                <th scope="row">Status</th>
                                <td><?= $orderDetails['status'];?></td>
                              </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($details as $deta):?>
                              <tr>
                                <td><?= $deta['name'];?></td>
                                <td><?= $deta['qty'];?></td>
                                <td><?= $deta['price'];?></td>
                              </tr>
                              <?php endforeach?>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <?php if($orderDetails['status'] == 'pending'){?>
                                    <th>Change Status</th>
                                    <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>$<?php echo $orderDetails['total'];?></td>
                                <td>
                                <?php if($orderDetails['status'] == 'pending'){?>
                                    <a class="btn btn-success" href="<?=AURL . "handlers/approve.php?id=".$orderDetails['id'] ;?>">Approve</a>
                                    <a class="btn btn-danger" href="<?=AURL . "handlers/cancel.php?id=".$orderDetails['id'] ;?>">Cancel</a>
                                <?php }?>
                                  </td>
                              </tr>
                            </tbody>
                        </table>

                        <a class="btn btn-dark" href="<?=AURL . "orders.php" ;?>">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include("inc/footer.php")?>