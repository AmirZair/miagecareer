<?php
class Offre extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->model('Commentaire'); // chargement model Commentaire
    }
    public function view($offre){

        $data['offre_stage'] = $this->Annonce->get_offre_id($offre);
        $data['commentaire'] = $this->Commentaire->get_commentaire($offre);
        if(empty($data['offre_stage']))
            show_404();
        $this->load->view('templates/header_offre',$data);
        $this->load->view('pages/offre', $data);
        $this->load->view('pages/commentaire',$data);
        $this->load->view('templates/footer');
    }

    public function add_comm(){

        // recuperation des variables pour le post d'un commentaire
        $datas = array(
            'id_user' => $this->input->post('id_user'),
            'contenu' => $this->input->post('commentaire'),
            'id_offre' => $this->input->post('id_offre')
        );

        $this->Commentaire->add_commentaire($datas); // envois des commentaires
        header("Location: ".base_url()."/offre/".$this->input->post('id_offre')); // rafraichissement de la page selon l'id de l'offre


    }



}
