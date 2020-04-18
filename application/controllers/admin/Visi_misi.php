<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visi_misi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('visi_misi_model');
	}

	// menampilkan data/listing
	public function index()
	{
		$visi_misi = $this->visi_misi_model->listing();

		$data = array(
			'title'		 => 'Manajemen Visi Misi',
			'visi_misi'  =>  $visi_misi,
			'isi'  		 => 'admin/visi_misi/list'
		);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// tambah data
	public function tambah()
	{
		// Validasi
		$v = $this->form_validation;

		$v->set_rules(
			'isi',
			'Isi Visi& Misi Harus Di isi',
			'required|is_unique[visi_misi.isi]',
			array(
				'required'		=> 'Isi Visi & Misi Dengan Benar',
				'is_unique'		=> 'Isi Visi & Misi: <strong>' . $this->input->post('isi') .
					'</strong>'
			)
		);

		if ($v->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				// End validasi

				$data = array(
					'title'		=> 'Tambah Visi & Misi',
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'admin/visi_misi/tambah'
				);
				$this->load->view('admin/layout/wrapper', $data);
				// Masuk database
			} else {
				$upload_data				= array('uploads' => $this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				// Proses ke database
				$i = $this->input;
				$data = array(
					'isi'					=> $i->post('isi'),
					'gambar'				=> $upload_data['uploads']['file_name']
				);
				$this->visi_misi_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Visi  Misi Berhasil dtambahkan');
				redirect(base_url('admin/visi_misi'));
			}
		}
		// End masuk database
		$data = array(
			'title'		=> 'Tambah Visi & Misi',
			'isi'		=> 'admin/visi_misi/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Edit Data

	public function edit($id_vm)
	{
		$visi_misi	= $this->visi_misi_model->detail($id_vm);

		// Validasi
		$v = $this->form_validation;

		$v->set_rules(
			'isi',
			'isi Dari Visi & Misi',
			'required',
			array('required'		=> 'Isi Visi & Misi harus diisi')
		);

		if ($v->run()) {
			if (!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/upload/image/';
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']			= '12000'; // KB	
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// End validasi

					$data = array(
						'title'		=> 'Edit Visi & Misi',
						'visi_misi'	=> $visi_misi,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/visi_misi/edit'
					);
					$this->load->view('admin/layout/wrapper', $data);
					// Masuk database
				} else {
					$upload_data				= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
					$config['new_image'] 		= './assets/upload/image/thumbs/';
					$config['create_thumb'] 	= TRUE;
					$config['quality'] 			= "100%";
					$config['maintain_ratio'] 	= TRUE;
					$config['width'] 			= 360; // Pixel
					$config['height'] 			= 200; // Pixel
					$config['x_axis'] 			= 0;
					$config['y_axis'] 			= 0;
					$config['thumb_marker'] 	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					// Proses ke database
					$i = $this->input;
					$data = array(
						'id_vm'					=> $id_vm,
						'isi'					=> $i->post('isi'),
						'gambar'				=> $upload_data['uploads']['file_name']
					);
					$this->visi_misi_model->edit($data);
					$this->session->set_flashdata('sukses', 'Visi & Misi telah diedit');
					redirect(base_url('admin/visi_misi'));
				}
			} else {
				// Proses ke database
				$i = $this->input;
				$data = array(
					'id_vm'					=> $id_vm,
					'isi'					=> $i->post('isi'),
					'gambar'				=> $upload_data['uploads']['file_name']
				);
				$this->visi_misi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Visi & Misi telah diedit');
				redirect(base_url('admin/visi_misi'));
			}
		}
		// End masuk database
		$data = array(
			'title'		=> 'Edit Visi & Misi',
			'visi_misi'	=> $visi_misi,
			'isi'		=> 'admin/visi_misi/edit'
		);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Delete
	public function delete($id_vm)
	{
		$this->simple_login->cek_login();
		$data = array('id_vm'	=> $id_vm);
		$this->visi_misi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah didelete');
		redirect(base_url('admin/visi_misi'));
	}

}

/* End of file Controllername.php */
