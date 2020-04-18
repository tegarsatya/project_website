<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends CI_Controller {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->model('struktur_model');
	}

	// menampilkan data/listing
	public function index()
	{
		$struktur = $this->struktur_model->listing();
		
		$data = array( 	'title'		 => 'Manajemen Struktur Oraganisasi',
						'struktur'   =>  $struktur,
						'isi'  		 => 'admin/struktur/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// tambah data
	public function tambah()
	{
		// Validasi
		$v = $this->form_validation;

		$v->set_rules(
			'judul',
			'Judul Struktur',
			'required|is_unique[struktur.judul]',
			array(
				'required'		=> 'Judul Struktur harus diisi',
				'is_unique'		=> 'Judul Strktur: <strong>' . $this->input->post('judul') .
					'</strong> sudah ada. Buat Judul yang berbeda'
			)
		);

		$v->set_rules(
			'isi',
			'Keterangan berita',
			'required',
			array('required'		=> 'Isi Struktur harus diisi')
		);

		if ($v->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				// End validasi

				$data = array(
					'title'		=> 'Tambah Guru',
					'error'		=> $this->upload->display_errors(),
					'isi'		=> 'admin/struktur/tambah'
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
					'judul'					=> $i->post('judul'),
					'isi'					=> $i->post('isi'),
					'gambar'				=> $upload_data['uploads']['file_name']
				);
				$this->struktur_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Berita telah ditambah');
				redirect(base_url('admin/struktur'));
			}
		}
		// End masuk database
		$data = array(
			'title'		=> 'Tambah Struktur',
			'isi'		=> 'admin/struktur/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Edit Data

	public function edit($id_str)
	{
		$struktur	= $this->struktur_model->detail($id_str);

		// Validasi
		$v = $this->form_validation;

		$v->set_rules(
			'judul',
			'Judul Struktur',
			'required',
			array('required'		=> 'Judul Struktur Organisasi harus diisi')
		);

		$v->set_rules(
			'isi',
			'isi Struktur Organisasi',
			'required',
			array('required'		=> 'Isi Struktur Organisasi harus diisi')
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
						'title'		=> 'Edit Struktur Organisasi',
						'struktur'	=> $struktur,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/struktur/edit'
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
						'id_str'				=> $id_str,
						'judul'					=> $i->post('judul'),
						'isi'					=> $i->post('isi'),
						'gambar'				=> $upload_data['uploads']['file_name']
					);
					$this->struktur_model->edit($data);
					$this->session->set_flashdata('sukses', 'Struktur Organisasi telah diedit');
					redirect(base_url('admin/struktur'));
				}
			} else {
				// Proses ke database
				$i = $this->input;
				$data = array(
					'id_str'				=> $id_str,
					'judul'					=> $i->post('judul'),
					'isi'					=> $i->post('isi'),
					'gambar'				=> $upload_data['uploads']['file_name']
				);
				$this->struktur_model->edit($data);
				$this->session->set_flashdata('sukses', 'Struktur Organisasi telah diedit');
				redirect(base_url('admin/struktur'));
			}
		}
		// End masuk database
		$data = array(
			'title'		=> 'Edit Struktur Organisasi',
			'struktur'	=> $struktur,
			'isi'		=> 'admin/struktur/edit'
		);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// Delete
	public function delete($id_str)
	{
		$this->simple_login->cek_login();
		$data = array('id_str'	=> $id_str);
		$this->struktur_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah didelete');
		redirect(base_url('admin/struktur'));
	}

}

/* End of file ControllernameStruktur.php */
