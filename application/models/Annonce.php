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
                        where o.email_utilisateur=u.ID_email';
                $query = $this->db->query($sql);
                return $query->result_array();
            }

            $query = $this->db->get_where('offre_stage', array('intitule' => $intitule));
            return $query->row_array();
        }
    }