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
/*
    public function get_commentaire($id_offre)
    {

            $sql = 'SELECT offre_stage.id,contenu,date_commentaire,id_offre 
                    from commentaire inner join offre_stage on offre_stage.id ='.$id_offre;
            $query = $this->db->query($sql);
            return $query->result();

            $id=$id_offre['id'];
            $contenu=$id_offre['contenu'];
            $date_commentaire=$id_offre'commentaire'];


    }
*/
}