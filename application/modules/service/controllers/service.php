<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('service/model_service');
    }

    public function index() {
        $data['title'] = 'Service';
        $data["js"] = array(
            base_url().'assets/js/service.js'
        );

        $data['services'] = $this->model_service->getAll();

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_service', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function save() {
        $this->form_validation->set_rules('service_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
        
        if ($this->form_validation->run()) {
           $data['service_libelle'] = $this->input->post('service_libelle');

           $service_id = $this->model_service->save($data);

           $this->session->set_flashdata('add', 'Service enregistré!'); 

           redirect('service');

        }

        $data['services'] = $this->model_service->getAll();

        $data['title'] = 'services';
        $data["js"] = array(
            base_url().'assets/js/service.js'
        );

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_service', $data);
        $this->load->view('home/includes/footer', $data);
    }

    public function update() {
        if(!$service_id = (int) $this->uri->segment(3)) {
            redirect('service');
        }

        if(isset($_POST['service_id'])) {
            $this->form_validation->set_rules('service_libelle', 'Libelle', 'trim|required|max_length[150]|xss_clean');
            
            if ($this->form_validation->run()) {
               $data['service_id']          = $this->input->post('service_id');
               $data['service_libelle']     = $this->input->post('service_libelle');

               $this->model_service->update($this->input->post('service_id'), $data);

               $this->session->set_flashdata('update', 'Service mise à jour!'); 

               redirect('service');

                }
            }    


            $service = $this->model_service->getById($service_id);
            if(empty($service)) {
                redirect('service');
            }
            $service = $service[0];
            $data['service'] = $service;
            $data['services'] = $this->model_service->getAll();

            $data['title'] = 'service';
            $data["js"] = array(
                base_url().'assets/js/service.js'
            );

            $this->load->view('home/includes/header', $data);
            $this->load->view('home/includes/sidebar', $data);
            $this->load->view('home/includes/topmenu', $data);
            $this->load->view('view_service', $data);
            $this->load->view('home/includes/footer', $data);
    }

    
    public function delete() {

        if(!$service_id= (int) $this->uri->segment(3)) {
            redirect('service');
        }
        
        try {
            $this->model_service->delete($service_id);
            $this->session->set_flashdata('delete', 'Service supprimé!');
        } catch(Exception $e) {
            redirect('service');
        }

        redirect('service'); 
    }

    public function deletemany() {
      if(!isset($_POST['items_checked']) || empty($_POST['items_checked']))
        redirect('service');

      $check_items = $this->input->post('items_checked');

      foreach($check_items as $i) {
          $this->model_service->delete($i);
      }
      $this->session->set_flashdata('delete', 'Service(s) supprimé(s)');
      redirect('service');
    }
  
    

    


}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/adherant.php */ 
?>