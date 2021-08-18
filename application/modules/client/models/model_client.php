<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_client extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('client', $data);
            return $this->db->insert_id();
    }

    public function update($client_id, $data){
            $this->db->where('client_id', $client_id);
            $this->db->update('client', $data);
    }

    public function getById($client_id) {
       $this->db->select()->from('client');
       $this->db->where('client_id', $client_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('client')->order_by('client_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

}


 ?>