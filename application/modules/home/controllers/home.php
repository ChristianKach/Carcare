<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('evenement/model_evenement');
        $this->load->model('vehicule/model_vehicule');
        $this->load->model('garage/model_garage');
        $this->load->model('travaux/model_travaux');
        $this->load->model('statistique/model_statistique');
    }

    public function index() {
        $data['title'] = 'Home';

        $nextDay = time() + (1 * 24 * 60 *60);

        $evenements = $this->model_evenement->getByDate(date('Y-m-d', $nextDay));
        //$evenements = $this->model_evenement->getByDate(date('Y-m-d'));
        $data['evenements'] = $evenements;

        $vehicule = $this->model_vehicule->getAll();
        $data['vehicule'] = $vehicule;

        $garage = $this->model_garage->getAll();
        $data['garage'] = $garage;

        $travaux = $this->model_travaux->getAll();
        $data['travaux'] = $travaux;
        $data['total'] = 0;
        $data['cout_total'] = 0;

        $vehicule_noms = $this->model_vehicule->getSameAll();
        $data['vehicule_noms'] = $vehicule_noms;

        $this->load->view('includes/header', $data);
        $this->load->view('includes/sidebar', $data);
        $this->load->view('includes/topmenu', $data);
        $this->load->view('view_home', $data);
        $this->load->view('includes/footer', $data);

    }
}
?>