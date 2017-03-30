<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->auth->restrict();	
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Admin Dashboard';
		$data['main']  = 'main/home';
		$data['query'] = $this->db->query("SELECT a.id, a.judul AS judul, a.deskripsi AS deskripsi, a.status, 
a.dokumen, a.`tgl_upload`, b.nama_kategori AS kategori, c.nama_kategori AS subkategori, d.namasubkategori2, e.namasubkategori3, a.uploader 
FROM tbl_dokupload a LEFT JOIN tbl_kategori b ON a.kdkat = b.id LEFT JOIN tbl_subkategori1 c ON a.kdsubkat = c.id 
LEFT JOIN tbl_subkategori2 d ON a.kdsubkat2 = d.idsubkat2 LEFT JOIN tbl_subkategori3 e ON a.kdsubkat3 = e.idsubkat3
WHERE is_active = 1 ORDER BY a.`tgl_upload` DESC");
		$this->load->view('myview', $data);
	}
	
	function master_kategori()
	{
		$this->auth->restrict();
		
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Master Kategori';
		$data['main']  = 'main/masterkategori_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");		
		
		$this->load->view('myview', $data);
	}
	
	function insertkategori()
	{
		$this->auth->restrict();
		
		$namakat = $this->input->post('namakat');
		$deskripsi = $this->input->post('deskripsi');
		$kode = $this->input->post('kode');
		
		$data = array(
					'nama_kategori' => $namakat,
					'deskripsi' => $deskripsi,
					'kode' => $kode
				);
		$this->db->insert('tbl_kategori',$data);
		
		$this->master_kategori();
		
		//$query = "INSERT INTO tbl_kategori ('nama_kategori')VALUES ";
		
	}
	
	function tambahmasterkategori()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Tambah Master Kategori';
		$data['main']  = 'main/tambahmasterkategori_view';
		$data['pesan'] = '';
		
		//$data['query'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
		
		$this->load->view('myview', $data);
	}
	
	function editmasterkategori()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		//echo $id;
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Edit Master Kategori';
		$data['main']  = 'main/editmasterkategori_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query("SELECT * FROM tbl_kategori WHERE id = $id");
		
		$this->load->view('myview', $data);
	}
	
	function do_editmasterkategori()
	{
		$this->auth->restrict();
		$id = $this->input->post('idkat');
		
		$namakat = $this->input->post('namakat');
		$deskripsi = $this->input->post('deskripsi');
		$kode = $this->input->post('kode');
		
		$data = array(
               'nama_kategori' => $namakat,
               'deskripsi' => $deskripsi,
			   'kode' => $kode
            );

		$this->db->where('id', $id);
		$this->db->update('tbl_kategori', $data); 
		
		//echo "<script type='text/javascript'>alert('Data kataegori sudah di edit'); window.location.href='".base_url()."index.php/admin/master_kategori/'</script>";
		redirect('/admin/master_kategori/');
	}
	
	function do_removemasterkat()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('tbl_kategori'); 
		redirect('/admin/master_kategori/');

	}
	
	function sub_kategori()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Sub Kategori';
		$data['main']  = 'main/subkategori_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query('select b.kodesub1, b.id, b.kdparent, a.nama_kategori as parentkategori, a.deskripsi as parentdeskripsi, b.nama_kategori as subkategori1, b.deskripsi as subdeskripsi1 from tbl_kategori a RIGHT JOIN tbl_subkategori1 b on a.id = b.kdparent');
		
		$this->load->view('myview', $data);
	}
	
	function tambahsubkategori()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Tambah Sub Kategori';
		$data['main']  = 'main/tambahsubkategori_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
		
		$this->load->view('myview', $data);
	}
	
	function insertsubkategori()
	{
		$this->auth->restrict();
		$parent = $this->input->post('masterkat');
		$namasubkat = $this->input->post('namasubkat');
		$deskripsi = $this->input->post('deskripsi');
		$kode = $this->input->post('kode');
		
		$data = array(
					'kdparent' => $parent,
					'nama_kategori' => $namasubkat,
					'deskripsi' => $deskripsi,
					'kodesub1' => $kode
				);
		$this->db->insert('tbl_subkategori1',$data);
		
		redirect('/admin/sub_kategori/');
	}
	
	function editsubkategori()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Tambah Sub Kategori';
		$data['main']  = 'main/editsubkategori_view';
		$data['pesan'] = '';
		$data['querykategori'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
		$data['query'] = $this->db->query("SELECT * FROM tbl_subkategori1 WHERE id = '$id'");
		//$data['query'] = $this->db->query("SELECT a.id as idkat, b.id as idsub, b.kdparent, a.nama_kategori as namakategori, b.nama_kategori as namasubkategori, a.deskripsi as deskripsikategori, b.deskripsi as deskripsisubkategori 
//FROM tbl_kategori a
//JOIN tbl_subkategori1 b ON a.id = b.kdparent
//WHERE a.id = '$id'");
		
		$this->load->view('myview', $data);
	}
	
	function do_editsubkategori()
	{
		$this->auth->restrict();
		$idsub = $this->input->post('idsubkategori');
		$parent = $this->input->post('masterkat');
		$namasubkat = $this->input->post('namasubkat');
		$deskripsi = $this->input->post('deskripsi');
		$kode = $this->input->post('kode');
		
		$data = array(
               'kdparent' => $parent,
               'nama_kategori' => $namasubkat,
			   'deskripsi' => $deskripsi,
			   'kodesub1' => $kode
            );

		$this->db->where('id', $idsub);
		$this->db->update('tbl_subkategori1', $data); 
		
		redirect('/admin/sub_kategori/');
	}
	
	function do_removemastersubkat()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('tbl_subkategori1'); 
		redirect('/admin/sub_kategori/');

	}
	
	function sub_kategori2()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Sub Kategori 2';
		$data['main']  = 'main/subkategori2_view';
		$data['pesan'] = '';
		$sql = "SELECT c.kodesub2, b.id, b.kdparent, a.nama_kategori AS parentkategori, a.deskripsi AS parentdeskripsi, b.nama_kategori AS subkategori1, 
										b.deskripsi AS subdeskripsi1, c.idsubkat2, c.namasubkategori2, c.desksubkategori2  
										FROM tbl_kategori a JOIN tbl_subkategori1 b ON a.id = b.kdparent RIGHT JOIN tbl_subkategori2 c ON
										a.id = c.kdparent AND b.id = c.kdsubkat1";
		$data['query'] = $this->db->query($sql);
		$this->load->view('myview', $data);
	}
	
	function tambahsubkategori2()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Tambah Sub Kategori 2';
		$data['main']  = 'main/tambahsubkategori2_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
		
		$this->load->view('myview', $data);
	}
	
	function insertsubkategori2()
	{
		$this->auth->restrict();
		$parent = $this->input->post('masterkat');
		$subkat1 = $this->input->post('subkat1');
		$namasubkat2 = $this->input->post('namasubkat2');
		$deskripsisubkat2 = $this->input->post('deskripsisubkat2');
		$kode = $this->input->post('kode');
		
		$data = array(
					'kdparent' => $parent,
					'kdsubkat1' => $subkat1,
					'namasubkategori2' => $namasubkat2,
					'desksubkategori2' => $deskripsisubkat2,
					'kodesub2' => $kode					
				);
		$this->db->insert('tbl_subkategori2',$data);
		
		redirect('/admin/sub_kategori2/');
	}
	
	function editsubkategori2()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Edit Sub Kategori 2';
		$data['main']  = 'main/editsubkategori2_view';
		$data['pesan'] = '';
		
		$data['querysubkategori2'] = $this->db->query("SELECT * FROM tbl_subkategori2 WHERE idsubkat2 = '$id'");
		foreach($data['querysubkategori2']->result() as $dt){
		$kdparent = $dt->kdparent;
			$data['querykategori'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
			$data['querysubkategori1'] = $this->db->query("SELECT * FROM tbl_subkategori1 WHERE kdparent = '$kdparent'");
		}
		$this->load->view('myview', $data);
	}
	
	function do_editsubkategori2()
	{
		$this->auth->restrict();
		$kdparent = $this->input->post('masterkat');
		$idsub1 = $this->input->post('subkat1');
		$idsub2 = $this->input->post('idsubkat2');		
		$namasubkat2 = $this->input->post('namasubkat2');
		$deskripsi = $this->input->post('deskripsi2');
		$kode = $this->input->post('kode');
		
		$data = array(
               'kdparent' => $kdparent,
			   'kdsubkat1' => $idsub1,
               'namasubkategori2' => $namasubkat2,
			   'desksubkategori2' => $deskripsi,
			   'kodesub2' => $kode
            );

		$this->db->where('idsubkat2', $idsub2);
		$this->db->update('tbl_subkategori2', $data); 
		
		redirect('/admin/sub_kategori2/');
	}
	
	function do_removemastersubkat2()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$this->db->where('idsubkat2', $id);
		$this->db->delete('tbl_subkategori2'); 
		redirect('/admin/sub_kategori2/');

	}
	
	function sub_kategori3()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Sub Kategori 3';
		$data['main']  = 'main/subkategori3_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query("SELECT d.kodesub3, d.idsubkat3, b.id, b.kdparent, a.nama_kategori AS parentkategori, a.deskripsi AS parentdeskripsi, b.nama_kategori AS subkategori1, 
											b.deskripsi AS subdeskripsi1, c.idsubkat2, c.namasubkategori2, c.desksubkategori2, d.namasubkategori3, d.desksubkategori3   
											FROM tbl_kategori a JOIN tbl_subkategori1 b ON a.id = b.kdparent JOIN tbl_subkategori2 c ON
											a.id = c.kdparent AND b.id = c.kdsubkat1 RIGHT JOIN tbl_subkategori3 d ON a.id = d.kdparent AND b.id = d.kdsubkat1 
											AND c.idsubkat2 = d.kdsubkat2");
		
		$this->load->view('myview', $data);
	}
	
	function tambahsubkategori3()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Tambah Sub Kategori 3';
		$data['main']  = 'main/tambahsubkategori3_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
		
		$this->load->view('myview', $data);
	}
	
	function insertsubkategori3()
	{
		$this->auth->restrict();
		$parent = $this->input->post('masterkat');
		$subkat1 = $this->input->post('subkat1');
		$subkat2 = $this->input->post('subkat2');
		$namasubkat3 = $this->input->post('namasubkat3');
		$deskripsisubkat3 = $this->input->post('deskripsisubkat3');
		$kode = $this->input->post('kode');
		
		$data = array(
					'kdparent' => $parent,
					'kdsubkat1' => $subkat1,
					'kdsubkat2' => $subkat2,
					'namasubkategori3' => $namasubkat3,
					'desksubkategori3' => $deskripsisubkat3,
					'kodesub3' => $kode
				);
		$this->db->insert('tbl_subkategori3',$data);
		
		redirect('/admin/sub_kategori3/');
	}
	
	function editsubkategori3()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Edit Sub Kategori 3';
		$data['main']  = 'main/editsubkategori3_view';
		$data['pesan'] = '';
		
		$data['querysubkategori3'] = $this->db->query("SELECT * FROM tbl_subkategori3 WHERE idsubkat3 = '$id'");
		foreach($data['querysubkategori3']->result() as $dt){
		$kdparent = $dt->kdparent;
		$kdsubkat1 = $dt->kdsubkat1;
		$kdsubkat2 = $dt->kdsubkat2;
			$data['querykategori'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
			$data['querysubkategori1'] = $this->db->query("SELECT * FROM tbl_subkategori1 WHERE kdparent = '$kdparent'");
			$data['querysubkategori2'] = $this->db->query("SELECT * FROM tbl_subkategori2 WHERE kdparent = '$kdparent' AND kdsubkat1 = '$kdsubkat1'");
		}
		$this->load->view('myview', $data);
	}
	
	function do_editsubkategori3()
	{
		$this->auth->restrict();
		$kdsubkat3 = $this->input->post('kdsubkat3');
		$kdparent = $this->input->post('masterkat');
		$subkat1 = $this->input->post('subkat1');
		$subkat2 = $this->input->post('subkat2');	
		$namasubkat3 = $this->input->post('namasubkat3');		
		$deskripsisubkat3 = $this->input->post('deskripsisubkat3');
		$kode = $this->input->post('kode');
		
		$data = array(
               'kdparent' => $kdparent,
			   'kdsubkat1' => $subkat1,
			   'kdsubkat2' => $subkat2,
               'namasubkategori3' => $namasubkat3,
			   'desksubkategori3' => $deskripsisubkat3,
			   'kodesub3' => $kode
            );

		$this->db->where('idsubkat3', $kdsubkat3);
		$this->db->update('tbl_subkategori3', $data); 
		
		redirect('/admin/sub_kategori3/');
	}
	
	function do_removemastersubkat3()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$this->db->where('idsubkat3', $id);
		$this->db->delete('tbl_subkategori3'); 
		redirect('/admin/sub_kategori3/');

	}
	
	function userprofile()
	{		
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Admin Profile';
		$data['main']  = 'main/userprofile_view';
		$data['error'] = '';
		$id = $this->session->userdata('id');
		
		$data['query'] = $this->db->query("SELECT * FROM tbl_user WHERE id = $id");
		$data['query2'] = $this->db->query("SELECT YEAR(tgl_upload) AS tahun FROM tbl_dokupload");
				
		$this->load->view('myview', $data);
	}
	
	function editakun()
	{
		$id = $this->uri->segment(3);
		$username = $this->input->post('username');
		$role = $this->input->post('role');
		$passlama = $this->input->post('passwordlama');
		$passbaru = $this->input->post('passwordbaru');
		$md5passlama = md5($passlama);
		$md5passbaru = md5($passbaru);		
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required');
		//$this->form_validation->set_rules('role', 'Role', 'trim|required');
		$data['query'] = $this->db->query("SELECT * FROM tbl_user WHERE id = $id");
		
		if ($this->form_validation->run() == TRUE) {
			
			$data['error'] = '';
			foreach($data['query']->result() as $dt){
				$passdb = $dt->passworduser;
	
				if($passdb == $md5passlama) {
					$data = array(
					'namauser' => $username,
					'passworduser' => $md5passbaru,
					'role' => $role,
					'update' => date('Y-m-d h:i;s')
					);
					
					$this->db->where('id', $id);
					$this->db->update('tbl_user', $data); 
					
					redirect('admin/userprofile');
				}else{
					$data['error'] = "Salah Password Lama";
					$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Error';
					$data['main']  = 'main/userprofile_view';
					$this->load->view('myview', $data);
				}
			}
		}else{
			$data['error'] = validation_errors();
			$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Error';
			$data['main']  = 'main/userprofile_view';
			$this->load->view('myview', $data);
		}
		
		
	}	
		
	function laporan()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Laporan';
		$data['main']  = 'main/laporan_view';
		$this->load->view('myview', $data);
	}
	

	
}
