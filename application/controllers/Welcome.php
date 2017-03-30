<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$data['query'] = $this->db->query("SELECT * FROM tbl_slide");
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama';
		$data['main']  = 'landing_view';
		$this->load->view('myview', $data);
	}
	
	function upload_dokumen()
	{
		$this->auth->restrict();
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Dokumen';
		$data['main']  = 'main/uploaddok_view';
		$data['pesan'] = '';
		$this->load->view('myview', $data);
	}
	
	function do_upload()
	{
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 1024;
				$config['overwriter']			= TRUE;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                        $data['pesan'] = $this->upload->display_errors();
						$data['main']  = 'main/uploaddok_view';
						$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Dokumen';
                        $this->load->view('myview', $data);
                }
                else
                {
						$data = array('upload_data' => $this->upload->data());
						$data['main']  = 'main/upload_success';
						$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Upload Dokumen';
                        
                        $this->load->view('myview', $data);
                }
	}
	
	function tentang()
	{
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Tentang Aplikasi';
		$data['main']  = 'about_view';
		$this->load->view('myview', $data);
	}
	
	function manual()
	{
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Manual';
		$data['main']  = 'manual_view';
		$this->load->view('myview', $data);		
	}
	
	function download()
	{
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Download';
		$data['main']  = 'download_view';
		$data['query'] = $this->db->query("SELECT a.id, a.judul AS judul, a.deskripsi AS deskripsi, a.status, 
a.dokumen, b.nama_kategori AS kategori, c.nama_kategori AS subkategori, d.namasubkategori2, e.namasubkategori3
FROM tbl_dokupload a LEFT JOIN tbl_kategori b ON a.kdkat = b.id LEFT JOIN tbl_subkategori1 c ON a.kdsubkat = c.id 
LEFT JOIN tbl_subkategori2 d ON a.kdsubkat2 = d.idsubkat2 LEFT JOIN tbl_subkategori3 e ON a.kdsubkat3 = e.idsubkat3
WHERE is_active = 1 AND a.status = '1' ORDER BY a.id DESC");
		$this->load->view('myview', $data);
	}
	
	function pedum()
	{
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Pedoman Umum';
		$data['main']  = 'pedum_view';
		$this->load->view('myview', $data);
	}
	
	function poster()
	{
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Poster';
		$data['main']  = 'poster_view';
		$this->load->view('myview', $data);
	}

	function booklet()
	{
		$data['title'] = 'Sistem Aplikasi Basis Data Kerjasama - Booklet';
		$data['main']  = 'booklet_view';
		$this->load->view('myview', $data);
	}
}
