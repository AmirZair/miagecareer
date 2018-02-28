<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $entereprise=$this->input->get('Location');
            $data= array(
                'resultat' => $this->Annonce->searche_entre($entereprise),
                'offre_stage' => $this->Annonce->get_annonce()
            );
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }

        public function search ($page='home')
        {
            $entereprise=$this->input->get('Location');
            $data= array(
                'resultat' => $this->Annonce->searche_entre($entereprise),
                'offre_stage' => $this->Annonce->get_annonce()
            );
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }

    }