<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru_model extends CI_Model
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
		$this->db->from('guru');
		$this->db->order_by('id_guru', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah Data
	public function tambah($data)
	{
		$this->db->insert('guru', $data);
	}

	// Detail
	public function detail($id_guru)
	{
		$query = $this->db->get_where('guru', array('id_guru'  => $id_guru));
		return $query->row();
	}

	// Edit 
	public function edit($data)
	{
		$this->db->where('id_guru', $data['id_guru']);
		$this->db->update('guru', $data);
	}


	// delete

	public function delete($data)
	{
		$this->db->where('id_guru', $data['id_guru']);
		$this->db->delete('guru', $data);
	}
}
/* End of file ModelNameStruktur_model.php */
