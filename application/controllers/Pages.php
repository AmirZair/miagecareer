<?php
    class Pages extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $data= array(
                'entreprise'=>$this->Annonce->get_entreprise(),
                'offre_stage' => $this->Annonce->get_annonce(),
                'niveau'=>$this->Annonce->get_niveau(),
                'duree'=>$this->Annonce->get_duree(),
                 'ville'=>$this->Annonce->get_ville()
            );

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }
        public function view2(){
                    $data= array(
                        'entreprise'=>$this->Annonce->get_entreprise(),
                        'offre_stage' => $this->Annonce->get_annonce(),
                        'niveau'=>$this->Annonce->get_niveau(),
                        'duree'=>$this->Annonce->get_duree(),
                         'ville'=>$this->Annonce->get_ville(),
                         'results',
                         'links'
                    );


                    $this->load->library('pagination');

                    $config = array();

               $config["base_url"] = base_url() . "pages/view2";
               $query = $this->db->get_where('offre_stage', array('libre' => 0));
               $config["total_rows"] = $query->num_rows();

               $config["per_page"] = 3;
               $config["uri_segment"] = 3;

               $config["full_tag_open"]='<ul class="pagination">';
               $config["full_tag_close"]='</ul>';

               $config["fist_tag_open"]='<li>';
               $config["last_tag_open"]='<li>';

               $config["next_tag_open"]='<li>';
               $config["prev_tag_open"]='<li>';

               $config["num_tag_open"]='<li>';
               $config["num_tag_close"]='<li>';

               $config["first_tag_close"]='</li>';
               $config["last_tag_close"]='</li>';

               $config["next_tag_close"]='</li>';
               $config["prev_tag_close"]='</li>';

               $config["cur_tag_open"]="<li class=\"active\"><span><b>";
               $config["cur_tag_close"]='</b></span></li>';





               $this->pagination->initialize($config);

               $page2 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


               $data["results"] = $this->Annonce->fetch_offre2($config["per_page"], $page2);

               $data["links"] = $this->pagination->create_links();


                    $this->load->view('templates/header');
                    $this->load->view('pages/home2', $data);
                    $this->load->view('templates/footer');
                }


        public function view_h($page = 'home'){
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

            $this->load->view('templates/header');
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }



        public function search ($page='home')
        {
            $datas=$this->input->get();
            $data= array(
              //  'resultat' => $this->Annonce->searche_entre($datas['entreprise']),
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
