<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class m_destinasi extends CI_Model
{

	public function menampilkan()
		{
			$tampil= $this->db->get('destinasi')->result();
			return $tampil;
		}	
		public function simpan_des()
		{
			$object=array(
				'id_des'=>$this->input->post('id_des'),
				'destinasi'=>$this->input->post('destinasi'),
				);
			return $this->db->insert('destinasi', $object);
		}

	public function hapus($id_des)
	{
		return $this->db->where('id_des',$id_des)->delete('destinasi');
	}
	
	public function detail($a)
	{
		return $this->db->where('id_des', $a)->get('destinasi')->row();
	}
	public function edit_des()
	{
		$object=array(
			'id_des'=>$this->input->post('id_des'),
			'destinasi'=>$this->input->post('destinasi')
		);
		return $this->db->where('id_des',$this->input->post('id_des_lama'))->update('destinasi',$object);
	}
}

/* End of file m_destinasi.php */
?>