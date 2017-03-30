 <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>"index.php/dashboard>Dashboard</a></li>
  <li><a href="<?php echo base_url();?>index.php/dashboard/mng_user">Manajemen User</a></li>
  <li class="active">Tambah User</li> 
</ul>
<?php echo $pesan;?>
<div class="form-group">
<?php 
$attributes = array(
        'name'          => 'frm_adduser',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);

echo form_open_multipart('dashboard/do_adduser', $attributes);

?>
    
<label for="nama">Nama:</label>
  <input type="text" class="form-control" name="nama" id="nama">
  
  <label for="username">Username:</label>
  <input type="text" class="form-control" name="txtusr" id="txtusr">
  
  <label for="password">Password:</label>
  <input type="text" class="form-control" name="txtpwd" id="txtpwd">
  
  <label for="role">Role:</label>
  <select class="form-control" id="role" name="role">
  <option value="">PILIH</option>
  <option value="1">Admin</option>
  <option value="2">User</option>
  <option value="5">Super Admin</option>
  </select> 
  <br>
  <input name="simpan" value="Simpan" class="btn btn-primary" type="submit">  
 
</form>
</div>