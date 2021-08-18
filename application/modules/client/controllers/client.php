<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client/model_client');
    }

    public function index() {
        $data['title'] = 'Client';
        $data["js"] = array(
            base_url().'assets/js/client.js'
        );

        $this->load->view('view_client', $data);
    }

    public function profile() {
        $data['title'] = 'Client';
        $data["js"] = array(
            base_url().'assets/js/client.js'
        );

        $data['client'] = $this->model_client->getAll();
        
        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_profile', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('client_nom', 'Nom ', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_prenom', 'Prenom ', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_email', 'Email ', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_adresse', 'Aderesse ', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_username', 'Login', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_password', 'Mot de passe','trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_confirm_password', 'Confirmation Mot de passe','trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_reponse1', 'Reponse 1', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_reponse2', 'Reponse 2', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('client_reponse3', 'Reponse 3', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['client_nom'] = $this->input->post('client_nom');
           $data['client_prenom'] = $this->input->post('client_prenom');
           $data['client_email'] = $this->input->post('client_email');
           $data['client_adresse'] = $this->input->post('client_adresse');
           $data['client_username'] = $this->input->post('client_username');
           $data['client_password'] = $this->input->post('client_password');
           $data['client_confirm_password'] = $this->input->post('client_confirm_password');
           $data['client_reponse1'] = $this->input->post('client_reponse1');
           $data['client_reponse2'] = $this->input->post('client_reponse2');
           $data['client_reponse3'] = $this->input->post('client_reponse3');

           $client_id = $this->model_client->save($data);

           $this->session->set_flashdata('add', 'Client bien inscrit!'); 

           redirect('user');

        }
        $data["js"] = array(
            base_url().'assets/js/client.js'
        );

        //$data['inscriptions'] = $this->model_service->getAll();

        $data['title'] = 'clients';
        $this->load->view('view_client', $data);
    }
  
}
?>