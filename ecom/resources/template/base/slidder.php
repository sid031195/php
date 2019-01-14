<style type="text/css">
  .slidder{
  width:100% !important;
}
@media only screen and (max-width: 600px) {
  .slidder {
  width:100%;
}
}
</style>
<div class="container slidder" >
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
           <div class="carousel-inner">

      <?php get_active_slidder(); ?>

      
    
    <?php get_slidder(); ?>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
