<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Statistique extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('evenement/model_evenement');
        $this->load->model('travaux/model_travaux');
        $this->load->model('vehicule/model_vehicule');
        $this->load->model('garage/model_garage');
        $this->load->model('service/model_service');
    }

    public function index() {
        $data['title'] = 'Statistique';
        $data["js"] = array(
           // base_url().'assets/js/resultat.js'
        );
        $nextDay = time() + (1 * 24 * 60 * 60);
        $nextHour = time() + (1* 23 * 60 * 60);

        $evenements = $this->model_evenement->getByDate(date('Y-m-d', $nextDay));
        $data['evenements'] = $evenements;

        $event = $this->model_evenement->getByHour(date('H:i:s', $nextHour));
        $data['event'] = $event;

        $travaux = $this->model_travaux->getAll();
        $data['travaux'] = $travaux;
        $data['total'] = 0;
        $data['cout_total'] = 0;

        $vehicule_noms = $this->model_vehicule->getSameAll();
        $data['vehicule_noms'] = $vehicule_noms;

        $this->load->view('home/includes/header', $data);
        $this->load->view('home/includes/sidebar', $data);
        $this->load->view('home/includes/topmenu', $data);
        $this->load->view('view_statistique', $data);
        $this->load->view('home/includes/footer', $data);
    }
}
?>