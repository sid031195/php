<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT.DS."header.php"); ?>
    <!-- Navigation -->
    
    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>

      <!-- Page Features -->
      <div class="row text-center">

        

        <?php  get_product_in_cat_page(); ?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    
  <?php require_once(TEMPLATE_FRONT.DS."footer.php"); ?>
