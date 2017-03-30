 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/admin/master_kategori">Master Kategori</a></li>
  <li class="active">Tambah Master Kategori</li> 
</ul>
<?php echo $pesan;?>

<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_kategori',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('admin/insertkategori', $attributes);
?>
<label for="namakat">Nama Master Kategori:</label>
  <input type="text" class="form-control" name="namakat" id="namakat">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"></textarea>
  
   <label for="kode">Kode:</label>
  <input type="text" class="form-control" name="kode" id="kode">
	<br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
    <input type="button" name="back" class="btn btn-danger" value="Batal" onClick="history.go(-1);return true;"/>
 
</form>
</div>