<style>
	#custom-bootstrap-menu.navbar-default .navbar-brand {
    color: rgba(255, 255, 255, 1);
}
#custom-bootstrap-menu.navbar-default {
    font-size: 14px;
    background-color: rgba(0, 163, 65, 1);
    background: -webkit-linear-gradient(top, rgba(5, 130, 16, 1) 0%, rgba(0, 163, 65, 1) 100%);
    background: linear-gradient(to bottom, rgba(5, 130, 16, 1) 0%, rgba(0, 163, 65, 1) 100%);
    border-width: 1px;
    border-radius: 4px;
}
#custom-bootstrap-menu.navbar-default .navbar-nav>li>a {
    color: rgba(255, 255, 255, 1);
    background-color: rgba(0, 163, 65, 1);
    background: -webkit-linear-gradient(top, rgba(5, 130, 16, 1) 0%, rgba(0, 163, 65, 1) 100%);
    background: linear-gradient(to bottom, rgba(5, 130, 16, 1) 0%, rgba(0, 163, 65, 1) 100%);
}
#custom-bootstrap-menu.navbar-default .navbar-nav>li>a:hover,
#custom-bootstrap-menu.navbar-default .navbar-nav>li>a:focus {
    color: rgba(51, 51, 51, 1);
    background-color: rgba(21, 107, 90, 1);
}
#custom-bootstrap-menu.navbar-default .navbar-nav>.active>a,
#custom-bootstrap-menu.navbar-default .navbar-nav>.active>a:hover,
#custom-bootstrap-menu.navbar-default .navbar-nav>.active>a:focus {
    color: rgba(255, 220, 20, 1);
    background-color: rgba(255, 255, 255, 1);
}
#custom-bootstrap-menu.navbar-default .navbar-toggle {
    border-color: #ffffff;
}
#custom-bootstrap-menu.navbar-default .navbar-toggle:hover,
#custom-bootstrap-menu.navbar-default .navbar-toggle:focus {
    background-color: #ffffff;
}
#custom-bootstrap-menu.navbar-default .navbar-toggle .icon-bar {
    background-color: #ffffff;
}
#custom-bootstrap-menu.navbar-default .navbar-toggle:hover .icon-bar,
#custom-bootstrap-menu.navbar-default .navbar-toggle:focus .icon-bar {
    background-color: #00a341;
}
  </style>

<!-- NAVBAR
================================================== -->
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url();?>">Database Kerjasama</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			  <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
			</ul>
			<ul class="nav navbar-nav">
			    <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url();?>index.php/welcome/tentang">Tentang Aplikasi</a></li>        
                  </ul>
                </li>
				</ul>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="<?php echo base_url();?>index.php/welcome/manual">Manual</a></li>
			</ul>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="<?php echo base_url();?>index.php/welcome/download">Download</a></li>
			</ul>
			<ul class="nav navbar-nav">
			    <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Publikasi <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url();?>index.php/welcome/">Pedum</a></li>        
                    <li><a href="<?php echo base_url();?>index.php/welcome/">Poster</a></li>        
                    <li><a href="<?php echo base_url();?>index.php/welcome/">Booklet</a></li>        
                  </ul>
                </li>
				</ul>
              <ul class="nav navbar-nav navbar-right">
				<?php if($this->session->userdata('namauser')) {?>			
				<li>			
				<a href="<?php echo base_url();?>index.php/admin/userprofile/<?php echo $this->session->userdata('id');?>"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('namauser');?></a>
				</li>
				<?php } ?>
				<li>
				<?php 
				if(!$this->session->userdata('namauser')){
				?>
				<a href="<?php echo base_url()?>index.php/login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				<?php }else{ ?>
				<a href="<?php echo base_url();?>index.php/login/logout" ><span class="glyphicon glyphicon-log-out"></span> Logout</a>
				<?php } ?>
				</li>
		
              </ul>
            </div>
          </div>
        </nav>
      </div>
	  </div>

	<!--
	<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="#">Brand</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/">Home</a>
                </li>
                <li><a href="/products">Products</a>
                </li>
                <li><a href="/about-us">About Us</a>
                </li>
                <li><a href="/contact">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
-->
<!--
<div class="row">
	<div class="col-md-12">
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="<?php echo base_url();?>">Database Kerjasama</a>
			</div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="<?php echo base_url();?>index.php/admin">Home</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if($this->session->userdata('namauser')) {?>			
				<li>			
				<a href="<?php echo base_url();?>index.php/admin/userprofile/<?php echo $this->session->userdata('id');?>"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('namauser');?></a>
				</li>
				<?php } ?>
				<li>
				<?php 
				if(!$this->session->userdata('namauser')){
				?>
				<a href="<?php echo base_url()?>index.php/login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				<?php }else{ ?>
				<a href="<?php echo base_url();?>index.php/login/logout" ><span class="glyphicon glyphicon-log-out"></span> Logout</a>
				<?php } ?>
				</li>
			</ul>
		  </div>
		</nav>
	</div>
</div>
-->

