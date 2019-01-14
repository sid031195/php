<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT.DS."header.php"); ?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

       <?php require_once(TEMPLATE_FRONT.DS."sidenav.php"); ?>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <?php require_once(TEMPLATE_FRONT.DS."slidder.php"); ?>
          
            <br><br><br><br><br>
          <div class="row">
           
            <?php get_product(); ?>
            
            </div>

          </div>
          <!-- /.row end here -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

   <?php require_once(TEMPLATE_FRONT.DS."footer.php"); ?>
