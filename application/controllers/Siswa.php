
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
	}

	public function index()
	{
		$data['title'] = 'Halaman Siswa';
		$data['siswa'] = $this->siswa_model->get_data('tbl_siswa')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('siswa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Siswa';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('tambah_siswa');
		$this->load->view('templates/footer');
	}

	
	public function tambah_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() ==  FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama_siswa' => $this->input->post('nama_siswa'),
				'kelas_siswa' => $this->input->post('kelas_siswa'),
				'alamat_siswa' => $this->input->post('alamat_siswa'),
				'telp' => $this->input->post('telp'),

			);
				$this->siswa_model->insert_data($data, 'tbl_siswa');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	 			Data Berhasil Ditambahkan ! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			 <span aria-hidden="true">&times;</span>
	  			</button></div>');
	  			redirect('siswa');
		}
	}

	public function edit($id_siswa)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_siswa'=> $id_siswa,
				'nama_siswa' => $this->input->post('nama_siswa'),
				'kelas_siswa' => $this->input->post('kelas_siswa'),
				'alamat_siswa' => $this->input->post('alamat_siswa'),
				'telp' => $this->input->post('telp'),

			);
			$this->siswa_model->update_data($data,'tbl_siswa');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
	 			Data Berhasil Diubah ! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			 <span aria-hidden="true">&times;</span>
	  			</button></div>');
	  			redirect('siswa');
		}
	}


public function print()
{
	$data['siswa']= $this->siswa_model->get_data('tbl_siswa')->result();
	$this->load->view('print_siswa', $data);
}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama siswa', 'required', array(
		'required' => '%s harus diisi !!'));
		$this->form_validation->set_rules('kelas_siswa', 'Kelas siswa', 'required', array(
		'required' => '%s harus diisi !!'));
		$this->form_validation->set_rules('alamat_siswa', 'Alamat siswa', 'required', array(
		'required' => '%s harus diisi !!'));
		$this->form_validation->set_rules('telp', 'Nomor Hp', 'required', array(
		'required' => '%s harus diisi !!'));
	}


	public function delete($id)
	{
				$where = array('id_siswa' =>$id);

				$this->siswa_model->delete($where,'tbl_siswa');
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	 			Data Berhasil Dihapus ! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			 <span aria-hidden="true">&times;</span>
	  			</button></div>');
	  			redirect('siswa');
	}

	
}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */