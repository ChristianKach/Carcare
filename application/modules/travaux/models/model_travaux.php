<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_travaux extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('travaux', $data);
            return $this->db->insert_id();
    }

    public function update($travaux_id, $data){
            $this->db->where('travaux_id', $travaux_id);
            $this->db->update('travaux', $data);
    }
    
    public function delete($travaux_id) {
        $this->db->where('travaux_id', $travaux_id);
        $this->db->delete('travaux');
    }

    public function getById($travaux_id) {
       $this->db->select()->from('travaux'); 
       $this->db->where('travaux_id', $travaux_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('travaux')->order_by('travaux_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getSameAll($vehicule_nom) {
       $this->db->distinct()->select()->from('travaux'); 
       $this->db->join('vehicule', 'travaux.vehicule_id = vehicule.vehicule_id');
       $this->db->where('vehicule.vehicule_nom', $vehicule_nom);
       $query=$this->db->get();
       return $query->result();
    }
    public function getAllByProgrammeId($programme_id) {
       $this->db->select()->from('adherant')->order_by('adherant_created_at', 'desc');
       $this->db->join('programme_adherant', 'programme_adherant.adherant_id = adherant.adherant_id');
       $this->db->where('programme_adherant.programme_id', $programme_id);
       $query = $this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('travaux_id', 'max_id');
       $result = $this->db->get('travaux')->result();  
       if($result)
        return $result[0]->max_id + 1;
       else
        return 1;
    }
   public function getAllByTravauxId($travaux_id) {
       $this->db->select()->from('travaux')->order_by('travaux_id', 'desc');
       $this->db->where('travaux_id', $travaux_id);
       $query = $this->db->get();
       return $query->result();
    }
    
}
?>