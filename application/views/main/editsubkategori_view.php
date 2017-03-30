 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/admin/sub_kategori">Sub Kategori 1</a></li>
  <li class="active">Edit Sub Kategori 1</li> 
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

echo form_open_multipart('admin/do_editsubkategori', $attributes);
foreach($query->result() as $data){
?>
<label for="masterkat">Nama Master Kategori:</label>

 <select class="form-control" name="masterkat" id="sel1">
 <option value=""></option>
<?php 		
	$kodeparent = $data->kdparent;
	foreach($querykategori->result() as $kategori){
				   		$selected = "";
						
						if($kategori->id == $kodeparent)
						{
							$selected = 'selected="selected"';
						}
				   
						 echo '<option value="'.$kategori->id.'" '.$selected.'>'.$kategori->nama_kategori.'</option>';
				}
			?>
  </select>

<label for="namasubkat">Nama Sub Kategori 1:</label>
  <input type="text" class="form-control" name="namasubkat" id="namasubkat" value="<?php echo $data->nama_kategori;?>">
  
  <label for="kode">Kode:</label>
  <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data->kodesub1;?>">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"><?php echo $data->deskripsi;?></textarea>
	<input type="hidden" name="idkategori" id="idkategori" value="<?php echo $kategori->id;?>">
	<input type="hidden" name="idsubkategori" id="idsubkategori" value="<?php echo $data->id;?>">
	<br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
      <input type="button" name="cancel" class="btn btn-danger" value="Batal" onClick="history.go(-1);return true;"/>
 <?php } ?>
</form>
</div>