<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicule extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('vehicule/model_vehicule');
    }

    public function index() {
        $data['title'] = 'Vehicule';
        $data["js"] = array(
            base_url().'assets/js/vehicule.js'
        );

        $data['vehicules'] = $this->model_vehicule->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_vehicule', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('vehicule_nom', 'Nom', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('vehicule_marque', 'Marque', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('vehicule_modele', 'Modele', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('vehicule_annee', 'Année', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['vehicule_nom'] = $this->input->post('vehicule_nom');
           $data['vehicule_marque'] = $this->input->post('vehicule_marque');
           $data['vehicule_modele'] = $this->input->post('vehicule_modele');
           $data['vehicule_annee'] = $this->input->post('vehicule_annee');

           $vehicule_id = $this->model_vehicule->save($data);

           $this->session->set_flashdata('add', 'Vehicule enregistré!'); 

           redirect('vehicule');

        }

        $data['vehicules'] = $this->model_vehicule->getAll();

        $data['title'] = 'vehicules';
        $data["js"] = array(
            base_url().'assets/js/vehicule.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_vehicule', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$vehicule_id = (int) $this->uri->segment(3)) {
            redirect('vehicule');
        }

        if(isset($_POST['vehicule_id'])) {
            $this->form_validation->set_rules('vehicule_nom', 'Nom', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('vehicule_marque', 'Marque', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('vehicule_modele', 'Modele', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('vehicule_annee', 'Année', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['vehicule_id']          = $this->input->post('vehicule_id');
               $data['vehicule_nom'] = $this->input->post('vehicule_nom');
               $data['vehicule_marque'] = $this->input->post('vehicule_marque');
               $data['vehicule_modele'] = $this->input->post('vehicule_modele');
               $data['vehicule_annee'] = $this->input->post('vehicule_annee');

               $this->model_vehicule->update($this->input->post('vehicule_id'), $data);

               $this->session->set_flashdata('update', 'Vehicule mise à jour!'); 

               redirect('vehicule');

                }
            }    


            $vehicule = $this->model_vehicule->getById($vehicule_id);
            if(empty($vehicule)) {
                redirect('vehicule');
            }
            $vehicule = $vehicule[0];
            $data['vehicule'] = $vehicule;
            $data['vehicules'] = $this->model_vehicule->getAll();

            $data['title'] = 'vehicule';
            $data["js"] = array(
                base_url().'assets/js/vehicule.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_vehicule', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$vehicule_id= (int) $this->uri->segment(3)) {
            redirect('vehicule');
        }
        
        try {
            $this->model_vehicule->delete($vehicule_id);
            $this->session->set_flashdata('delete', 'Vehicule supprimé!');
        } catch(Exception $e) {
            redirect('vehicule');
        }

        redirect('vehicule'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('vehicule');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_vehicule->delete($i);
      }
      $this->session->set_flashdata('delete', 'Vehicule(s) supprimé(s)');
      redirect('vehicule');
    }
  
}
?>