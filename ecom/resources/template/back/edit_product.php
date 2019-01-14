<?php 

if(isset($_GET['id'])){
  $query=query("SELECT * FROM products where product_id=".escape_string($_GET['id']));
  confirm($query);
  while($row=fetch_array($query)){

   $product_title=escape_string($row['product_title']);
    $product_price=escape_string($row['product_price']);
    $product_description=escape_string($row['product_description']);
    $product_qty=escape_string($row['product_qty']);
    $short_description=escape_string($row['short_description']);
    $product_cat_id=escape_string($row['product_cat_id']);
    $product_image= escape_string($row['product_image']);
    //$category=get_cat_title_by_id($row['product_cat_id']);
    $product_image=upload_img($row['product_image']);
  }
  
  update_product();
}else{
  set_message("wrong");
}


 ?>

<div class="col-md-12">
<h1 class="bg-danger"><?php display_msg(); ?></h1>
<div class="row">
<h1 class="page-header">
   Edit Product 

</h1>
</div>
               
<?php add_product(); ?>
<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" 
        value="<?php echo $product_title ;?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"  ><?php echo $product_description ;?></textarea>
    </div>

    <div class="form-group">
           <label for="product-title">Short Description</label>
      <textarea name="short_description" id="" cols="30" rows="5" class="form-control" ><?php echo $short_description ;?></textarea>
    </div>



    



    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          
        <select name="product_cat_id" id="" class="form-control">
            <option value="<?php $product_cat_id; ?>"><?php echo get_cat_title_by_id($product_cat_id); ?></option>
           <?php  get_category_option(); ?>
        </select>


</div>





    <!-- Product Brands-->

    <!--
    <div class="form-group">
      <label for="product-title">Product Brand</label>
         <select name="product_brand" id="" class="form-control">
            <option value="">Select Brand</option>
         </select>
    </div>

  -->
<!-- Product Quantity-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
         <input type="number" name="product_qty" class="form-control" size="255"
          value="<?php echo $product_qty ;?>">
    </div>

    <!-- Product Price-->
    <div class="form-group">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60"
         value="<?php echo $product_price ;?>">
      </div>
    



<!-- Product Tags -->

<!--
    <div class="form-group">
          <label for="product-title">Product Keywords</label>
          
        <input type="text" name="Keywords" class="form-control">
    </div>
-->
    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file"><br>
        <img src="../../resources/<?php echo $product_image ;?>" alt="">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                



            </div>
            <!-- /.container-fluid -->

       