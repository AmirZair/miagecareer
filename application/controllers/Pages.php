<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $entereprise=$this->input->get('entreprise');
            $data= array(
                'entreprise'=>$this->Annonce->get_entreprise(),
                'offre_stage' => $this->Annonce->get_annonce(),
                'niveau'=>$this->Annonce->get_niveau(),
                'duree'=>$this->Annonce->get_duree(),
                 'ville'=>$this->Annonce->get_ville()
            );
            print_r($data);
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }



        public function search ($page='home')
        {
            $datas=$this->input->get();
            $data= array(
                'resultat' => $this->Annonce->searche_entre($datas['entreprise']),
                'offre_stage' => $this->Annonce->get_annonce($datas),
                'entreprise'=>$this->Annonce->get_entreprise(),
          //      'offre_stage' => $this->Annonce->get_annonce(),
                'niveau'=>$this->Annonce->get_niveau(),
                'duree'=>$this->Annonce->get_duree(),
                'ville'=>$this->Annonce->get_ville()
            );
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }

    }
