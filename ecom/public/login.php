<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT.DS."header.php"); ?>

    <!-- Navigation -->
    
    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
            <h6 class="bg-warning"><?php display_msg(); ?></h6>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
              <?php login_user(); ?>

                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <?php require_once(TEMPLATE_FRONT.DS."footer.php"); ?>