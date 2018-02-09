<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progress extends CI_Controller {

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
	function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('M_progress');
		if (empty($this->session->userdata('session'))) {
			redirect('login');
		}
	}
	public function index()
	{
		$result['data'] = $this->M_progress->getAll();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/sidenav');
		$this->load->view('backend/list_progress',$result);
		$this->load->view('backend/footer');
	}
	public function tambah()
	{
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/sidenav');
		$this->load->view('backend/add_progress');
		$this->load->view('backend/footer');
	}
	public function add()
	{	
		$tanggal1 = substr($this->input->post('tanggal1'), 6,4)."-".substr($this->input->post('tanggal1'), 0,2)."-".substr($this->input->post('tanggal1'), 3,2);
		if (empty($this->input->post('tanggal2')) || empty($this->input->post('jam2'))) {
			$tanggal2 = substr($this->input->post('tanggal1'), 6,4)."-".substr($this->input->post('tanggal1'), 0,2)."-".substr($this->input->post('tanggal1'), 3,2);
		}else{
			$tanggal2 = substr($this->input->post('tanggal2'), 6,4)."-".substr($this->input->post('tanggal2'), 0,2)."-".substr($this->input->post('tanggal2'), 3,2);
		}
		//die();
		switch ($this->input->post('deputi')) {
			case 'asdep1':
				$created_by = 2;
				$url_back ='asdep1';
				break;
			case 'asdep2':
				$created_by = 3;
				$url_back ='asdep2';
				break;
			case 'asdep3':
				$created_by = 4;
				$url_back ='asdep3';
				break;
			case 'asdep4':
				$created_by = 5;
				$url_back ='asdep4';
				break;
			default:
				# code...
				break;
		}
		$dokumentasi1 =  $this->uploadImage($_FILES['foto1'],'foto1');
		$dokumentasi2 =  $this->uploadImage($_FILES['foto2'],'foto2');
		// print_r($dokumentasi2);die();
		$data = array('narasiKebijakan'=>$this->input->post('narasiKebijakan'),'uraian'=>$this->input->post('uraian'),
			'tanggal1'=>$tanggal1,'tanggal2'=>$tanggal2,'lokasi'=>$this->input->post('lokasi'),'hasil'=>$this->input->post('hasil'),
			'tindak_ljt'=>$this->input->post('tindak_ljt'),'arahan'=>$this->input->post('arahan'),'masalah'=>$this->input->post('masalah'),
			'dokumentasi1'=>$dokumentasi1,'dokumentasi2'=>$dokumentasi2,'created_by'=>$created_by,
			'updated_by'=>$this->session->userdata('session')[0]->no);
		// print_r($data);die();

		$this->M_progress->insert($data);
		redirect('Beranda/view/'.$url_back);
	}
	public function uploadImage($image,$name)
	{
		// print_r($image);die();
		if ($image) {
			$file_name = 'file_'.time();
			$config['upload_path']   = './assets/images/uploads/'; 
	        $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg'; 
	        $config['max_size']      = 204800; 
	        $config['max_width']     = 5120; 
	        $config['max_height']    = 3840;  
	        $config['file_name'] = $file_name;
	        $this->upload->initialize($config);
         	if ($this->upload->do_upload($name))
            {
            	// echo "string";die();
            	$img = $this->upload->data();
            	return $img['file_name'];
            }else{
            	return "";
            	// echo $this->upload->display_errors('<p>', '</p>');
            }
            //redirect('Foto');
         }
		
	}
	public function config()
	{
		$result['data'] = $this->M_progress->getAll();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/sidenav');
		$this->load->view('backend/list_progress',$result);
		$this->load->view('backend/footer');
	}
	public function update($value)
	{
		$result = $this->M_progress->getId($value);
		$doc1 = $_FILES['foto1'];
		$doc2 = $_FILES['foto2'];
		$tanggal1 = substr($this->input->post('tanggal1'), 6,4)."-".substr($this->input->post('tanggal1'), 0,2)."-".substr($this->input->post('tanggal1'), 3,2);
		if (empty($this->input->post('tanggal2')) || empty($this->input->post('jam2'))) {
			$tanggal2 = substr($this->input->post('tanggal1'), 6,4)."-".substr($this->input->post('tanggal1'), 0,2)."-".substr($this->input->post('tanggal1'), 3,2);
		}else{
			$tanggal2 = substr($this->input->post('tanggal2'), 6,4)."-".substr($this->input->post('tanggal2'), 0,2)."-".substr($this->input->post('tanggal2'), 3,2);
		}
		if ($doc1['size'] != 0) {
			$dokumentasi1 = $this->uploadImage($_FILES['foto1'],'foto1');
		}else{
			$dokumentasi1 = $result[0]->dokumentasi1;
		}
		if ($doc2['size'] != 0) {
			$dokumentasi2 = $this->uploadImage($_FILES['foto2'],'foto2');
		}else{
			$dokumentasi2 = $result[0]->dokumentasi2;
		}
		$data = array('narasiKebijakan'=>$this->input->post('narasiKebijakan'),'uraian'=>$this->input->post('uraian'),'tanggal1'=>$tanggal1,'tanggal2'=>$tanggal2,'lokasi'=>$this->input->post('lokasi'),'hasil'=>$this->input->post('hasil'),'arahan'=>$this->input->post('arahan'),'tindak_ljt'=>$this->input->post('tindak_ljt'),'masalah'=>$this->input->post('masalah'),'dokumentasi1'=>$dokumentasi1,'dokumentasi2'=>$dokumentasi2,'updated_by'=>$this->session->userdata('session')[0]->no,'updated_at'=>date("Y-m-d H:i:s"));
		//print_r($data);die();
		$this->M_progress->updateId($data,$value);
		$data = $this->M_progress->getId($value);
		redirect('Beranda/view/'.$data[0]->role);
	}
	public function delete($value)
	{
		$this->M_progress->deleteId($value);
		$data = $this->M_kebijakan->getId($value);
		redirect('Beranda/view/'.$data[0]->role);
	}
	public function edit($value)
	{
		$result['data'] = $this->M_progress->getId($value);
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/sidenav');
		$this->load->view('backend/edit_progress',$result);
		$this->load->view('backend/footer');
	}
}
