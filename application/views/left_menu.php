  <div class="col-md-2">
	  <ul class="nav nav-pills nav-stacked" data-spy="affix">
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/admin/"><i class="fa fa-folder-o"></i> Dokumen</a></li>
	  <?php if($this->session->userdata('role') == 1){ ?>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/admin/master_kategori"><i class="fa fa-th-list"></i> Master Kategori</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/admin/sub_kategori"><i class="fa fa-th-list"></i> Sub Kategori 1</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/admin/sub_kategori2"><i class="fa fa-th-list"></i> Sub Kategori 2</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/admin/sub_kategori3"><i class="fa fa-th-list"></i> Sub Kategori 3</a></li>
	   <?php } ?>
	   <?php if($this->session->userdata('role') == 5){ ?>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/dashboard/mng_user"><i class="fa fa-user"></i> Manajemen User</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/dashboard/mng_icon"><i class="fa fa-user"></i> Manajemen Icon</a></li>
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/dashboard/mng_slide"><i class="fa fa-user"></i> Manajemen Slide</a></li>
	 <?php } ?>
	 <!--
	  <li role="presentation"><a href="<?php echo base_url();?>index.php/admin/laporan"><i class="fa fa-file-o"></i> Laporan</a></li>
	 -->
	</ul>
  </div>