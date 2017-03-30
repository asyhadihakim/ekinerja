 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/admin/sub_kategori">Sub Kategori 1</a></li>
  <li class="active">Tambah Sub Kategori 1</li> 
</ul>
<?php echo $pesan;?>
<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_subkategori',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('admin/insertsubkategori', $attributes);

?>
<label for="masterkat">Nama Master Kategori:</label>

 <select class="form-control" name="masterkat" id="sel1">
 <option></option>
 <?php
foreach($query->result() as $data):
?>
    <option value="<?php echo $data->id;?>"><?php echo $data->nama_kategori; ?></option>
<?php endforeach; ?>  
  </select>

<label for="namasubkat">Nama Sub Kategori 1:</label>
  <input type="text" class="form-control" name="namasubkat" id="namasubkat">
  
  <label for="kode">Kode:</label>
  <input type="text" class="form-control" name="kode" id="kode">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"></textarea>
<br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit"> 
   <input type="button" name="cancel" class="btn btn-danger" value="Batal" onClick="history.go(-1);return true;"/>  
 
</form>
</div>