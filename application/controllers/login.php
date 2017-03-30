<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function index()
	{			
		
		$data['title'] = 'Sistem Aplikasi Basis Data - Login';
		$data['main']  = 'login_view';
		$data['pesan'] = '';
		$this->load->view('myview', $data);
	}
	
	function do_login()
	{
		$username = $this->input->post('txt_user');
		$password = $this->input->post('txt_pass');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('txt_user', 'Username', 'required');
		$this->form_validation->set_rules('txt_pass', 'Password', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$success = $this->auth->do_login($username,$password);	
			if($success)
			 {
				// lemparkan ke halaman index user
				
				if($this->session->userdata('namauser'))
				{
				redirect('dashboard');
				}else{
				redirect('welcome');
				}
				
			 }
			 else
			 {
				$data["pesan"] = "Username atau Password anda salah"; 			
				$data["main"]  = "login_view";
				$data["title"] = "Username atau Password anda salah";
				$this->load->view("myview", $data);
			 }
		}
		else{
		
			$data["pesan"] = validation_errors(); 			
			$data["main"]  = "login_view";
			$data["title"] = "Username atau Password anda salah";
			$this->load->view("myview", $data);
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
