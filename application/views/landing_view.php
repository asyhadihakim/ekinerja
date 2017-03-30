 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide center-block" src="<?php echo base_url();?>assets/img/head1_edit.png" alt="First slide">
        </div>
        <div class="item">
          <img class="second-slide center-block" src="<?php echo base_url();?>assets/img/head2_edit.png" alt="Second slide">
        </div>
        <div class="item">
          <img class="third-slide center-block" src="<?php echo base_url();?>assets/img/head3_edit.png" alt="Third slide">
        </div>
      </div>
	  
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
<br>
  <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<!--
    <div class="container marketing">

      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url();?>assets/img/building-land.png" alt="Generic placeholder image" width="100" height="100">
          <h2></h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url();?>assets/img/handyman-tools.png" alt="Generic placeholder image" width="100" height="100">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo base_url();?>assets/img/public-park.png" alt="Generic placeholder image" width="100" height="100">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

    </div>
	-->
	
	<hr class="featurette-divider">
	
	<h4 class="text-center">Our Partners</h4>
	<?php foreach($query->result() as $data){?>
	<div class="col-lg-2" align="center">
	<a href="<?php echo $data->linkurl;?>"><img class="img-box" src="<?php echo base_url();?>uploads/icon/<?php echo $data->file;?>" alt="Generic placeholder image" width="50%"></a>
	</div>
	<?php } ?>
	<hr class="featurette-divider">

	  
