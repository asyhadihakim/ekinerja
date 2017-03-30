 <script type="text/javascript">
  function showKat()
  {
    kdkat = document.getElementById("masterkat").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori/"+kdkat+"",
		success: function(response){			
    		$("#subkat1").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }
   
  function showKat1()
  {
	kdkat = document.getElementById("masterkat").value;
    kdsubkat1 = document.getElementById("subkat1").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori2/"+kdkat+"/"+kdsubkat1+"",
		success: function(response){			
    		$("#subkat2").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }

</script>
 
 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li><a href="<?php echo base_url();?>index.php/admin/sub_kategori3">Sub Kategori 3</a></li>
  <li class="active">Edit Sub Kategori 3</li> 
</ul>
<?php echo $pesan;?>
<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_editsubkategori3',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('admin/do_editsubkategori3', $attributes);
foreach($querysubkategori3->result() as $data){
?>
<label for="masterkat">Nama Master Kategori:</label>
 <select class="form-control" name="masterkat" id="masterkat" onChange="showKat()">
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
  <select class="form-control" id="subkat1" name="subkat1" onChange="showKat1()">
  <option value="">PILIH</option>
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
  
  <label for="subkat2">Sub Kategori 2:</label>
  <select class="form-control" id="subkat2" name="subkat2">
   <option value="">PILIH</option>
  <?php 
	  $kodesub2 = $data->kdsubkat2;
	  foreach($querysubkategori2->result() as $datasubkat2) { 
	  $selected = "";
							
							if($datasubkat2->idsubkat2 == $kodesub2)
							{
								$selected = 'selected="selected"';
							}
					   
							 echo '<option value="'.$datasubkat2->idsubkat2.'" '.$selected.'>'.$datasubkat2->namasubkategori2.'</option>';
					}  
	  ?>
  </select>  
  
<label for="namasubkat">Sub Kategori 3:</label>
  <input type="text" class="form-control" name="namasubkat3" id="namasubkat3" value="<?php echo $data->namasubkategori3; ?>">
  
  <label for="kode">Kode:</label>
  <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $data->kodesub3; ?>">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsisubkat3" name="deskripsisubkat3"><?php echo $data->desksubkategori3; ?></textarea>

  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
  	<input type="hidden" name="kdsubkat1" id="kdsubkat1" value="<?php echo $data->kdsubkat1;?>">
	<input type="hidden" name="kdsubkat2" id="kdsubkat2" value="<?php echo $data->kdsubkat2;?>">
	<input type="hidden" name="kdsubkat3" id="kdsubkat3" value="<?php echo $data->idsubkat3;?>">
	<input type="hidden" name="kdparent" id="kdparent" value="<?php echo $data->kdparent;?>">
 <?php } ?>
</form>
</div>