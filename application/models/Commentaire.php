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


    public function get_commentaire($id_offre)
    {

            $sql = 'SELECT c.ID,contenu,date_commentaire 
                    FROM commentaire c,offre_stage o 
                    WHERE o.id ='.$id_offre;

            $query = $this->db->query($sql);
            return $query->result();


    }

}