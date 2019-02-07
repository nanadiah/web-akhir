<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('admin/login','refresh');
		}
		$this->load->model('m_wisata','wisata');
	}

	public function index()
	{
		$data['tampil_wisata']=$this->wisata->tampil();
		$data['destinasi']=$this->wisata->data_destinasi();
		$data['konten']="v_wisata";
		$data['judul']="Daftar Destinasi";
		$this->load->view('template', $data);
	}

	public function toko()
	{
		$data['tampil_wisata']=$this->wisata->tampil();
		$data['destinasi']=$this->wisata->data_destinasi();
		$data['konten']="toko";
		$data['judul']="Fabulous Indonesia";
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_tempat', 'nama_tempat', 'trim|required');
		$this->form_validation->set_rules('id_des', 'id_des', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');

		if ($this->form_validation->run()==TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000';
			$config['max_width']  = '5000';
			$config['max_height']  = '5000';
			if ($_FILES['gambar']['name']!="") {
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('gambar')) 
				{
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}
				else 
				{
					if ($this->wisata->simpan_wisata($this->upload->data('file_name'))) 
					{
						$this->session->set_flashdata('pesan', 'Sukses menambah ');
					}
					else
					{
						$this->session->set_flashdata('pesan', 'Gagal menambah');
					}
					redirect('wisata','refresh');
				}
			}
			else
			{
				if ($this->wisata->simpan_wisata('')) 
				{
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}
				else
				{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
				redirect('wisata','refresh');
			}
			
		}
		else
		{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('wisata','refresh');
		}
	}

	public function edit_wisata($id)
	{
		$data=$this->wisata->detail($id);
		echo json_encode($data);
	}

	public function wisata_update()
	{
		if($this->input->post('edit')){
			if($_FILES['gambar']['name']==""){
				if($this->wisata->edit_wisata()){
					$this->session->set_flashdata('pesan', 'Sukses update');
					redirect('wisata');
				} 
				else 
				{
					$this->session->set_flashdata('pesan', 'Gagal update');
					redirect('wisata');
				}
			} 
			else 
			{
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '20000';
				$config['max_width']  = '5024';
				$config['max_height']  = '5768';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('pesan', 'Gagal Upload');
					redirect('wisata');
				}
				else
				{
					if($this->wisata->edit_wisata_dengan_foto($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'Sukses update');
						redirect('wisata');
					} 
					else 
					{
						$this->session->set_flashdata('pesan', 'Gagal update');
						redirect('wisata');
					}
				}
			}
			
		}

	}

	public function hapus($id_wisata='')
	{
		if ($this->wisata->hapus_wisata($id_wisata)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Destinasi Wisata');
			redirect('wisata','refresh');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Gagal Hapus Destinasi Wisata');
			redirect('wisata','refresh');
		}
	}

}

/* End of file Wisata.php */
/* Location: ./application/controllers/Wisata.php */