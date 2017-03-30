<?php echo $pesan;?>
<div class="loginmodal-container">
	<h1>Login</h1><br>
  <?php echo form_open('login/do_login');?>
	<input type="text" name="txt_user" placeholder="Username">
	<input type="password" name="txt_pass" placeholder="Password">
	<input type="submit" name="login" class="login loginmodal-submit" value="Login">
  </form>
	<!--
  <div class="login-help">
	<a href="#">Register</a> - <a href="#">Forgot Password</a>
  </div>
  -->
</div>