<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * Auth library
 *
 * @author  Anggy Trisnawan
 */
class Auth{
   var $CI = NULL;
   function __construct()
   {
      // get CI's object
      $this->CI =& get_instance();
   }
   // untuk validasi login
   function do_login($username,$password)
   {
      // cek di database, ada ga?
	  $encrypt = md5($password);
	  $query = "SELECT * FROM tbl_user WHERE namauser = '$username' and passworduser = '$encrypt'";
	  $hasil = $this->CI->db->query($query);
	  
	  if($hasil->num_rows() > 0)
	  {
		foreach($hasil->result() as $row)
					{				
						if($username == trim($row->namauser) and md5($password) == trim($row->passworduser))
						{
							//jika berhasil login maka isi dengan atribut user
							$newuser = array(
							   'id'				=> $row->id,
							   'nama'  			=> $row->nama,
							   'namauser'		=> $row->namauser,
							   'role'			=> $row->role,
							   'ip address'		=> $_SERVER["REMOTE_ADDR"],
							   'browser'		=> $_SERVER['HTTP_USER_AGENT'],
							   'logged_in' 		=> TRUE
							);
							$this->CI->session->set_userdata($newuser);
							return true;
						}
						else
						{
							return false;
						}
					}
	  }
	  else
	  {
				return false;
	  }
  }
   // untuk mengecek apakah user sudah login/belum
   function is_logged_in()
   {
      if($this->CI->session->userdata('namauser') == '')
      {
         return false;
      }
      return true;
   }
   // untuk validasi di setiap halaman yang mengharuskan authentikasi
   function restrict()
   {
      if($this->is_logged_in() == false)
      {
         redirect('login');
      }
   }
	// untuk logout
	function do_logout()
	{
		$this->CI->session->sess_destroy();
	}
}