<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_service extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('service', $data);
            return $this->db->insert_id();
    }

    public function update($service_id, $data){
            $this->db->where('service_id', $service_id);
            $this->db->update('service', $data);
    }
    
    public function delete($service_id) {
        $this->db->where('service_id', $service_id);
        $this->db->delete('service');
    }

    public function getById($service_id) {
       $this->db->select()->from('service'); 
       $this->db->where('service_id', $service_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('service')->order_by('service_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('service_id', 'max_id');
       $result = $this->db->get('service')->result();  
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