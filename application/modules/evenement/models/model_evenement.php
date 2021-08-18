<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_evenement extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('evenement', $data);
            return $this->db->insert_id();
    }

    public function update($evenement_id, $data){
            $this->db->where('evenement_id', $evenement_id);
            $this->db->update('evenement', $data);
    }
    
    public function delete($evenement_id) {
        $this->db->where('evenement_id', $evenement_id);
        $this->db->delete('evenement');
    }

    public function getById($evenement_id) {
       $this->db->select()->from('evenement'); 
       $this->db->where('evenement_id', $evenement_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('evenement')->order_by('evenement_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getByDate($evenement_date) {
       $this->db->select()->from('evenement'); 
       $this->db->where('evenement_date', $evenement_date);
       $query=$this->db->get();
       return $query->result();
    }

    public function getByHour($evenement_heure) {
       $this->db->select()->from('evenement'); 
       $this->db->where('evenement_heure', $evenement_heure);
       $query=$this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('evenement_id', 'max_id');
       $result = $this->db->get('evenement')->result();  
       if($result)
        return $result[0]->max_id + 1;
       else
        return 1;
    }
    
    public function getAllByEvenementId($evenement_id) {
       $this->db->select()->from('evenement')->order_by('evenement_id', 'desc');
       $this->db->where('evenement_id', $evenement_id);
       $query = $this->db->get();
       return $query->result();
    }
}?>