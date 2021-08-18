<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('employe/model_employe');
        $this->load->model('service/model_service');
    }

    public function index() {
        $data['title'] = 'Employe';
        $data["js"] = array(
            base_url().'assets/js/employe.js'
        );

        $data['employes'] = $this->model_employe->getAll();
        $data['services'] = $this->model_service->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_employe', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('employe_nom', 'Nom employe', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('employe_prenom', 'Prenom employe', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('employe_sexe', 'Sexe employe', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('employe_contact', 'Contact employe', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('employe_birthday', 'Birthday emplye', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('employe_mail', 'E-mail emplye', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('employe_localisation', 'Localisation employe', 'trim|required|max_length[150]|xss_clean');
        $this->form_validation->set_rules('service_id', 'Service', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['employe_nom'] = $this->input->post('employe_nom');
           $data['employe_prenom'] = $this->input->post('employe_prenom');
           $data['employe_sexe'] = $this->input->post('employe_sexe');
           $data['employe_contact'] = $this->input->post('employe_contact');
           $data['employe_mail'] = $this->input->post('employe_mail');
           $data['employe_birthday'] = $this->input->post('employe_birthday');
           $data['employe_localisation'] = $this->input->post('employe_localisation');
           $data['service_id'] = $this->input->post('service_id');

           $employe_id = $this->model_employe->save($data);

           $this->session->set_flashdata('add', 'Employe enregistré!'); 

           redirect('employe');

        }

        $data['employes'] = $this->model_employe->getAll();
        $data['services'] = $this->model_service->getAll();

        $data['title'] = 'employes';
        $data["js"] = array(
            base_url().'assets/js/employe.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_employe', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$employe_id = (int) $this->uri->segment(3)) {
            redirect('employe');
        }

        if(isset($_POST['employe_id'])) {
            $this->form_validation->set_rules('employe_nom', 'Nom employe', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('employe_prenom', 'Prenom employe', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('employe_sexe', 'Sexe employe', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('employe_contact', 'Contact employe', 'trim|required|max_length[150]|xss_clean');
             $this->form_validation->set_rules('employe_mail', 'E-mail emplye', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('employe_birthday', 'Birthday emplye', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('employe_localisation', 'Localisation employe', 'trim|required|max_length[150]|xss_clean');
            $this->form_validation->set_rules('service_id', 'Service', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['employe_nom'] = $this->input->post('employe_nom');
           $data['employe_prenom'] = $this->input->post('employe_prenom');
           $data['employe_sexe'] = $this->input->post('employe_sexe');
           $data['employe_contact'] = $this->input->post('employe_contact');
           $data['employe_mail'] = $this->input->post('employe_mail');
           $data['employe_birthday'] = $this->input->post('employe_birthday');
           $data['employe_localisation'] = $this->input->post('employe_localisation');
           $data['service_id'] = $this->input->post('service_id');

               $this->model_employe->update($this->input->post('employe_id'), $data);

               $this->session->set_flashdata('update', 'Employe mise à jour!'); 

               redirect('employe');

                }
            }    


            $employe = $this->model_employe->getById($employe_id);
            if(empty($employe)) {
                redirect('employe');
            }
            $employe = $employe[0];
            $data['employe'] = $employe;
            $data['employes'] = $this->model_employe->getAll();
            $data['services'] = $this->model_service->getAll();

            $data['title'] = 'employe';
            $data["js"] = array(
                base_url().'assets/js/employe.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_employe', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$employe_id= (int) $this->uri->segment(3)) {
            redirect('employe');
        }
        
        try {
            $this->model_employe->delete($employe_id);
            $this->session->set_flashdata('delete', 'Employe supprimé!');
        } catch(Exception $e) {
            redirect('employe');
        }

        redirect('employe'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('employe');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_employe->delete($i);
      }
      $this->session->set_flashdata('delete', 'Employe(s) supprimé(s)');
      redirect('employe');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ 
?>