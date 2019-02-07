<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin extends CI_Model {
    public function masuk(){
        $username=$this->input->post('username');
        $fullname=$this->input->post('fullname');
        $password=$this->input->post('password');
        $level=$this->input->post('level');
        $datasimpan=array(
        'fullname'=>$fullname,
        'username'=>$username,
        'password'=>$password,
        'level'=>$level
        );
        $this->db->insert('admin',$datasimpan);
        if($this->db->affected_rows()>0){
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    public function get_login(){
        return $this->db->where('username',$this->input->post('username'))
            ->where('password',$this->input->post('password'))
            ->get('admin');
    }
}
?>