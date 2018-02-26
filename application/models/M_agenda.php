<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_agenda extends CI_Model {

	public function getAll()
	{
		$sql = "SELECT agenda.*,user.role,user.name from agenda inner join user on user.no = agenda.created_by  ORDER BY agenda.tanggal DESC";
		return $this->db->query($sql)->result();
	}
	public function getAllExcel($value)
	{
		if ($value == null) {
			$sql = "SELECT agenda.* from agenda ORDER BY tanggal DESC";	# code...
		}else{
			$sql = "SELECT agenda.*from agenda where agenda.".$value." = 1 ORDER BY tanggal DESC ";
		}
		// echo $sql;die();
		return $this->db->query($sql);
	}
	public function insert($data)
	{
		$this->db->insert('agenda',$data);
	}

	public function deleteId($value='')
	{
		$this->db->where('no',$value);
		$this->db->delete('agenda');
	}
	public function updateId($data,$value)
	{
		$this->db->where('no',$value);
		$this->db->update('agenda',$data);
	}
	public function getId($value='')
	{
		$sql = "SELECT agenda.*,user.role,user.name from agenda inner join user on user.no = agenda.created_by  where agenda.no = '".$value."' ";
		return $this->db->query($sql)->result();
	}
	public function getByAsdep($value='')
	{
		$sql = "SELECT agenda.*,user.role,user.name from agenda inner join user on user.no = agenda.created_by  where agenda.".$value." = 1 ORDER BY agenda.tanggal DESC ";
		return $this->db->query($sql)->result();
	}
} 	