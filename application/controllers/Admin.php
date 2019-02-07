<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $data['konten']="login";
        $data['judul']="Login Fabulous Indonesia";
        $this->load->view('login',$data);
    }
    
    public function register(){
       $data['konten']="login";
        $data['judul']="Login Fabulous Indonesia";
        $this->load->view('register',$data);
    }
    public function simpan(){
        if($this->input->post('daftar')){
            $this->form_validation->set_rules('username','Username', 'trim|required');
            $this->form_validation->set_rules('fullname','Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            $this->form_validation->set_rules('level','Level', 'trim|required');
            
            if($this->form_validation->run() ==TRUE)
            {
                $this->load->model('m_admin');
                if($this->m_admin->masuk()==TRUE){
                    $this->session->set_flashdata('pesan','Sukses Mendaftarkan Diri');
                    redirect('admin','refresh');
                }
                else
                {
                    $this->session->set_flashdata('pesan','Gagal Mendaftarkan Diri');
                    redirect('admin/register','refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('pesan',validation_errors());
                 redirect('admin/register','refresh');
            }
            
        }
    }
    public function proses_login(){
        if($this->input->post('login')){
            $this->form_validation->set_rules('username','Username', 'trim|required');
            $this->form_validation->set_rules('password','Password', 'trim|required');
            if($this->form_validation->run() ==TRUE){
                 $this->load->model('m_admin');
                if($this->m_admin->get_login()->num_rows()>0){
                    $data=$this->m_admin->get_login()->row();
                    $array=array(
                        'login'=> TRUE,
                        'fullname'=>$data->fullname,
                        'username'=>$data->username,
                        'password'=>$data->password,
                        'level'=>$data->level,
                        'id_admin'=>$data->id_admin,
                    );
                    $this->session->set_userdata($array);
                    redirect('wisata','refresh');
                }else{
                    $this->session->set_flashdata('pesan','Username atau Password salah');
                    redirect('wisata','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan',validation_errors());
                 redirect('admin','refresh');
            }
    }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin','refresh');
    }
}
?>