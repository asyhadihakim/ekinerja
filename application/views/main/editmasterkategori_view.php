 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/admin/master_kategori">Master Kategori</a></li>
  <li class="active">Edit Master Kategori</li> 
</ul>
<?php echo $pesan;?>

<div class="form-group">

<?php 
foreach($query->result() as $data){
$attributes = array(
        'name'          => 'frm_editkategori',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open('admin/do_editmasterkategori/', $attributes);
?>

<label for="namakat">Nama Master Kategori:</label>
  <input type="text" class="form-control" name="namakat" id="namakat" value="<?php echo $data->nama_kategori;?>">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"><?php echo $data->deskripsi;?></textarea>
 
<label for="kode">Kode:</label>
  <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data->kode;?>"> 
  
  <input type="hidden" name="idkat" id="idkat" value="<?php echo $data->id;?>">
	<br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
   <input type="button" name="cancel" class="btn btn-danger" value="Batal" onClick="history.go(-1);return true;"/>
  
</form>
<?php } ?>
</div>