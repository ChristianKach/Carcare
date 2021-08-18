<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Garage extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('garage/model_garage');
    }

    public function index() {
        $data['title'] = 'Garage';
        $data["js"] = array(
            base_url().'assets/js/garage.js'
        );

        $data['garages'] = $this->model_garage->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_garage', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('garage_nom', 'Nom', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('garage_contact', 'Contact', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('garage_adresse', 'Adresse', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['garage_nom'] = $this->input->post('garage_nom');
           $data['garage_contact'] = $this->input->post('garage_contact');
           $data['garage_adresse'] = $this->input->post('garage_adresse');

           $garage_id = $this->model_garage->save($data);

           $this->session->set_flashdata('add', 'Garage enregistré!'); 

           redirect('garage');

        }

        $data['garages'] = $this->model_garage->getAll();

        $data['title'] = 'garages';
        $data["js"] = array(
            base_url().'assets/js/garage.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_garage', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$garage_id = (int) $this->uri->segment(3)) {
            redirect('garage');
        }

        if(isset($_POST['garage_id'])) {
            $this->form_validation->set_rules('garage_nom', 'Nom', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('garage_contact', 'Contact', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('garage_adresse', 'Adresse', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['garage_id']          = $this->input->post('garage_id');
               $data['garage_nom'] = $this->input->post('garage_nom');
               $data['garage_contact'] = $this->input->post('garage_contact');
               $data['garage_adresse'] = $this->input->post('garage_adresse');

               $this->model_garage->update($this->input->post('garage_id'), $data);

               $this->session->set_flashdata('update', 'Garage mise à jour!'); 

               redirect('garage');

                }
            }    


            $garage = $this->model_garage->getById($garage_id);
            if(empty($garage)) {
                redirect('garage');
            }
            $garage = $garage[0];
            $data['garage'] = $garage;
            $data['garages'] = $this->model_garage->getAll();

            $data['title'] = 'garage';
            $data["js"] = array(
                base_url().'assets/js/garage.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_garage', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$garage_id= (int) $this->uri->segment(3)) {
            redirect('garage');
        }
        
        try {
            $this->model_garage->delete($garage_id);
            $this->session->set_flashdata('delete', 'Garage supprimé!');
        } catch(Exception $e) {
            redirect('garage');
        }

        redirect('garage'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('garage');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_garage->delete($i);
      }
      $this->session->set_flashdata('delete', 'Garage(s) supprimé(s)');
      redirect('garage');
    }
}
?>