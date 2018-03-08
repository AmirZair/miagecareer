<?php
class Commentaire extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all()
    {
        $sql ='select * from commentaire';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * @param $id_offre
     * @return mixed
     */


    public function get_commentaire($offre)
    {

            $sql = 'SELECT c.contenu,date(c.date_commentaire) as date_commentaire,u.nom,u.prenom 
                    FROM commentaire c, utilisateur u
                    WHERE u.ID_email=c.id_user and id_offre ='.$offre;

            $query = $this->db->query($sql);
            return $query->result_array();
    }

    public function add_commentaire($data)
    {

        if(!empty($data))
        {
            $this->db->insert('commentaire', $data);
            // insertions des données data dans la bdd
        }

    }



}