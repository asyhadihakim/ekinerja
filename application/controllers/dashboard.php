<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['query'] = $this->db->query("SELECT COUNT(*) AS jumlahdok FROM tbl_dokupload WHERE is_active = 1");
		$data['querymaster'] = $this->db->query("SELECT COUNT(*) AS jummaster FROM tbl_kategori");
		$data['querysubkat1'] = $this->db->query("SELECT COUNT(*) AS jumsubkat1 FROM tbl_subkategori1");
		$data['querysubkat2'] = $this->db->query("SELECT COUNT(*) AS jumsubkat2 FROM tbl_subkategori2");
		$data['querysubkat3'] = $this->db->query("SELECT COUNT(*) AS jumsubkat3 FROM tbl_subkategori3");
		$data['qrykat1'] = $this->db->query("SELECT a.id,a.nama_kategori AS mstkat, a.kode, b.nama_kategori AS subkat1, b.kodesub1, c.`namasubkategori2`, c.kodesub2, 
											d.`namasubkategori3`, d.kodesub3, e.dokumen, YEAR(e.`tgl_upload`) AS tahun
											FROM tbl_kategori a LEFT JOIN tbl_subkategori1 b ON a.`id` = b.`kdparent`
											LEFT JOIN tbl_subkategori2 c ON a.`id` = c.`kdparent` AND b.`id` = c.`idsubkat2`
											LEFT JOIN tbl_subkategori3 d ON a.`id` = d.`kdparent` AND b.`id` = d.`kdsubkat1` AND c.`idsubkat2` = d.`kdsubkat2`
											JOIN tbl_dokupload e ON e.`kdkat` = a.`id`
											GROUP BY mstkat, subkat1, namasubkategori2, namasubkategori3
											ORDER BY a.id");
											
											
		$data['q1'] = $this->db->query("SELECT * FROM tbl_kategori");
		$d = array();
		$i=0;
		foreach($data['q1']->result() as $dt){
			$d[$i]['nama'] = $dt->nama_kategori;
			//$d[$i]['dok'] = $dt->dokumen;
			$q2 = "SELECT * FROM tbl_subkategori1 WHERE kdparent = '".$dt->id."'";
			$x=0;
			foreach ($this->db->query($q2)->result() as $r){
				/* subkategori 2*/
				$q3 = "SELECT * FROM tbl_subkategori2 WHERE kdparent = '".$r->kdparent."' AND kdsubkat1 = '".$r->id."'";
				$y=0;
				foreach($this->db->query($q3)->result() as $s){
					$d[$i][$x]['nama'] = $r->nama_kategori;
					/* subkategori 3*/
					$q4 = "SELECT * FROM tbl_subkategori3 WHERE kdparent = '".$s->kdparent."' AND kdsubkat1 = '".$s->kdsubkat1."' AND kdsubkat2 = '".$s->idsubkat2."'";
					$z = 0;
					foreach($this->db->query($q4)->result() as $t){
						$d[$i][$x][$y]['nama'] = $s->namasubkategori2;
						$d[$i][$x][$y][$z++] = $t->namasubkategori3;
					}
					if ($this->db->query($q4)->num_rows() > 0) 
						$y++;
				}
				if ($this->db->query($q3)->num_rows() > 0) 
					$x++;
			}
			$i++;
		}
		$data['dt'] = $d;									
	
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama';
		$data['main']  = 'main/dashboard_view';
		$this->load->view('myview', $data);
	}
	
	function viewtree()
	{
		$this->auth->restrict();
		$data['q1'] = $this->db->query("SELECT * FROM tbl_kategori");
		$d = array();
		$i=0;
		foreach($data['q1']->result() as $dt){
			$d[$i]['nama'] = $dt->nama_kategori;
			$q2 = "SELECT * FROM tbl_subkategori1 WHERE kdparent = '".$dt->id."'";
			$x=0;
			foreach ($this->db->query($q2)->result() as $r){
				/* subkategori 2*/
				$q3 = "SELECT * FROM tbl_subkategori2 WHERE kdparent = '".$r->kdparent."' AND kdsubkat1 = '".$r->id."'";
				$y=0;
				foreach($this->db->query($q3)->result() as $s){
					$d[$i][$x]['nama'] = $r->nama_kategori;
					/* subkategori 3*/
					$q4 = "SELECT * FROM tbl_subkategori3 WHERE kdparent = '".$s->kdparent."' AND kdsubkat1 = '".$s->kdsubkat1."' AND kdsubkat2 = '".$s->idsubkat2."'";
					$z = 0;
					foreach($this->db->query($q4)->result() as $t){
						$d[$i][$x][$y]['nama'] = $s->namasubkategori2;
						$d[$i][$x][$y][$z++] = $t->namasubkategori3;
					}
					if ($this->db->query($q4)->num_rows() > 0) 
						$y++;
				}
				if ($this->db->query($q3)->num_rows() > 0) 
					$x++;
			}
			$i++;
		}
		$data['dt'] = $d;
		//print_r($d);die();
		
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Daftar Kategori dan Subkategori';
		$data['main']  = 'main/tampil_view';
		$this->load->view('myview', $data);
	}

	
	function get_master()
	{
		$data['qrykat1'] = $this->db->query("SELECT a.id,a.nama_kategori as mstkat, b.nama_kategori as subkat1, c.`namasubkategori2`, d.`namasubkategori3`
FROM tbl_kategori a LEFT JOIN tbl_subkategori1 b ON a.`id` = b.`kdparent`
LEFT JOIN tbl_subkategori2 c ON a.`id` = c.`kdparent` AND b.`id` = c.`idsubkat2`
LEFT JOIN tbl_subkategori3 d ON a.`id` = d.`kdparent` AND b.`id` = d.`kdsubkat1` AND c.`idsubkat2` = d.`kdsubkat2`");
		
		$tree = '{';
		
		$arr = array();
		
		foreach($data['qrykat1']->result() as $dt){
			
			$temp = array(
					'id' => $dt->id,
					'mstkat' => $dt->mstkat,
					'subkat1' => $dt->subkat1,
					'subkat2' => $dt->namasubkategori2,
					'subkat3' => $dt->namasubkategori3
					);
			array_push($arr,$temp);
		}
		
		$encode = json_encode($arr);
		print_r($encode);
		return $encode;
	}
	
	function get_kategori()
	{
		$kdkat = $this->uri->segment(3);
		$data['query'] = $this->db->query("SELECT * FROM tbl_subkategori1 WHERE kdparent = '$kdkat'");
		$this->load->view('main/subkategoridrop_view', $data);
	}
	
	function get_kategori2()
	{
		$kdkat = $this->uri->segment(3);
		$kdsubkat = $this->uri->segment(4);
		$data['query'] = $this->db->query("SELECT * FROM tbl_subkategori2 WHERE kdparent = '$kdkat' and kdsubkat1 = '$kdsubkat'");
		$this->load->view('main/subkategori2drop_view', $data);
	}
	
	function get_kategori3()
	{
		$kdkat = $this->uri->segment(3);
		$kdsubkat1 = $this->uri->segment(4);
		$kdsubkat2 = $this->uri->segment(5);
		$data['query'] = $this->db->query("SELECT * FROM tbl_subkategori3 WHERE kdparent = '$kdkat' and kdsubkat1 = '$kdsubkat1' and kdsubkat2 = '$kdsubkat2'");
		$this->load->view('main/subkategori3drop_view', $data);
	}
	
	function upload_dokumen()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Dokumen';
		$data['main']  = 'main/uploaddok_view';
		$data['pesan'] = '';
		
		$data['query'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
			
		$this->load->view('myview', $data);
	}
	
	function do_upload()
	{
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
			//$this->form_validation->set_rules('deskripsi', 'Deskripsi File', 'trim|required');
			$this->form_validation->set_rules('kategori', 'Master Kategori', 'required');
			//$this->form_validation->set_rules('kategori1', 'Sub Kategori 1', 'required');
			//$this->form_validation->set_rules('kategori2', 'Sub Kategori 2', 'required');
			//$this->form_validation->set_rules('kategori3', 'Sub Kategori 3', 'required');
			//$this->form_validation->set_rules('status', 'Status', 'required');		
			//$this->form_validation->set_rules('userfile', 'Upload File', 'required');
			
			if ($this->form_validation->run() == TRUE) {
				
				$judul = $this->input->post('judul');
				$deskripsi = $this->input->post('deskripsi');
				$link = $this->input->post('link');
				$tgldok = $this->input->post('tgldok');
				$kdkat = $this->input->post('kategori');
				$kdkat1 = $this->input->post('kategori1');
				$kdkat2 = $this->input->post('kategori2');
				$kdkat3 = $this->input->post('kategori3');
				$status = $this->input->post('status');
				$isactive = $this->input->post('isactive');				
				
								
				$kodeunik	= date('dmyHis');
				$config['file_name']			= 'kerjasama_'.$kdkat.'_'.$kdkat1.'_'.$kdkat2.'_'.$kdkat3.'_'.$kodeunik.'.pdf';				
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 12288;
				$config['overwriter']			= TRUE;
				$config['remove_spaces']		= TRUE;
				
				$filename = $config['file_name'];
				$path = $config['upload_path'];
				$userfile = $path.$filename;				
				$this->load->library('upload', $config);
				
				//die;
									
		
				if ( ! $this->upload->do_upload())
				{		
				
						if($_FILES['userfile']['error'] == '4')
						{
							$data = array(
									'judul' => $judul,
									'deskripsi' => $deskripsi,
									'link'	=> $link,
									'tgl_dokumen' => $tgldok,
									'kdkat' => $kdkat,
									'kdsubkat' => $kdkat1,
									'kdsubkat2' => $kdkat2,
									'kdsubkat3' => $kdkat3,
									'status' => $status,
									'tgl_upload' => date('Y-m-d h:i;s'),
									'is_active' => $isactive,
									'uploader' => $this->session->userdata('nama')
									);
								$this->db->insert('tbl_dokupload',$data);
								
								redirect('admin');
						
						}else{     
						
							$data['main']  = 'main/error_view';
							$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Dokumen';
							$data['pesan'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
							$this->load->view('myview', $data);
							
						}
				}
		        else
                {
				/* FTP Upload */
				$this->load->library('ftp');
									
				$config['hostname'] = '10.1.102.202';
				$config['username'] = 'administrator';
				$config['password'] = '1qazxsw2%$!(sjk';
				$config['debug']        = FALSE;			
				
				$this->ftp->connect($config);
				
				$this->ftp->chmod('/uploadfile/', 0777);

				$this->ftp->upload($userfile, '/uploadfile/'.$filename, 'binary', 0775);

				$this->ftp->close();

					
						$data = array(
						'judul' => $judul,
						'deskripsi' => $deskripsi,
						'link'	=> $link,
						'tgl_dokumen' => $tgldok,
						'kdkat' => $kdkat,
						'kdsubkat' => $kdkat1,
						'kdsubkat2' => $kdkat2,
						'kdsubkat3' => $kdkat3,
						'status' => $status,
						'tgl_upload' => date('Y-m-d h:i;s'),
						'dokumen' => $userfile,
						'is_active' => $isactive,
						'uploader' => $this->session->userdata('nama')
						);
					$this->db->insert('tbl_dokupload',$data);			
					
						$data = array('upload_data' => $this->upload->data());
						$data['main']  = 'main/upload_success';
						$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Sukses Upload Dokumen';
						$this->load->view('myview', $data);
						
                }
				
			}
			else{
				$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Dokumen';
				$data['main']  = 'main/uploaddok_view';
				$data['query'] = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
				$data['pesan'] = validation_errors();
				$this->load->view('myview', $data);
			}
	}
	
	function retrieve_server()
	{
		
		$this->load->library('ftp');

				$config['hostname'] = '10.1.102.202';
				$config['username'] = 'administrator';
				$config['password'] = '1qazxsw2%$!(sjk';
				$config['debug']        = TRUE;

		$this->ftp->connect($config);

		$list = $this->ftp->list_files('/uploadfile/');

		print_r($list);

		$this->ftp->close();
	
	}
	
	function detail_dokumen()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Detail Dokumen';
		$data['main']  = 'main/detaildok_view';
		$data['pesan'] = '';
		
		$data['querydok'] = $this->db->query("SELECT * FROM tbl_dokupload WHERE id = '$id'");
		foreach($data['querydok']->result() as $dt){
		$kdparent = $dt->kdkat;
		$kdsubkat1 = $dt->kdsubkat;
		$kdsubkat2 = $dt->kdsubkat2;
			$data['querykategori'] =  $this->db->query("SELECT * FROM tbl_kategori");
			$data['querysubkategori'] = $this->db->query("SELECT * FROM tbl_subkategori1 WHERE kdparent = '$kdparent'");
			$data['querysubkategori2'] = $this->db->query("SELECT * FROM tbl_subkategori2 WHERE kdparent = '$kdparent' and kdsubkat1 = '$kdsubkat1'");
			$data['querysubkategori3'] = $this->db->query("SELECT * FROM tbl_subkategori3 WHERE kdparent = '$kdparent' and kdsubkat1 = '$kdsubkat1' and kdsubkat2 = '$kdsubkat2'");
		}
		$this->load->view('myview', $data);
	}
	
	function editdetaildok()
	{
		$this->auth->restrict();
		$id = $this->input->post('iddokumen');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		//$this->form_validation->set_rules('deskripsi', 'Deskripsi File', 'trim|required');
		$this->form_validation->set_rules('kat1', 'Kategori', 'required');

		
		if ($this->form_validation->run() == TRUE) {
			$judul = $this->input->post('judul');
			$deskripsi = $this->input->post('deskripsi');
			$link = $this->input->post('link');
			$tgldok = $this->input->post('tgldok');
			$kat1 = $this->input->post('kat1');
			$kat2 = $this->input->post('kat2');
			$kat3 = $this->input->post('kat3');
			$kat4 = $this->input->post('kat4');
			$status = $this->input->post('status');
			//$isactive = $this->input->post('is_active');
			
			$kodeunik	= date('dmyHis');
			$config['file_name']			= 'kerjasama_'.$kat1.'_'.$kat2.'_'.$kat3.'_'.$kat4.'_'.$kodeunik.'.pdf';
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 12288;
			$config['overwriter']			= TRUE;
			$config['remove_spaces']		= TRUE;
			
			$filename = $config['file_name'];
			$path = $config['upload_path'];
			$userfile = $path.$filename;
			$this->load->library('upload', $config);
		
			    if ( ! $this->upload->do_upload())
                {
					if($_FILES['userfile']['error'] == '4')
					{
						/* Update Data */	
						$data = array(
						'judul' => $judul,
						'deskripsi' => $deskripsi,
						'link' => $link,
						'tgl_dokumen' => $tgldok,
						'kdkat' => $kat1,
						'kdsubkat' => $kat2,
						'kdsubkat2' => $kat3,
						'kdsubkat3' => $kat4,
						'status' => $status,
						'tgl_upload' => date('Y-m-d h:i;s'),
						//'dokumen' => $userfile,
						'editor' => $this->session->userdata('nama')						
						//'is_active' => $isactive
						);

						$this->db->where('id', $id);
						$this->db->update('tbl_dokupload', $data); 
						
						redirect('admin');
						
					}else{
					
                        $data['main']  = 'main/error_view';
						$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Dokumen';
						$data['pesan'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
                        $this->load->view('myview', $data);
						
					}
				
                }
                else
                {				
					
					/* Update Data */	
						$data = array(
						'judul' => $judul,
						'deskripsi' => $deskripsi,
						'link' => $link,
						'tgl_dokumen' => $tgldok,
						'kdkat' => $kat1,
						'kdsubkat' => $kat2,
						'kdsubkat2' => $kat3,
						'kdsubkat3' => $kat4,
						'status' => $status,
						'tgl_upload' => date('Y-m-d h:i;s'),
						'dokumen' => $userfile,
						'editor' => $this->session->userdata('nama')						
						//'is_active' => $isactive
					);

					$this->db->where('id', $id);
					$this->db->update('tbl_dokupload', $data); 
					
						$data = array('upload_data' => $this->upload->data());
						$data['main']  = 'main/upload_success';
						$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Sukses Edit Dokumen';
						$this->load->view('myview', $data);
						
						
                }			
		}else{
			
			$data['pesan'] = validation_errors();
			$data['main']  = 'main/detaildok_view';
			$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Edit Detail Dokumen';
			//$data['pesan'] = '';
			$data['querydok'] = $this->db->query("SELECT * FROM tbl_dokupload WHERE id = '$id'");
			foreach($data['querydok']->result() as $dt){
			$kdparent = $dt->kdkat;
			$kdsubkat1 = $dt->kdsubkat;
			$kdsubkat2 = $dt->kdsubkat2;
				$data['querykategori'] =  $this->db->query("SELECT * FROM tbl_kategori");
				$data['querysubkategori'] = $this->db->query("SELECT * FROM tbl_subkategori1 WHERE kdparent = '$kdparent'");
				$data['querysubkategori2'] = $this->db->query("SELECT * FROM tbl_subkategori2 WHERE kdparent = '$kdparent' and kdsubkat1 = '$kdsubkat1'");
				$data['querysubkategori3'] = $this->db->query("SELECT * FROM tbl_subkategori3 WHERE kdparent = '$kdparent' and kdsubkat1 = '$kdsubkat1' and kdsubkat2 = '$kdsubkat2'");
			}
			
			$this->load->view('myview', $data);
			
		}		
	}
	
	function hapusdokumen()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		
		$data = array(
               'is_active' => 2
            );

		$this->db->where('id', $id);
		$this->db->update('tbl_dokupload', $data); 
		
		//$this->upload_dokumen();
		redirect('/admin/');

	}
	
	function mng_user()
	{
		$this->auth->restrict();
		$data['query'] = $this->db->query("SELECT * FROM tbl_user");
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Manajemen User';
		$data['main']  = 'main/manuser_view';
		$this->load->view('myview', $data);
	}
	
	function tambahuser()
	{
		$this->auth->restrict();
		$data['pesan'] = '';
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Manajemen User';
		$data['main']  = 'main/tambahuser_view';
		$this->load->view('myview', $data);
	}
		
	function do_adduser()
	{
		$this->auth->restrict();
		
		$nama = $this->input->post('nama');
		$username = $this->input->post('txtusr');
		$pass = $this->input->post('txtpwd');
		$role = $this->input->post('role');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('txtusr', 'Username', 'trim|required');
		$this->form_validation->set_rules('txtpwd', 'Password', 'trim|required');
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$data = array(
					'nama' => $nama,
					'namauser' => $username,
					'passworduser' => md5($pass),
					'role' => $role
					);
				
			$this->db->insert('tbl_user',$data);
			
			redirect('dashboard/mng_user');
		}
		else
		{
			$data['pesan'] = validation_errors();
			$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Tambah User';
			$data['main']  = 'main/tambahuser_view';
			$this->load->view('myview', $data);
			
		}
	}
	
	function edituser()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$data['pesan'] = '';
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Edit User';
		$data['main']  = 'main/edituser_view';
		$data['query'] = $this->db->query("SELECT * FROM tbl_user WHERE id = '$id'");
		$this->load->view('myview', $data);
		
		if($this->input->post('nama')){
		$id2 = $this->input->post('txtid');	
		$nama = $this->input->post('nama');
		$username = $this->input->post('txtusr');
		$pass = $this->input->post('txtpwd');
		$role = $this->input->post('role');
			
		$data = array(
				'nama' => $nama,
				'namauser' => $username,
				'passworduser' => md5($pass),
				'role' => $role
				);
				
		$this->db->where('id', $id2);
		$this->db->update('tbl_user', $data); 
		
		redirect('dashboard/mng_user');
		}
		
	}

	
	function hapususer()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('tbl_user'); 
		
		//$this->upload_dokumen();
		redirect('/dashboard/mng_user');

	}
	
	function mng_icon()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Sukses Upload Icon';
		$data['main']  = 'main/manicon_view';
		$data['query'] = $this->db->query("SELECT * FROM tbl_slide ORDER BY id");
		$this->load->view('myview', $data);
		
	}
	
	function upload_icon()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Sukses Upload Icon';
		$data['main']  = 'main/uploadicon_view';
		$data['pesan'] = '';
		$this->load->view('myview', $data);
		
	}
	
	function edit_icon()
	{
		$this->auth->restrict();
		$id = $this->uri->segment(3);
		$data['query'] = $this->db->query("SELECT * FROM tbl_slide WHERE id = '$id' ORDER BY id");
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Edit Icon';
		$data['main']  = 'main/editicon_view';
		$data['pesan'] = '';
		$this->load->view('myview', $data);
		
	}
	
	function hapus_icon()
	{
		$this->auth->restrict();
		
		$id = $this->uri->segment(3);
		$this->db->where('id', $id);
		$this->db->delete('tbl_slide'); 

		redirect('/dashboard/mng_icon');
		
	}
	
	function do_upload_icon()
	{		
		//$this->auth->restrict();		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('namaicon', 'Nama Icon', 'trim|required');
		//$this->form_validation->set_rules('userfile', 'File Upload', 'trim|required');
				
		
		if ($this->form_validation->run() == TRUE) {

			$namaicon = $this->input->post('namaicon');
			$status = $this->input->post('chkstatus');
			//$file = $this->input->post('userfile');
			$tgl_upload = date('Y-m-d h:i:s');
			$linkurl = $this->input->post('linkurl');
				
				//$acak = rand(1000,1200);
				//$config['file_name']				= 'icon_'.$acak.'.jpg';
				$config['upload_path']          = './uploads/icon/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1024;
				$config['overwriter']			= TRUE;
				$config['remove_spaces']		= TRUE;
				
				//$filename = $config['file_name'];
				//$path = $config['upload_path'];
				//$userfile = $path.$filename;				
				$this->load->library('upload', $config);
			
			 if ( ! $this->upload->do_upload())
                {
							$data['main']  = 'main/error_view';
							$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Icon';
							$data['pesan'] = $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
							$this->load->view('myview', $data);
                }
                else
                {
					$dt = 
                        $data = array(
						'namaslide' => $namaicon,
						'status' => $status,
						'file' => $this->upload->data('file_name'),
						'tgl_upload' => $tgl_upload,
						'tipe' => '1',
						'linkurl' => $linkurl
						);

						$this->db->insert('tbl_slide',$data);
						
						$data = array('upload_data' => $this->upload->data());
						
						redirect('dashboard/mng_icon');
                }					
		
		}else{
				$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Manajemen Icon';
				$data['main']  = 'main/uploadicon_view';
				$data['pesan'] = validation_errors();
				$this->load->view('myview', $data);
		}
	}
	
}
