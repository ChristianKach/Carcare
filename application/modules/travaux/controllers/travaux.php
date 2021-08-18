<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Travaux extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('travaux/model_travaux');
        $this->load->model('garage/model_garage');
        $this->load->model('service/model_service');
        $this->load->model('vehicule/model_vehicule');
    }

    public function index() {
        $data['title'] = 'Travaux';
        $data["js"] = array(
            base_url().'assets/js/travaux.js'
        );

        $data['travauxs'] = $this->model_travaux->getAll();
        $data['garages'] = $this->model_garage->getAll();
        $data['services'] = $this->model_service->getAll();
        $data['vehicules'] = $this->model_vehicule->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_travaux', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('travaux_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('vehicule_id', 'Vehicule', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('garage_id', 'Garage', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('service_id', 'Service', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('travaux_date', 'Date', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('travaux_info', 'Infos', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('travaux_cout', 'Coût', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['travaux_libelle'] = $this->input->post('travaux_libelle');
           $data['vehicule_id'] = $this->input->post('vehicule_id');
           $data['garage_id'] = $this->input->post('garage_id');
           $data['service_id'] = $this->input->post('service_id');
           $data['travaux_date'] = $this->input->post('travaux_date');
           $data['travaux_info'] = $this->input->post('travaux_info');
           $data['travaux_cout'] = $this->input->post('travaux_cout');

           $travaux_id = $this->model_travaux->save($data);

           $this->session->set_flashdata('add', 'Travaux enregistré!'); 

           redirect('travaux');

        }

        $data['travauxs'] = $this->model_travaux->getAll();
        $data['vehicules'] = $this->model_vehicule->getAll();
        $data['garages'] = $this->model_garage->getAll();
        $data['services'] = $this->model_service->getAll();

        $data['title'] = 'Travaux';
        $data["js"] = array(
            base_url().'assets/js/travaux.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_travaux', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$travaux_id = (int) $this->uri->segment(3)) {
            redirect('travaux');
        }

        if(isset($_POST['travaux_id'])) {
            $this->form_validation->set_rules('travaux_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('vehicule_id', 'Vehicule', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('garage_id', 'Garage', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('service_id', 'Service', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('travaux_date', 'Date', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('travaux_info', 'Infos', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('travaux_cout', 'Infos', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['travaux_id']          = $this->input->post('travaux_id');
               $data['travaux_libelle'] = $this->input->post('travaux_libelle');
               $data['vehicule_id'] = $this->input->post('vehicule_id');
               $data['garage_id'] = $this->input->post('garage_id');
               $data['service_id'] = $this->input->post('service_id');
               $data['travaux_date'] = $this->input->post('travaux_date');
               $data['travaux_info'] = $this->input->post('travaux_info');
               $data['travaux_cout'] = $this->input->post('travaux_cout');

               $travaux_id =$this->model_travaux->update($this->input->post('travaux_id'), $data);

               $this->session->set_flashdata('update', 'Travaux mise à jour!'); 

               redirect('travaux');

                }
            }    


            $travaux = $this->model_travaux->getById($travaux_id);
            if(empty($travaux)) {
                redirect('travaux');
            }

            $travaux = $travaux[0];
            $data['travaux'] = $travaux;
            $data['travauxs'] = $this->model_travaux->getAll();
            $data['vehicules'] = $this->model_vehicule->getAll();
            $data['garages'] = $this->model_garage->getAll();
            $data['services'] = $this->model_service->getAll();

            $data['title'] = 'travaux';
            $data["js"] = array(
                base_url().'assets/js/travaux.js'
            );


            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_travaux', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$travaux_id= (int) $this->uri->segment(3)) {
            redirect('travaux');
        }
        
        try {
            $this->model_travaux->delete($travaux_id);
            $this->session->set_flashdata('delete', 'Travaux supprimés!');
        } catch(Exception $e) {
            redirect('travaux');
        }

        redirect('travaux'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('travaux');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_travaux->delete($i);
      }
      $this->session->set_flashdata('delete', 'Travaux supprimé(s)');
      redirect('travaux');
    }
}
?>