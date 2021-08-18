<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_vehicule extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('vehicule', $data);
            return $this->db->insert_id();
    }

    public function update($vehicule_id, $data){
            $this->db->where('vehicule_id', $vehicule_id);
            $this->db->update('vehicule', $data);
    }
    
    public function delete($vehicule_id) {
        $this->db->where('vehicule_id', $vehicule_id);
        $this->db->delete('vehicule');
    }

    public function getById($vehicule_id) {
       $this->db->select()->from('vehicule'); 
       $this->db->where('vehicule_id', $vehicule_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('vehicule')->order_by('vehicule_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getSameAll() {
       $this->db->distinct()->select('vehicule_nom')->from('vehicule'); 
       $query=$this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('vehicule_id', 'max_id');
       $result = $this->db->get('vehicule')->result();  
       if($result)
        return $result[0]->max_id + 1;
       else
        return 1;
    }
    
}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>