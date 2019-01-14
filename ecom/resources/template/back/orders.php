<?php require_once("../../resources/config.php"); ?>
<?php require_once(TEMPLATE_BACK.DS."header.php"); ?>
        
            <div class="container-fluid">


                
              <h4 class="bg-success"><?php echo display_msg(); ?></h4>

        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>Id</th>
           <th>Amount</th>
           <th>Transaction</th>
           <th>Status</th>
           <th>Currency</th>
           
      </tr>
    </thead>
    <tbody>
        <?php display_order(); ?>
        

    </tbody>
</table>
</div>











            </div>
            <!-- /.container-fluid -->

       
        <!-- /#page-wrapper -->

    
<?php require_once(TEMPLATE_BACK.DS."footer.php"); ?>