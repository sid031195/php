
             <div class="row">
               <h4 class="bg-success"><?php echo display_msg(); ?></h4>

<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Short Description</th>
           <th>Product Description</th>
           
      </tr>
    </thead>
    <tbody>

     <?php get_product_in_admin(); ?>
      


  </tbody>
</table>











                
                 


             </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->







   