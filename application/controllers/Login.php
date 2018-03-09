<?php
class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User');
    }

    public function view(){

        $this->load->view('Login/accueil');

    }

    public function add_user(){
        $datas = array(
            'ID_email' => $this->input->post('email'),
            'mdp' =>  hash('sha256', $this->input->post('password')),
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'tel' => $this->input->post('tel'),
            'type_util' => $this->input->post('type')
        );
        $to=$this->input->post('email');
        if($this->User->existe($datas)==True)
        {
            echo'<script>alert("Email existe deja");</script>';
            echo'<script>window.location.href = "'.base_url().'/login";</script>';

        }
        else
        {
        $subject="Activation compte Miage career";
        $message = '
     <html>
      <body>
       <a href="'.base_url().'/login/activer/'.$this->input->post('email').'">Cliquez ici pour activer votre compte</a>
      </body>
     </html>
     ';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to,$subject,$message,$headers);
            echo'<script>alert("Email activation envoyé");</script>';
            echo'<script>window.location.href = "'.base_url().'/login";</script>';
        }

    }

    public function activer($email){
            if(!empty($email))
            {
                $data = array(
                    'valider' => '1'
                );
                $this->db->where('ID_email', $email);
                $this->db->update('utilisateur', $data);
                echo'<script>alert("Compte activé");</script>';
                echo'<script>window.location.href = "'.base_url().'/login";</script>';
            }
    }

    public function login(){
        $pass = hash('sha256', $this->input->post('password'));
        $datas = array(
            'ID_email' => $this->input->post('ID_email'),
            'password' => $pass
        );

        $verification = $this->User->verif($datas);
        if($verification == True){
            $result = $this->User->get_user_s($datas);
            // ouverture d'une session avec les ids :
            $this->session->set_userdata($datas);
            $var = 0;
            if($result[0]['type_util'] == 0)
            {
               header("Location: ".base_url()."/admin");
            }
            else
            {
                header("Location: ".base_url());
            }
        }
        else{
            echo'<script>alert("Erreur Email ou Mot de passe");</script>';
            $this->load->view('Login/accueil');
        }
    }

    public function logout()
    {
        // delete session datas :
        $this->session->sess_destroy();
        // Redirection vers la page login :
        //echo'<script>alert("Session terminée avec success !");</script>';
        $this->load->view('Login/accueil');
    }
}