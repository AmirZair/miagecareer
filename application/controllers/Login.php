<?php
class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();

    }

    public function view(){

        $this->load->view('Login/accueil');

    }

    public function add_user(){
        $datas = array(
            'ID_email' => $this->input->post('email'),
            'mdp' => $this->input->post('password'),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'tel' => $this->input->post('tel'),
            'type_util' => $this->input->post('type')
        );
        $to=$this->input->post('email');
        $subject="Activation compte Miage career";
        $message = '
     <html>
      <body>
       <a href="'.base_url().'/login/activer'.$this->input->post('email').'">Cliquez ici pour activer votre compte</a>
      </body>
     </html>
     ';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to,$subject,$message,$headers);


    }

    public function valider($id){

    }
}