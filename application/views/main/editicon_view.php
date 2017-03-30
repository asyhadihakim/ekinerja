<ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/dashboard/mng_icon/">Manage Icon</a></li>
  <li class="active">Edit Icon</li> 
</ul>
<?php echo $pesan; ?>
  <div class="panel panel-primary">
      <div class="panel-heading">Edit Icon</div>
      <div class="panel-body">
	  <div class="form-group">
	 <?php 
$attributes = array(
        'name'          => 'frm_uploadslide',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);
echo form_open_multipart('dashboard/do_edit_icon/', $attributes);
foreach($query->result() as $data){
?>
	<label for="namaslide">Nama Icon:</label>
  <input type="text" class="form-control" id="namaicon" name="namaicon" value="<?php echo $data->namaslide; ?>">
  
  	<label for="linkurl">URL:</label>
  <input type="text" class="form-control" id="linkurl" name="linkurl" value="<?php echo $data->linkurl; ?>">
  
  <label for="status">Status:</label>	
	<div class="checkbox">
	<?php 
	if($data->status == '1')
	{
		$cek = "checked";	
	}else{
		$cek = "";
	}
	?>
  <label><input type="checkbox" name="chkstatus" value="1" <?=$cek;?>>Tampilkan</label>
	</div>
 
 <label for="userfile">Upload:</label>
  <input type="file" class="form-control" id="userfile" name="userfile">
 <br> 
 <input name="simpan" value="Upload" class="btn btn-primary" type="submit">  
	<input type="button" name="back" class="btn btn-danger" value="Batal" onClick="history.go(-1);return true;"/>
 <?php } ?>
 </form>
 </div>
 </div>
 </div>
 
	  
