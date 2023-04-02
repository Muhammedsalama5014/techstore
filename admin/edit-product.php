<?php include("inc/header.php")?>


<?php 
use TechStore\Classes\Models\Product;
use TechStore\Classes\Models\Cats;


if($request->getHas('id')){
    $id = $request->get('id');
}else
{
    $request->aredirect("products.php");

    }

    $ct = new Cats;
    $cats = $ct->selectAll("id , name");
    
    $pr = new Product;
    $prods= $pr->selectById($id ,"`desc`, products.name AS prodName,
     cats.name AS catName, img, pieces_no, price , cat_id");

?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Product : <?= $prods['prodName']?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <form method="POST" action="<?= AURL . "handlers/edit-product.php" ;?>"   enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id;?>">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" value="<?= $prods['prodName']?>">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cat_id">
                                    <?php foreach($cats as $cat): ?>
                                     <option value="<?= $cat['id'];?>"  <?php if($cat['id']==$prods['cat_id']){echo "selected";} ?>><?= $cat['name'] ;?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" value="<?= $prods['price']?>">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input type="number" name="pieces" class="form-control" value="<?= $prods['pieces_no']?>">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="desc" rows="3" ><?= $prods['desc']?></textarea>
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <img src="<?= URL."uploads/" .$prods['img']?>" width="100px" height="100px" >
                            </div>
                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label"  for="customFile">Choose Image</label>
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="<?= AURL . "products.php"?>">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include("inc/footer.php")?>