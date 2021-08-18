<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_employe extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('employe', $data);
            return $this->db->insert_id();
    }

    public function update($employe_id, $data){
            $this->db->where('employe_id', $employe_id);
            $this->db->update('employe', $data);
    }
    
    public function delete($employe_id) {
        $this->db->where('employe_id', $employe_id);
        $this->db->delete('employe');
    }

    public function getById($employe_id) {
       $this->db->select()->from('employe'); 
       $this->db->where('employe_id', $employe_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('employe')->order_by('employe_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('employe_id', 'max_id');
       $result = $this->db->get('employe')->result();  
       if($result)
        return $result[0]->max_id + 1;
       else
        return 1;
    }
   /* public function getAllByBoisId($service_id) {
       $this->db->select()->from('emb_arriere')->order_by('emb_arriere_id', 'desc');
       $this->db->where('service_id', $service_id);
       $query = $this->db->get();
       return $query->result();
    }*/
    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>