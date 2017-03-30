 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li class="active">Manage Slide</li> 
</ul>

<form method="post" action="<?php echo base_url();?>index.php/dashboard/upload_icon">
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Upload Icon</button>
</form>
<hr>
<div class="table-responsive">
<table class="display" id="example" cellspacing="0" width="100%">
    <thead>
      <tr>
		<th>No</th>
        <th>Slide</th>
        <th>Preview</th>
        <th>Status</th>
		<th>Link/Url</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	$i=1;
	foreach($query->result() as $data){
	?>
      <tr>
        <td><?php echo $i++;?></td>
		<td><?php echo $data->namaslide; ?></td>
		<td><img src="<?php echo base_url(); ?>uploads/icon/<?php echo $data->file;?>" class="img-thumbnail" alt="slide" width="50" height="50"> </td>
        <td><?php if($data->status == '0'){
			echo "Tidak Aktif";
		}else{
			echo "Aktif";
		}
		?></td>
		<td><?php echo $data->linkurl;?></td>
		<td>
		<a class="btn btn-success" href="<?php echo base_url();?>index.php/dashboard/edit_icon/<?php echo $data->id; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
		<a class="btn btn-danger" href="<?php echo base_url();?>index.php/dashboard/hapus_icon/<?php echo $data->id;?>" onclick="return confirm('apakah anda akan menghapus data ini?' )"><span class="glyphicon glyphicon-remove"></span> Delete</a>
		</td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
</div>
	  </div>
	  </div>
    </div>

   		<script type="text/javascript" class="init">
			$(document).ready(function() {
			$('#example').DataTable();
			} );
			
			$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		</script>
		