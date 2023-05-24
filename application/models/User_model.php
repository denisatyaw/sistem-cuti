<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get($username){ 
        $this->db->join('db_user','db_pegawai.id_user=db_user.id_user');       
        $this->db->where(" username = '$username'"); // Untuk menambahkan Where Clause : username='$username'        
        // nip = '$username' or
        $result = $this->db->get('db_pegawai')->row(); // Untuk mengeksekusi dan mengambil data hasil query        
        
        return $result;   }
    
    }