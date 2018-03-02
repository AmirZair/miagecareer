<?php
    class Annonce extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function get_all()
        {
            $sql = 'select  *
                    from offre_stage';
            $query = $this->db->query($sql);
            return $query->result_array();
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
            $entreprise=$intitule['entreprise'];
            $niveau=$intitule['niveau_etude'];
            $duree=$intitule['duree'];
            $ville=$intitule['ville'];
            $txt=$intitule['txt'];

            $sql = "select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation, e.ville as ville
                        from offre_stage o, utilisateur u, entreprise e
                        where o.email_utilisateur=u.ID_email and e.nom_entreprise = o.nom_entreprise";
        if (!empty($entreprise))
            $sql .=" and o.nom_entreprise='$entreprise'" ;
        if (!empty($niveau))
            $sql .=" and o.niveau_etude= '$niveau'";
        if (!empty($duree))
            $sql .= " and duree='$duree'";
        if (!empty($ville))
                $sql .= " and ville='$ville'";
        if (!empty($txt))
            $sql .=" and (mission like '%$txt%' OR intitule like '%$txt%')" ;


            $query = $this->db->query($sql);

            return $query->result_array();

        }
        public function get_entreprise($entreprise=NULL)
        {
          if ($entreprise === NULL)
            {
              $query=$this->db->query("select distinct nom_entreprise from offre_stage");
              return $query->result_array();
            }

        }


        public function get_offre_id($id){
            $sql = 'select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation, mission, date_debut, niveau_etude, duree, libre
                        from offre_stage o, utilisateur u
                        where o.email_utilisateur=u.ID_email
                              and id='.$id;
            $query = $this->db->query($sql);
            return $query->row_array();
        }

      public function  get_niveau($niveau= NULL)
      {
        if ($niveau === NULL)
          {
            $query=$this->db->query("select distinct niveau_etude from offre_stage");
            return $query->result_array();
          }
      }

      public function get_duree($duree=NULL)
      {
        if ($duree === NULL)
          {
            $query=$this->db->query("select DISTINCT duree from offre_stage");
            return $query->result_array();
          }
      }

        public function get_ville($ville=NULL)
        {
            if ($ville === NULL)
            {
                $query=$this->db->query("select DISTINCT e.ville as ville 
                                         from entreprise e, offre_stage o
                                         where e.nom_entreprise = o.nom_entreprise");
                return $query->result_array();
            }
        }

        public function searche_entre($entereprise = NULL)
        {
            if($entereprise != NULL)
            {
            $query = $this->db->query("select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation
                  from offre_stage o, utilisateur u
                  where o.email_utilisateur=u.ID_email and o.nom_entreprise='$entereprise'");
            }
            else
            {
                $query = $this->db->query('select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation
                        from offre_stage o, utilisateur u
                        where o.email_utilisateur=u.ID_email and o.libre=1');
            }
            return $query->result_array();
        }

        public function remove_annonce($id)
        {
            $this->db->delete('offre_stage', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        }

        public function update()
        {

        }
    }
