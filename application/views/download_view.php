<div class="page-header">
  <h1>Download</h1>
</div>

<div class="table-responsive">
<table class="display" id="example" cellspacing="0" width="100%">
    <thead>
      <tr>
		<th>No</th>
        <th>Kategori</th>
        <th>Sub 1</th>
		<th>Sub 2</th>
		<th>Sub 3</th>
		<th>File</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	$i=1;
	foreach($query->result() as $data):?>
      <tr>
        <td><?php echo $i++;?></td>
		<td><?php echo $data->kategori;?></td>
        <td><?php echo $data->subkategori;?></td>
        <td><?php echo $data->namasubkategori2;?></td>
        <td><?php echo $data->namasubkategori3;?></td>
		<td>
			<?php if($data->dokumen == ''){
	echo '<p><span class="glyphicon glyphicon-remove"></span> No File</p>';
  }else{
  ?>
  <p><a href="<?php echo base_url().$data->dokumen;?>"><span class="glyphicon glyphicon-file"></span>Download</a></p>
  <?php } ?>
		</td>
      </tr>
	  <?php endforeach; ?>
    </tbody>
  </table>
</div>


 		<script type="text/javascript" class="init">
			$(document).ready(function() {
			$('#example').DataTable();
			} );
			
			$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
		</script>