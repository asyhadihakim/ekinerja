 		<script type="text/javascript" class="init">
			$(document).ready(function() {
			$('#example').DataTable();
			} );
			
			$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		</script>
 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li class="active">Master Kategori</li> 
</ul>
<form method="post" action="<?php echo base_url();?>index.php/admin/tambahmasterkategori">
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Kategori</button>
</form>
<hr>
<div class="table-responsive">
<table class="display" id="example" cellspacing="0" width="100%">
    <thead>
      <tr>
		<th width="7%">No</th>
        <th>Master Kategori</th>
        <th>Deskripsi</th>
        <th>Kode</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	$i=1;
	foreach($query->result() as $data):?>
      <tr>
        <td><?php echo $i++;?></td>
        <td><?php echo $data->nama_kategori;?></td>
        <td><?php echo $data->deskripsi;?></td>
        <td><?php echo $data->kode;?></td>		
		<td>
		<a class="btn btn-success" href="<?php echo base_url();?>index.php/admin/editmasterkategori/<?php echo $data->id;?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
		<a class="btn btn-danger" href="<?php echo base_url();?>index.php/admin/do_removemasterkat/<?php echo $data->id;?>" onclick="return confirm('apakah anda akan menghapus data ini?' )"><span class="glyphicon glyphicon-remove"></span> Delete</a>
		</td>
      </tr>
	  <?php endforeach; ?>
    </tbody>
  </table>
</div>
