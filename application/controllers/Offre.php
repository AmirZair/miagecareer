<?php
class Offre extends CI_Controller{
    public function view($offre){

        $data['offre_stage'] = $this->Annonce->get_offre_id($offre);
        if(empty($data['offre_stage']))
            show_404();
        $this->load->view('templates/header_offre',$data);
        $this->load->view('pages/offre', $data);
        $this->load->view('pages/commentaire');
        $this->load->view('pages/commentaire_saisie');
        $this->load->view('templates/footer');
    }
}