<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT.DS."header.php"); 
require_once("../resources/cart.php");
?>

    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 



      <center><h1>Checkout</h1></center></br></br>
       <h1><?php /* 
       if(isset($_SESSION['product_1'])){
       echo $_SESSION['product_1'];
       } 
       
       ?></h1>
       <h1><?php  
       if(isset($_SESSION['product_2'])){
       echo $_SESSION['product_2'];
       } 
       */
       ?></h1>
       <div class="bg-warning"><?php display_msg(); ?></div>
      
<div class="row">
  <div class="col-sm-8">

  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="siddheshshinde751-facilitator@gmail.com">
    <table class="table ">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
            <?php cart(); ?>
        </tbody>
    </table>
   <?php echo display_paypal(); ?></hr>
  
</form>
</div>


<!--  ***********CART TOTALS*************-->
            
<div class="col-sm-4  ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items</th>
<td><span class="amount">
  <?php echo isset($_SESSION['item_qty'])? $_SESSION['item_qty']:$_SESSION['item_qty']="0"; ?>
</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">
  <?php echo isset($_SESSION['item'])? $_SESSION['item']:$_SESSION['item']="0"; ?>
</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           <hr>

        <!-- Footer -->
         <?php require_once(TEMPLATE_FRONT.DS."footer.php"); ?>
