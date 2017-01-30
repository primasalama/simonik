<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fagenda extends CI_Controller {

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
		$this->load->model('M_agenda');
		$this->load->model('M_kebijakan');
		if (empty($this->session->userdata('session'))) {
			redirect('login');
		}
	}
	public function index()
	{
		if($this->session->userdata('session')[0]->role == 'admin'){
			$result['data'] = $this->M_kebijakan->getAll();
		}else{
			$result['data'] = $this->M_kebijakan->getByAsdep($this->session->userdata('session')[0]->role);
		}
		$this->load->view('frontend/header');
		$this->load->view('frontend/add_agenda',$result);
		$this->load->view('frontend/footerf');
	}

	public function add()
	{
		//$tgl = substr($this->input->post('tanggal'), 6,4)."-".substr($this->input->post('tanggal'), 0,2)."-".substr($this->input->post('tanggal'), 3,2);
		$data = array('narasiKebijakan'=>$this->input->post('narasiKebijakan'),'uraian'=>$this->input->post('uraian'),'tanggal'=>$this->input->post('tanggal'),'hasil'=>$this->input->post('hasil'),'created_by'=>$this->session->userdata('session')[0]->no,'updated_by'=>$this->session->userdata('session')[0]->no);
		$this->M_agenda->insert($data);
		redirect('agenda/'.$this->session->userdata('session')[0]->role);
	}
	public function config()
	{
		$result['data'] = $this->M_agenda->getAll();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/sidenav');
		$this->load->view('backend/list_agenda',$result);
		$this->load->view('backend/footer');
	}
	public function update($value)
	{
		$data = array('narasiKebijakan' => $this->input->post('narasiKebijakan'),'uraian'=>$this->input->post('uraian'),'tanggal'=>$this->input->post('tanggal'),'hasil'=>$this->input->post('hasil'),'updated_by'=>$this->session->userdata('session')[0]->no,'updated_at'=>date("Y-m-d H:i:s"));
		$this->M_agenda->updateId($data,$value);
		redirect('agenda/'.$this->session->userdata('session')[0]->role);
	}
	public function delete($value)
	{
		$this->M_agenda->deleteId($value);
		redirect('agenda/'.$this->session->userdata('session')[0]->role);
	}
	public function edit($value)
	{
		if($this->session->userdata('session')[0]->role == 'admin'){
			$result['data1'] = $this->M_kebijakan->getAll();
		}else{
			$result['data1'] = $this->M_kebijakan->getByAsdep($this->session->userdata('session')[0]->role);
		}
		$result['data'] = $this->M_agenda->getId($value);
		$this->load->view('frontend/header');
		$this->load->view('frontend/edit_agenda',$result);
		$this->load->view('frontend/footerf');
	}
}
