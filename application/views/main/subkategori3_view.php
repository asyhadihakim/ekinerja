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
  <li class="active">Sub Kategori 3</li> 
</ul>
<form method="post" action="<?php echo base_url();?>index.php/admin/tambahsubkategori3">
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Sub Kategori 3</button>
</form>
<hr>
<div class="table-responsive">
<table class="display" id="example" cellspacing="0" width="100%">
    <thead>
      <tr>
		<th>No</th>
        <th>Master Kategori</th>
        <th>Sub Kategori 1</th>
		<th>Sub Kategori 2</th>
		<th>Sub Kategori 3</th>
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
		<td><?php echo $data->parentkategori; ?></td>
        <td><?php echo $data->subkategori1; ?></td>
        <td><?php echo $data->namasubkategori2; ?></td>
		<td><?php echo $data->namasubkategori3; ?></td>
		<td><?php echo $data->kodesub3; ?></td>
		<td width="18%">
		<a class="btn btn-success" href="<?php echo base_url();?>index.php/admin/editsubkategori3/<?php echo $data->idsubkat3; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
		<a class="btn btn-danger" href="<?php echo base_url();?>index.php/admin/do_removemastersubkat3/<?php echo $data->idsubkat3; ?>" onclick="return confirm('apakah anda akan menghapus data ini?' )"><span class="glyphicon glyphicon-remove"></span> Delete</a>
		</td>
      </tr>
	  <?php endforeach; ?>
    </tbody>
  </table>
</div>