<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

	public function index()
	{
		$data  = array(
			'title'		=> 'Halaman Kontak',
			'isi'		=> 'kontak/list'
		);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kontak_model');
	}

	// Main page kontak
	public function simpan_kontak()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'gmail' => $this->input->post('gmail'),
			'pesan' => $this->input->post('pesan'),
		);
		$simpan = $this->db->insert('kontak', $data);
		if ($simpan) {
		?>
			<script type="text/javascript">
				alert('Terima Kasih telah menghubungi kami !');
				window.location = '<?php echo base_url('kontak'); ?>'
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				alert('Ada kesalahan, silahkan ulangi !');
				window.location = '<?php echo base_url('kontak'); ?>'
			</script>
		<?php
		}
	}
}

/* End of file Kontak.php */
