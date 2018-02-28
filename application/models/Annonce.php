<?php
    class Annonce extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function get_annonce($intitule = FALSE){
            if($intitule === FALSE)
            {
                $sql = 'select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation
                        from offre_stage o, utilisateur u
                        where o.email_utilisateur=u.ID_email and o.libre=1';
                $query = $this->db->query($sql);
                return $query->result_array();
            }
            $sql = 'select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation
                        from offre_stage o, utilisateur u
                        where o.email_utilisateur=u.ID_email
                              and ';
            $query = $this->db->get_where('offre_stage', array('intitule' => $intitule));
            return $query->row_array();
        }

        public function get_offre_id($id){
            $sql = 'select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation, mission, date_debut, niveau_etude, duree, libre  
                        from offre_stage o, utilisateur u
                        where o.email_utilisateur=u.ID_email
                              and id='.$id;
            $query = $this->db->query($sql);
            return $query->row_array();
        }



        public function searche_entre($entereprise)
        {
            $query = $this->db->query("select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation
                  from offre_stage o, utilisateur u
                  where o.email_utilisateur=u.ID_email and o.nom_entreprise='$entereprise'");

            return $query->result_array();
        }
    }