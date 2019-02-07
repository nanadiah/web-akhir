<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wisata extends CI_Model {
    public function tampil()
    {
        $tm_wisata=$this->db
                      ->join('destinasi','destinasi.id_des=wisata.id_des')
                      ->get('wisata')
                      ->result();
        return $tm_wisata;
    }
    public function data_destinasi()
    {
        return $this->db->get('destinasi')
                        ->result();
    }
    public function simpan_wisata($gambar)
    {
        if ($gambar=="") {
             $object = array(
                'id_wisata' => $this->input->post('id_wisata'), 
                'nama_tempat' => $this->input->post('nama_tempat'),
                'id_des' => $this->input->post('id_des'), 
                'harga' => $this->input->post('harga')
             );
        }
        else
        {
            $object = array(
                'id_wisata' => $this->input->post('id_wisata'), 
                'nama_tempat' => $this->input->post('nama_tempat'),
                'id_des' => $this->input->post('id_des'), 
                'harga' => $this->input->post('harga'),
                'gambar' => $gambar
             );
        }
        return $this->db->insert('wisata', $object);
    }

    public function detail($a)
    {
        $tm_wisata=$this->db
                      ->join('destinasi', 'destinasi.id_des=wisata.id_des')
                      ->where('id_wisata', $a)
                      ->get('wisata')
                      ->row();
        return $tm_wisata;
    }

    public function edit_wisata()
    {
        $data = array(
            'id_wisata' => $this->input->post('id_wisata'), 
            'nama_tempat' => $this->input->post('nama_tempat'),
            'id_des' => $this->input->post('id_des'), 
            'harga' => $this->input->post('harga')
            );
        return $this->db->where('id_wisata', $this->input->post('id_wisata_lama'))
                        ->update('wisata', $data);
    }
    public function edit_wisata_dengan_foto($gambar)
    {
        $data = array(
            'id_wisata' => $this->input->post('id_wisata'), 
            'nama_tempat' => $this->input->post('nama_tempat'),
            'id_des' => $this->input->post('id_des'), 
            'harga' => $this->input->post('harga'),
            'gambar' => $file_cover
            );
        return $this->db->where('id_wisata', $this->input->post('id_wisata_lama'))
                        ->update('wisata', $data);
    }
    public function hapus_wisata($id_wisata='')
    {
        return $this->db->where('id_wisata', $id_wisata)
                    ->delete('wisata');
    }
    

}

/* End of file M_wisata.php */
/* Location: ./application/models/M_wisata.php */