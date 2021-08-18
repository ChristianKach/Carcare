<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends MY_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model('accueil/model_accueil');
    }

    public function index() {
        $data['title'] = 'accueil';
        $data["js"] = array(
            base_url().'assets/js/accueil.js'
        );

        $this->load->view('view_accueil', $data);
    }

  
}
?>