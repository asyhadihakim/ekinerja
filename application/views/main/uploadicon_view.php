<ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/dashboard/mng_icon/">Manage Icon</a></li>
  <li class="active">Upload Icon</li> 
</ul>
<?php echo $pesan; ?>
  <div class="panel panel-primary">
      <div class="panel-heading">Manage Icon</div>
      <div class="panel-body">
	  <div class="form-group">
	 <?php 
$attributes = array(
        'name'          => 'frm_uploadslide',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);
echo form_open_multipart('dashboard/do_upload_icon/', $attributes);
?>
	<label for="namaslide">Nama Icon:</label>
  <input type="text" class="form-control" id="namaicon" name="namaicon">
  
  	<label for="namaslide">URL:</label>
  <input type="text" class="form-control" id="linkurl" name="linkurl">
  
  <label for="status">Status:</label>	
	<div class="checkbox">
  <label><input type="checkbox" name="chkstatus" value="1" checked>Tampilkan</label>
	</div>
 
 <label for="userfile">Upload:</label>
  <input type="file" class="form-control" id="userfile" name="userfile">
 <br> 
 <input name="simpan" value="Upload" class="btn btn-primary" type="submit">  
 </form>
 </div>
 </div>
 </div>
 
	  
