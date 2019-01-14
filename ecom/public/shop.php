<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT.DS."header.php"); ?>
    <!-- Navigation -->
    
    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      
        <center><h1>Shop Page :)</h1></center>
      <br><br><br><br>

      <!-- Page Features -->
      <div class="row text-center">

        

        <?php  get_product_in_shop_page(); ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    
  <?php require_once(TEMPLATE_FRONT.DS."footer.php"); ?>
