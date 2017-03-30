		<script type="text/javascript" class="init">
			$(document).ready(function() {
			$('#example').DataTable(
					{
					stateSave: true
					}
			);
			});
			
			$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		</script>

 <ul class="breadcrumb">
  <li class="active">Home</li> 
</ul>		
<form method="post" action="<?php echo base_url();?>index.php/dashboard/upload_dokumen">
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Upload Dokumen</button>
</form>
<hr>
 <div class="panel panel-primary">
      <div class="panel-heading">Daftar Dokumen</div>
	  <div class="panel-body"> 
<table class="table table-striped table-bordered" id="example" cellspacing="0" width="100%">
<thead>
    <tr>
        <th>Judul</th>
		<th>Kat</th>               
        <th>Sub 1</th>
        <th>Sub 2</th>
        <th>Sub 3</th>
		<th>Status</th>
        <th>Uploader</th>
		<th>Action</th>
    </tr>  
 </thead>
 <tbody>
 <?php 
 foreach($query->result() as $data){
 ?>
	<tr>
		<td><?php echo $data->judul;?></td>
		<td><?php echo $data->kategori;?></td>
		<td><?php echo $data->subkategori;?></td>
		<td><?php echo $data->namasubkategori2;?></td>
		<td><?php echo $data->namasubkategori3;?></td>
		<td><?php echo ($data->status == "1") ? 'Public' : 'Private'; ?></td>
		<td><?php echo $data->uploader;?></td>
		<td width="15%">
		<?php 
		if($data->dokumen != ''){
		echo '<a href="'.base_url().$data->dokumen.'" data-toggle="tooltip" title="download"><span class="glyphicon glyphicon-file"></span></a>';
		}
		?>
		<a href="<?php echo base_url();?>index.php/dashboard/detail_dokumen/<?php echo $data->id;?>"><span class="glyphicon glyphicon-zoom-in"></span> Detail</a>
		<a href="<?php echo base_url();?>index.php/dashboard/hapusdokumen/<?php echo $data->id;?>" onclick="return confirm('apakah anda akan menghapus data ini?' )"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
		</td>
	</tr>
<?php } ?>
 </tbody>
 </table>
</div>
</div>
  