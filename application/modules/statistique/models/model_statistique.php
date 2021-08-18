<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_statistique extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('statistique', $data);
            return $this->db->insert_id();
    }

    public function update($statistique_id, $data){
            $this->db->where('statistique_id', $statistique_id);
            $this->db->update('statistique', $data);
    }
    
    public function delete($statistique_id) {
        $this->db->where('statistique_id', $statistique_id);
        $this->db->delete('statistique');
    }

    public function getById($evenement_id) {
       $this->db->select()->from('evenement');
       $this->db->where('evenement_id', $evenement_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('statistique')->order_by('statistique_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    

    

}

?>