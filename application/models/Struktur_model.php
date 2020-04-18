<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_model extends CI_Model 
{
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('struktur');
		$this->db->order_by('id_str','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah Data
	public function tambah($data)
	{
		$this->db->insert('struktur', $data);
	}

	// Detail
	public function detail($id_str){
		$query = $this->db->get_where('struktur',array('id_str'  => $id_str));
		return $query->row();
	}

	// Edit 
	public function edit($data)
	{
		$this->db->where('id_str', $data['id_str']);
		$this->db->update('struktur', $data);
	}


	// delete

	public function delete($data)
	{
		$this->db->where('id_str', $data['id_str']);
		$this->db->delete('struktur', $data);
	}
}
/* End of file ModelNameStruktur_model.php */
