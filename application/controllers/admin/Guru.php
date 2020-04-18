<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('guru_model');
	}

	// menampilkan data/listing
	public function index()
	{
		$guru = $this->guru_model->listing();

		$data = array(
			'title'		 => 'Manajemen Guru Aktif Mengajar',
			'guru'   	 =>  $guru,
			'isi'  		 => 'admin/guru/list'
		);
		$this->load->view('admin/layout/wrapper', $data);
	}

	// tambah data
	public function tambah()
	{
		// Validasi
		$v = $this->form_validation;

		$v->set_rules(
			'nama_guru',
			'Nama Guru',
			'required|is_unique[guru.nama_guru]',
			array(
				'required'		=> 'nama guru harus diisi beserta gelarnya',
				'is_unique'		=> 'Nama Guru: <strong>' . $this->input->post('nama_guru') .
					'</strong> sudah ada. inputkan nama guru yang lain'
			)
		);

		$v->set_rules(
			'alamat',
			'Alamat Guru ',
			'required|is_unique[guru.alamat]',
			array(
				'required'		=> 'Alamat Guru Di isi Dengan Lengkap',
				'is_unique'		=> 'Alamat guru: <strong>' . $this->input->post('alamat') .
					'</strong> Alamat Kurang Lengkap'
			)
		);

		$v->set_rules(
			'pelajaran',
			'Mata pelajaran yang di ampuh ',
			'required',
			array('required'		=> 'Mata Pelajaran yang di ampuh Guru Harus di isi')
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
					'isi'		=> 'admin/guru/tambah'
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
					'nama_guru'				=> $i->post('nama_guru'),
					'alamat'				=> $i->post('alamat'),
					'pelajaran'				=> $i->post('pelajaran'),
					'gambar'				=> $upload_data['uploads']['file_name']
				);
				$this->guru_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Berita telah ditambah');
				redirect(base_url('admin/guru'));
			}
		}
		// End masuk database
		$data = array(
			'title'		=> 'Tambah Guru',
			'isi'		=> 'admin/guru/tambah'
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
	public function delete($id_guru)
	{
		$this->simple_login->cek_login();
		$data = array('id_guru'	=> $id_guru);
		$this->guru_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/guru'));
	}
}
/* End of file Guru.php */
