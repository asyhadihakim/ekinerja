<script type="text/javascript">
  function showKat()
  {
    kdkat = document.getElementById("kat1").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori/"+kdkat+"",
		success: function(response){			
    		$("#kat2").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }
  
  function showKat1()
  {
	kdkat = document.getElementById("kat1").value;
    kdsubkat1 = document.getElementById("kat2").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori2/"+kdkat+"/"+kdsubkat1+"",
		success: function(response){			
    		$("#kat3").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }

  function showKat2()
  {
	kdkat = document.getElementById("kat1").value;
    kdsubkat1 = document.getElementById("kat2").value;
	kdsubkat2 = document.getElementById("kat3").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori3/"+kdkat+"/"+kdsubkat1+"/"+kdsubkat2+"",
		success: function(response){			
    		$("#kat4").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }
</script>
 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li class="active">Detail Dokumen</li> 
</ul>

<?php echo $pesan;?>
<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_detail_dok',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('dashboard/editdetaildok', $attributes);
foreach($querydok->result() as $data){
?>
  <label for="judul">Judul:</label>
  <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data->judul; ?>">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"><?php echo $data->deskripsi; ?></textarea>
  
    <label for="deskripsi">Link:</label>
  <input type="text" class="form-control" id="link" name="link" value="<?php echo $data->link; ?>">
  
  	<label for="date">Tanggal</label>	
	<div class="input-group input-append date" id="datePicker">
		<input type="text" class="form-control" name="tgldok" value=<?php echo $data->tgl_dokumen; ?> />
		<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
	</div>

  <label for="kat1">Kategori:</label>
  <select class="form-control" name="kat1" id="kat1" onChange="showKat()">
   <option value="">PILIH</option>
  <?php 
  $kodeparent = $data->kdkat;
  foreach($querykategori->result() as $datakat) { 
  $selected = "";
						
						if($datakat->id == $kodeparent)
						{
							$selected = 'selected="selected"';
						}
				   
						 echo '<option value="'.$datakat->id.'" '.$selected.'>'.$datakat->nama_kategori.'</option>';
				}  
  ?>
	
  </select>

   <label for="kat2">Sub Kategori 1:</label>
  <select class="form-control" id="kat2" name="kat2" onChange="showKat1()">
   <option value="">PILIH</option>
  <?php 
  $kodesub = $data->kdsubkat;
  foreach($querysubkategori->result() as $datasubkat) { 
  $selected = "";
						
						if($datasubkat->id == $kodesub)
						{
							$selected = 'selected="selected"';
						}
				   
						 echo '<option value="'.$datasubkat->id.'" '.$selected.'>'.$datasubkat->nama_kategori.'</option>';
				}  
  ?>
  </select>

   <label for="kat3">Sub Kategori 2:</label>
  <select class="form-control" id="kat3" name="kat3" onChange="showKat2()">
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
  
   <label for="kat4">Sub Kategori 3:</label>
  <select class="form-control" id="kat4" name="kat4">
  <option value="">PILIH</option>
  <?php 
  $kodesub3 = $data->kdsubkat3;
  foreach($querysubkategori3->result() as $datasubkat3) { 
  $selected = "";
						
						if($datasubkat3->idsubkat3 == $kodesub3)
						{
							$selected = 'selected="selected"';
						}
				   
						 echo '<option value="'.$datasubkat3->idsubkat3.'" '.$selected.'>'.$datasubkat3->namasubkategori3.'</option>';
				}  
  ?>
  </select>  
  
  <label for="status">Status</label>
  <div class="radio">
  <label><input type="radio" name="status" value="1" <?php echo ($data->status == "1") ? 'Checked' : ''; ?>>Public</label>
  <label><input type="radio" name="status" value="2" <?php echo ($data->status == "2") ? 'Checked' : ''; ?>>Private</label>
	</div>
	
  <label for="userfile">Upload:</label>
  <input type="file" class="form-control" id="userfile" name="userfile">
  
  <label for="filedok">File: </label>  
  <?php if($data->dokumen == ''){
	echo '<p><span class="glyphicon glyphicon-remove"></span> No File Attached</p>';
  }else{
  ?>
  <p><a href="<?php echo base_url().$data->dokumen;?>"><span class="glyphicon glyphicon-file"></span>Download</a></p>
  <?php } ?>
  <!--
  <label for="aktivasi">Aktivasi</label>
  <div class="radio">
  <label><input type="radio" name="is_active" value="1" <?php echo ($data->is_active == "1") ? 'Checked' : ''; ?>>Ya</label>
  <label><input type="radio" name="is_active" value="2" <?php echo ($data->is_active == "2") ? 'Checked' : ''; ?>>Tidak</label>
	</div>-->
	
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
  <input type="hidden" name="iddokumen" id="iddokumen" value="<?php echo $data->id;?>"> 
     <input type="button" name="back" class="btn btn-danger" value="Batal" onClick="history.go(-1);return true;"/>
  <?php } ?>
</form>
</div>

<script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'yyyy-mm-dd'
        });
});
</script>