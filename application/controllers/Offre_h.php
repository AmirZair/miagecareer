<?php
class Offre_h extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->model('Commentaire');
    }

    public function view($offre){
    $data['offre_stage'] = $this->Annonce->get_offre_h_id($offre);
    $data['commentaire'] = $this->Commentaire->get_commentaire($offre);
     if(empty($data['offre_stage']))
      show_404();
      

        $this->load->view('templates/header_offre',$data);

        $this->load->view('pages/offre_h', $data);
        $this->load->view('pages/commentaire',$data);
        $this->load->view('pages/commentaire_saisie');
        $this->load->view('templates/footer');
    }



}
