<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
		$this->load->model('M_progress');
		$this->load->library('excel');
	
    }
	public function index()
	{	
		$result['kebijakan'] = $this->M_kebijakan->getAll();
		$result['kprogress'] = $this->M_progress->getProgressKebijakan();
		$result['agenda'] = $this->M_agenda->getAll();
		$result['progress'] = $this->M_progress->getAll();
		$this->load->view('frontend/header');
		$this->load->view('frontend/beranda',$result);
		$this->load->view('frontend/footerf');
		
		//$this->load->view('frontend/tes', $result);
	}
	public function tes($value='')
	{
		$result['kprogress'] = $this->M_progress->getProgressKebijakan();
		$this->load->view('frontend/tes.php',$result);
	}
	public function view($value='')
	{
		if ($value != '') {
			if ($this->session->userdata('session')) {
				if ($this->session->userdata('session')[0]->role == $value OR $this->session->userdata('session')[0]->role == 'admin'){
					$result['kebijakan'] = $this->M_kebijakan->getByAsdep($value);
					$result['progress'] = $this->M_progress->getByAsdep($value);
					$this->load->view('frontend/header');
					$this->load->view('frontend/list',$result);
					$this->load->view('frontend/footerf');
				}else{
					//echo "string";die();
					$data = array('url' => 'view','value'=>$value);// nyimpen ke array, url kemana diakan balik setelah login nanti.
					$this->session->set_userdata('url',$data);
					redirect('Auth/logout');
				}
			}else{
				$data = array('url' => 'view','value'=>$value);// nyimpen ke array, url kemana diakan balik setelah login nanti.
				$this->session->set_userdata('url',$data);
				redirect('Auth/logout');
			}
		}else{
			redirect('Beranda');
		}
	}

	public function agenda($value='')
	{
		// print_r($this->session->userdata('session'));die();
		if ($value != '') {
			// if ($this->session->userdata('session')) {
				// if ($this->session->userdata('session')[0]->role == $value OR $this->session->userdata('session')[0]->role == 'admin'){
					$result['data'] = $this->M_agenda->getByAsdep($value);
					$this->load->view('frontend/header');
					$this->load->view('frontend/list_agenda',$result);
					$this->load->view('frontend/footerf');
			// 	}else{
			// 		$data = array('url' => 'agenda','value'=>$value);// nyimpen ke array, url kemana diakan balik setelah login nanti.
			// 		$this->session->set_userdata('url',$data);
			// 		redirect('Auth/logout');
			// 	}
			// }else{
			// 	$data = array('url' => 'agenda','value'=>$value);// nyimpen ke array, url kemana diakan balik setelah login nanti.
			// 	$this->session->set_userdata('url',$data);
			// 	redirect('Auth/logout');
			// }
		}else{
			$result['data'] = $this->M_agenda->getAll();
		// print_r($result['data']);die();
		$this->load->view('frontend/header');
		$this->load->view('frontend/list_agenda',$result);
		$this->load->view('frontend/footerf');
		}
	}
	public function random($length=6)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    echo $randomString;
	}
	public function excels($value='',$deputi=null)
	{
		if ($deputi != null) {
			$result['filename'] = $deputi;
		}else{
			$result['filename'] = null;
		}
		switch ($value) {
			case 'kebijakan':
				$result['data'] = $this->M_kebijakan->getAllExcel($deputi); //Ngambil data dari tabel, disimpen ke $data
				$this->load->view('frontend/e_kebijakan',$result);
				break;
			case 'agenda':
				$result['data'] = $this->M_agenda->getAllExcel('asdep1'); //Ngambil data dari tabel, disimpen ke $data
				// print_r($result['data']->result());die();
				// echo $deputi;die();
				if ($deputi != null) {
					echo "string";die();
					$this->load->view('frontend/agendaAsdep',$result);
				}else{
					// echo "sa";die();
					$this->load->view('frontend/e_agenda',$result);
				}
				//$this->load->view('frontend/e_agenda',$result);
				break;
			case 'progress':
				$result['data'] = $this->M_progress->getAllExcel($deputi); //Ngambil data dari tabel, disimpen ke $data
				$this->load->view('frontend/e_progress',$result);
				break;
			case 'kebijakanstrategis':
			$result['data'] = $this->M_progress->get_progressKebijakan();
				//print_r($result['data']->result());die();
				$this->load->view('frontend/e_pks', $result);
				break;
			case 'tanggal':
				// 05/12/2017 - 05/12/2017
				$tanggal1 = substr($this->input->post('datefilter'), 6,4)."-".substr($this->input->post('datefilter'), 0,2)."-".substr($this->input->post('datefilter'), 3,2);
				$tanggal2 = substr($this->input->post('datefilter'), 6,4)."-".substr($this->input->post('datefilter'), 19,2)."-".substr($this->input->post('datefilter'), 16,2);
				echo $tanggal2." -- ".$tanggal1;die();
				break;
			default:
				echo "a";
				break;
		}
	}
	public function md5($val)
	{
		echo md5($val);
	}
	public function coba($value='')
	{
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('test worksheet');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$filename='just_some_random_name.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}
