 <script type="text/javascript">
  function showKat()
  {
    kdkat = document.getElementById("masterkat").value;

     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori/"+kdkat+"",
		success: function(response){			
    		$("#subkat1").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }
</script>
 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/admin/sub_kategori2">Sub Kategori 2</a></li>
  <li class="active">Edit Sub Kategori 2</li> 
</ul>
<?php echo $pesan;?>
<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_editsubkategori2',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('admin/do_editsubkategori2', $attributes);
foreach($querysubkategori2->result() as $data){
?>
<label for="masterkat">Master Kategori:</label>

 <select class="form-control" name="masterkat" id="masterkat" onChange="showKat()">
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

 <label for="subkat1">Sub Kategori 1:</label>
  <select class="form-control" id="subkat1" name="subkat1">
	<?php 
	  $kodesub = $data->kdsubkat1;
	  foreach($querysubkategori1->result() as $datasubkat1) { 
	  $selected = "";
							
							if($datasubkat1->id == $kodesub)
							{
								$selected = 'selected="selected"';
							}
					   
							 echo '<option value="'.$datasubkat1->id.'" '.$selected.'>'.$datasubkat1->nama_kategori.'</option>';
					}  
	  ?>
  </select>

<label for="namasubkat">Sub Kategori 2:</label>
  <input type="text" class="form-control" name="namasubkat2" id="namasubkat2" value="<?php echo $data->namasubkategori2;?>">
  
  <label for="kode">Kode:</label>
  <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data->kodesub2;?>">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsi2" name="deskripsi2"><?php echo $data->desksubkategori2;?></textarea>
	<input type="hidden" name="kdsubkat1" id="kdsubkat1" value="<?php echo $data->kdsubkat1;?>">
	<input type="hidden" name="idsubkat2" id="idsubkat2" value="<?php echo $data->idsubkat2;?>">
	<input type="hidden" name="kdparent" id="kdparent" value="<?php echo $data->kdparent;?>">
	<br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
      <input type="button" name="cancel" class="btn btn-danger" value="Batal" onClick="history.go(-1);return true;"/>
 <?php } ?>
</form>
</div>