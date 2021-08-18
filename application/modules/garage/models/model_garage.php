<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_garage extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save($data){
            $this->db->insert('garage', $data);
            return $this->db->insert_id();
    }

    public function update($garage_id, $data){
            $this->db->where('garage_id', $garage_id);
            $this->db->update('garage', $data);
    }
    
    public function delete($garage_id) {
        $this->db->where('garage_id', $garage_id);
        $this->db->delete('garage');
    }

    public function getById($garage_id) {
       $this->db->select()->from('garage'); 
       $this->db->where('garage_id', $garage_id);
       $query=$this->db->get();
       return $query->result();
    }

    public function getAll() {
       $this->db->select()->from('garage')->order_by('garage_id', 'desc');
       $query=$this->db->get();
       return $query->result();
    }

    public function getNextPrimaryKey() {
       $this->db->select_max('garage_id', 'max_id');
       $result = $this->db->get('garage')->result();  
       if($result)
        return $result[0]->max_id + 1;
       else
        return 1;
    }
   /* public function getAllByBoisId($garage_id) {
       $this->db->select()->from('emb_arriere')->order_by('emb_arriere_id', 'desc');
       $this->db->where('garage_id', $garage_id);
       $query = $this->db->get();
       return $query->result();
    }*/
    

    

}

/* End of file model_programme.php */
/* Location: ./application/modules/home/models/model_programme.php */ ?>