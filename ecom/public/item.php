<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT.DS."header.php"); ?>
    <!-- Navigation -->
    
    <!-- Page Content -->
    <div class="container">

      <div class="row">

         <?php require_once(TEMPLATE_FRONT.DS."sidenav.php"); ?>
        <!-- /.col-lg-3 -->
        <?php 
        $query=query("SELECT * FROM products where product_id= ".escape_string($_GET['product_id'])." ");
            confirm($query);
            while($row=fetch_array($query)):?>
        
        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="../resources/<?php echo upload_img($row['product_image']);?>" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $row['product_title'] ?></h3>
              <h4>&#36;<?php echo $row['product_price'] ?></h4>
              <p class="card-text">
                <?php echo $row['product_description'] ?>
              </p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
            <a href="../resources/cart.php?add=<?php echo $row['product_id'] ?>"><div class="btn btn-primary">Add Cart</div></a>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Product Reviews
            </div>
            <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <a href="#" class="btn btn-success">Leave a Review</a>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
        <?php endwhile; ?>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
   <?php require_once(TEMPLATE_FRONT.DS."footer.php"); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
