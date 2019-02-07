<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Destinasi extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_destinasi','des');
	}
	public function index()
	{
		$data['tampil_destinasi']=$this->des->menampilkan();
		$data['konten']="v_destinasi";
		$data['judul']= "Laman Destinasi";
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		if ($this->input->post('simpan')) 
		{
			if ($this->des->simpan_des()) 
			{
				$this->session->set_flashdata('pesan','Sukses Menambah Destinasi');
				redirect('destinasi','refresh');
			}
			else
			{
				$this->session->set_flashdata('pesan', 'Gagal Menambah Destinasi');
				redirect('destinasi','refresh');
			}
		}
	}

	public function hapus($id_des)
	{
		if ($this->des->hapus($id_des)) {
			$this->session->set_flashdata('pesan', 'Sukses Menghapus');
			redirect('destinasi','refresh');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Gagal Menghapus');
			redirect('destinasi','refresh');
		}
	}
	
	public function edit_destinasi($id)
	{
		$data=$this->des->detail($id);
		echo json_encode($data);
	}
	public function destinasi_update()
	{
		if ($this->input->post('edit')) {
			if ($this->des->edit_des()) 
			{
				$this->session->set_flashdata('pesan', 'Sukses Update Destinasi');
				redirect('destinasi','refresh');
			}
		} 
		else 
		{
			$this->session->set_flashdata('pesan', 'Gagal Update Destinasi');
			redirect('destinasi','refresh');
		}
		
	}
}

/* End of file Destinasi.php */
?>