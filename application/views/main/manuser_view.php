  <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/dashboard">Dashboard</a></li>
  <li class="active">Manajemen User</li> 
</ul>
<form method="post" action="<?php echo base_url();?>index.php/dashboard/tambahuser">
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah User</button>
</form>
<hr>
  <div class="panel panel-primary">
      <div class="panel-heading">Manajemen User</div>
      <div class="panel-body">
	<table class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
		<th>Role</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach($query->result() as $data){ ?>
      <tr>
        <td><?php echo $data->nama; ?></td>
        <td><?php echo $data->namauser;?></td>
        <td><?php echo $data->passworduser;?></td>
		<td><?php if($data->role == 1){
					echo "Admin";
				}elseif($data->role == 2){
					echo "User";
				}elseif($data->role == 5){
					echo "Superadmin";
				}
		?></td>
		<td width="18%">
		<a class="btn btn-success" href="<?php echo base_url();?>index.php/dashboard/edituser/<?php echo $data->id; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
		<a class="btn btn-danger" href="<?php echo base_url();?>index.php/dashboard/hapususer/<?php echo $data->id; ?>" onclick="return confirm('apakah anda akan menghapus data ini?' )"><span class="glyphicon glyphicon-remove"></span> Delete</a>
		</td>
      </tr>
	  <?php } ?>
    </tbody>
  </table>
	  </div>
    </div>

  