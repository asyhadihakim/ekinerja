<script type="text/javascript">
  function showKat()
  {
    kdkat = document.getElementById("kategori").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori/"+kdkat+"",
		success: function(response){			
    		$("#kategori1").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }
  
  function showKat1()
  {
	kdkat = document.getElementById("kategori").value;
    kdsubkat1 = document.getElementById("kategori1").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori2/"+kdkat+"/"+kdsubkat1+"",
		success: function(response){			
    		$("#kategori2").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }

  function showKat2()
  {
	kdkat = document.getElementById("kategori").value;
    kdsubkat1 = document.getElementById("kategori1").value;
	kdsubkat2 = document.getElementById("kategori2").value;
	//alert(kdkat);
     $.ajax({
		url:"<?=site_url()?>/dashboard/get_kategori3/"+kdkat+"/"+kdsubkat1+"/"+kdsubkat2+"",
		success: function(response){			
    		$("#kategori3").html(response);
  		},
  		dataType:"html"  		
  	});
  	return false;
  }
</script>
 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li class="active">Upload Dokumen</li> 
</ul>
<?php echo $pesan;?>
<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_upload_dok',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('dashboard/do_upload', $attributes);
?>
  <label for="judul">Judul:</label>
  <input type="text" class="form-control" id="judul" name="judul" value="<?php echo set_value('judul'); ?>">
  
  <label for="deskripsi">Deskripsi:</label>
  <textarea class="form-control" rows="5" id="deskripsi" name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>

  <label for="deskripsi">Link:</label>
  <input type="text" class="form-control" id="link" name="link" value="<?php echo set_value('link'); ?>">
  
	<label for="date">Tanggal</label>	
	<div class="input-group input-append date" id="datePicker">
		<input type="text" class="form-control" name="tgldok" />
		<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
	</div>
  
  <label for="kat1">Kategori:</label>
  <select class="form-control" name="kategori" id="kategori" onChange="showKat()">
  <option></option>
  <?php foreach($query->result() as $data) { ?>
	<option value="<?php echo $data->id; ?>"><?php echo $data->nama_kategori;?></option>
	<?php } ?>
  </select>

   <label for="kat2">Sub Kategori 1:</label>
  <select class="form-control" id="kategori1" name="kategori1" onChange="showKat1()"> 
  </select>
  
  <label for="namasubkat">Sub Kategori 2:</label>
  <select class="form-control" id="kategori2" name="kategori2" onChange="showKat2()"> 
  </select>
  
  <label for="namasubkat">Sub Kategori 3:</label>
  <select class="form-control" id="kategori3" name="kategori3"> 
  </select>
  
  <label for="status">Status</label>
  <div class="radio">
  <label><input type="radio" name="status" value="1">Public</label>
  <label><input type="radio" name="status" value="2">Private</label>
</div>

  
  <label for="userfile">Upload:</label>
  <input type="file" class="form-control" id="userfile" name="userfile">
  <br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
  <input type="button" name="back" class="btn btn-danger" value="Kembali" onClick="history.go(-1);return true;"/>

  <input type="hidden" name="isactive" id="isactive" value="1">

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