<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evenement extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('evenement/model_evenement');
        $this->load->model('garage/model_garage');
        $this->load->model('vehicule/model_vehicule');
    }

    public function index() {
        $data['title'] = 'Evenement';
        $data["js"] = array(
            base_url().'assets/js/evenement.js'
        );

        $data['evenements'] = $this->model_evenement->getAll();
        $data['garages'] = $this->model_garage->getAll();
        $data['vehicules'] = $this->model_vehicule->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_evenement', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function view() {
        
        if(!$evenement_id = (int) $this->uri->segment(3)) {
            redirect('evenement');
        }

        $evenements = $this->model_evenement->getById($evenement_id);
        if(empty($evenements)) {
            redirect('evenement');
        }

        $evenements = $evenements[0];
        $data['evenements'] = $evenements;
        $data['total'] = 0;

        $data['evenement'] = $this->model_evenement->getById($evenement_id);
        $data['garage'] = $this->model_garage->getAll();
        $data['vehicule'] = $this->model_vehicule->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_event', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('evenement_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('vehicule_id', 'Vehicule', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('garage_id', 'Garage', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('evenement_date', 'Date', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('evenement_heure', 'Heure', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['evenement_libelle'] = $this->input->post('evenement_libelle');
           $data['vehicule_id'] = $this->input->post('vehicule_id');
           $data['garage_id'] = $this->input->post('garage_id');
           $data['evenement_date'] = $this->input->post('evenement_date');
           $data['evenement_heure'] = $this->input->post('evenement_heure');

           $evenement_id = $this->model_evenement->save($data);

           $this->session->set_flashdata('add', 'Evenement enregistré!'); 

           redirect('evenement');

        }

        $data['evenements'] = $this->model_evenement->getAll();
        $data['vehicules'] = $this->model_vehicule->getAll();
        $data['garages'] = $this->model_garage->getAll();

        $data['title'] = 'Evenement';
        $data["js"] = array(
            base_url().'assets/js/evenement.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_evenement', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$evenement_id = (int) $this->uri->segment(3)) {
            redirect('evenement');
        }

        if(isset($_POST['evenement_id'])) {
            $this->form_validation->set_rules('evenement_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('vehicule_id', 'Vehicule', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('garage_id', 'Garage', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('evenement_date', 'Date', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('evenement_heure', 'Heure', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['evenement_id'] = $this->input->post('evenement_id');
               $data['evenement_libelle'] = $this->input->post('evenement_libelle');
               $data['vehicule_id'] = $this->input->post('vehicule_id');
               $data['garage_id'] = $this->input->post('garage_id');
               $data['evenement_date'] = $this->input->post('evenement_date');
               $data['evenement_heure'] = $this->input->post('evenement_heure');

               $evenement_id = $this->model_evenement->update($this->input->post('evenement_id'), $data);

               $this->session->set_flashdata('update', 'Evenement mise à jour!'); 

               redirect('evenement');

                }
            }    


            $evenement = $this->model_evenement->getById($evenement_id);
            if(empty($evenement)) {
                redirect('evenement');
            }
            $evenement = $evenement[0];
            $data['evenement'] = $evenement;
            $data['evenements'] = $this->model_evenement->getAll();
            $data['vehicules'] = $this->model_vehicule->getAll();
            $data['garages'] = $this->model_garage->getAll();

            $data['title'] = 'evenement';
            $data["js"] = array(
                base_url().'assets/js/evenement.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_evenement', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$evenement_id= (int) $this->uri->segment(3)) {
            redirect('evenement');
        }
        
        try {
            $this->model_evenement->delete($evenement_id);
            $this->session->set_flashdata('delete', 'Evenement supprimés!');
        } catch(Exception $e) {
            redirect('evenement');
        }

        redirect('evenement'); 
    }
}
?>