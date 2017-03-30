  <ul class="breadcrumb">
  <li><a href="<?php echo base_url();?>">Home</a></li>
  <li class="active">Profile</li> 
</ul>
  <div class="panel panel-primary">
      <div class="panel-heading">User Profile</div>
      <div class="panel-body">
	  <div class="form-group">
<?php 
echo $error;
$attributes = array(
        'name'          => 'frm_userprofile',
        'id'            => 'form-validated',
        'class'     	=> 'well form-horizontal',
		'enctype'		=> 'multipart/form-data'
);
foreach($query->result() as $dt){
echo form_open_multipart('admin/editakun/'.$this->session->userdata('id'), $attributes);

?>
  <label for="Nama">Nama:</label>
  <input type="text" class="form-control" id="disabledTextInput" name="nama" value="<?php echo $dt->nama; ?>" disabled>
  
  <label for="Username">Username:</label>
  <input type="text" class="form-control" id="username" name="username" value="<?php echo $dt->namauser; ?>">
  
  <label for="Password">Password:</label>
  <input type="text" class="form-control" id="password" name="password" value="<?php echo $dt->passworduser; ?>" disabled>
  
  <label for="Passwordlama">Password Lama:</label>
  <input type="text" class="form-control" id="passwordlama" name="passwordlama" value="">
  
   <label for="Passwordbaru">Password Baru:</label>
  <input type="text" class="form-control" id="passwordbaru" name="passwordbaru" value="">

  <label for="Role">Role:</label>
<select class="form-control" id="role" name="role">
  <option value="">PILIH</option>
  <?php 
	  if($dt->role == 1){
         		  	echo "<option  value=\"1\" selected>Admin</option>";
					}else{
					echo "<option  value=\"1\">Admin</option>";
					}
		
					if($dt->role == 2)
					{
					   echo "<option  value=\"2\" selected>User</option>";
					}else{
					echo "<option  value=\"2\">User</option>";
					}
					
				if($this->session->userdata('role') == 5){
					if($dt->role == 5)
					{
					   echo "<option  value=\"5\" selected>Super Admin</option>";
					}else{
					echo "<option  value=\"5\">Super Admin</option>";
					}
				}
  ?>
  
  </select> 
<?php 
}
 ?>
  <br>
  <input name="ubah" value="Ubah" class="btn btn-primary" type="submit">  
  <input type="button" name="back" class="btn btn-danger" value="Kembali" onClick="history.go(-1);return true;"/>
</form>

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
  