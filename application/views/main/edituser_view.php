 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>"index.php/dashboard>Dashboard</a></li>
  <li><a href="<?php echo base_url();?>index.php/dashboard/mng_user">Manajemen User</a></li>
  <li class="active">Tambah User</li> 
</ul>
<?php echo $pesan;?>
<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_edituser',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('dashboard/edituser', $attributes);
foreach($query->result() as $data){
?>
    
<label for="nama">Nama:</label>
  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $data->nama; ?>">
  
  <label for="username">Username:</label>
  <input type="text" class="form-control" name="txtusr" id="txtusr" value="<?php echo $data->namauser; ?>">
  
  <label for="password">Password:</label>
  <input type="text" class="form-control" name="txtpwd" id="txtpwd" value="<?php echo $data->passworduser; ?>">
  
  <label for="role">Role:</label>
  <select class="form-control" id="role" name="role">
  <option value="">PILIH</option>
  <?php 
	  if($data->role == 1){
         		  	echo "<option  value=\"1\" selected>Admin</option>";
					}else{
					echo "<option  value=\"1\">Admin</option>";
					}
					
					if($data->role == 2)
					{
					   echo "<option  value=\"2\" selected>User</option>";
					}else{
					echo "<option  value=\"2\">User</option>";
					}
					
					if($data->role == 5)
					{
					   echo "<option  value=\"5\" selected>Super Admin</option>";
					}else{
						echo "<option  value=\"5\">Super Admin</option>";
					}
  ?>
  
  </select> 
  <br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
  <input type="hidden" class="form-control" name="txtid" id="txtid" value="<?php echo $data->id; ?>">
 <?php } ?>
</form>
</div>