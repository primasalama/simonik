<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kebijakan extends CI_Model {
	public function getAll()
	{
		$sql = "SELECT kebijakan.*,user.role,user.name from kebijakan inner join user on user.no = kebijakan.created_by ";
		return $this->db->query($sql)->result();
	}
	public function getAllExcel($value)
	{
		if ($value == null) {
			$sql = "SELECT kebijakan.*,user.role,user.name from kebijakan inner join user on user.no = kebijakan.created_by ";	# code...
		}else{
			$sql = "SELECT kebijakan.*,user.role,user.name from kebijakan inner join user on user.no = kebijakan.created_by where user.role = '".$value."' ";
		}
		return $this->db->query($sql);
	}
	public function insert($data)
	{
		$this->db->insert('kebijakan',$data);
	}

	public function deleteId($value='')
	{
		$this->db->where('no',$value);
		$this->db->delete('kebijakan');
	}
	public function updateId($data,$value)
	{
		$this->db->where('no',$value);
		$this->db->update('kebijakan',$data);
	}
	public function getId($value='')
	{
		$sql = "SELECT kebijakan.*,user.role,user.name from kebijakan inner join user on user.no = kebijakan.created_by where kebijakan.no = '".$value."' ";
		return $this->db->query($sql)->result();
	}
	public function getByAsdep($value='')
	{
		$sql = "SELECT kebijakan.*,user.role from kebijakan inner join user on user.no = kebijakan.created_by where user.role = '".$value."' ";
		return $this->db->query($sql)->result();
	}
}