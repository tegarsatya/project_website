<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visi_misi_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('visi_misi');
		$this->db->order_by('id_vm', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah Data
	public function tambah($data)
	{
		$this->db->insert('visi_misi', $data);
	}

	// Detail
	public function detail($id_vm)
	{
		$query = $this->db->get_where('visi_misi', array('id_vm'  => $id_vm));
		return $query->row();
	}

	// Edit 
	public function edit($data)
	{
		$this->db->where('id_vm', $data['id_vm']);
		$this->db->update('visi_misi', $data);
	}

	// delete
	public function delete($data)
	{
		$this->db->where('id_vm', $data['id_vm']);
		$this->db->delete('visi_misi', $data);
	}
}

/* End of file Visi_misi_model.php */
