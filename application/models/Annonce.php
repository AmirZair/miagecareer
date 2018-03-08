<?php
    class Annonce extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function get_all()
        {
            $sql = 'select  *
                    from offre_stage
                    where libre=1';
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        public function get_annonce($intitule = FALSE,$h=FALSE){
            if($intitule === FALSE)
            {
                $sql = "select distinct id,o.intitule,o.nom_entreprise,u.nom,u.prenom,o.date_debut,
                        date(o.date_creation) as date_creation
                        from offre_stage o, utilisateur u
                        where o.email_utilisateur=u.ID_email " ;
                  if ($h === false)
                  $sql.="and o.libre=1";
                $query = $this->db->query($sql);
                return $query->result_array();
            }
            $entreprise=$intitule['entreprise'];
            $niveau=$intitule['niveau_etude'];
            $duree=$intitule['duree'];
            $ville=$intitule['ville'];
            $txt=$intitule['txt'];
            $sql = "select distinct mission,duree,id,o.date_debut,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation, e.ville as ville";
            if ($h!==FALSE)
            $sql.=",m.nom as mnom,m.prenom  as mprenom ";
            $sql.=" from offre_stage o, utilisateur u, entreprise e,maitre_stage m
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
        if ($h!== FALSE)
        $sql.=" and o.libre=0 and m.email=o.email_maitre";
        else
            $sql.=" and o.libre=1";
            $query = $this->db->query($sql);
            return $query->result_array();

        }
        public function get_entreprise($entreprise=NULL)
        {
          if ($entreprise === NULL)
            {
              $query=$this->db->query("select distinct nom_entreprise from entreprise");
              return $query->result_array();
            }
            $query=$this->db->query("select distinct nom_entreprise  from offre_stage o where
            o.libre=0");
            return $query->result_array();
        }


        public function get_offre_id($id){
            $sql = 'select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation, mission, date_debut, niveau_etude, duree, libre,e.ville as ville
                        from offre_stage o, utilisateur u, entreprise e
                        where o.email_utilisateur=u.ID_email and e.nom_entreprise=o.nom_entreprise
                              and id='.$id;
            $query = $this->db->query($sql);
            return $query->row_array();
        }

        public function get_offre_h_id($id){
            $sql = 'select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,e.ville as ville,
            date(o.date_creation) as date_creation, mission, date_debut, niveau_etude,
            duree,m.nom,m.prenom,m.email
                        from offre_stage o, utilisateur u,maitre_stage m, entreprise e
                        where o.email_utilisateur=u.ID_email and o.email_maitre=m.email and e.nom_entreprise=o.nom_entreprise
                              and id='.$id ;
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
          $query=$this->db->query("select distinct niveau_etude from offre_stage o
          where o.libre=0");
          return $query->result_array();
      }

      public function get_duree($duree=NULL)
      {
        if ($duree === NULL)
          {
            $query=$this->db->query("select DISTINCT duree from offre_stage");
            return $query->result_array();
          }
          $query=$this->db->query("select DISTINCT duree from offre_stage o
          where o.libre=0");
          return $query->result_array();
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

            $query=$this->db->query("select DISTINCT e.ville as ville
                                     from entreprise e, offre_stage o
                                     where e.nom_entreprise = o.nom_entreprise and o.libre=0");
            return $query->result_array();
        }

        public function searche_entre($entereprise = NULL)
        {
            if($entereprise != NULL)
            {
            $query = $this->db->query("select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation
                  from offre_stage o, utilisateur u
                  where o.email_utilisateur=u.ID_email and o.nom_entreprise='$entereprise'and o.libre=1");
            }
            else
            {
              $sql="select id,o.intitule,o.nom_entreprise,u.nom,u.prenom,date(o.date_creation) as date_creation
                      from offre_stage o, utilisateur u
                      where o.email_utilisateur=u.ID_email and o.libre=1";

                $query = $this->db->query($sql);
            }
            return $query->result_array();
        }

        public function remove_annonce($id)
        {
            $this->db->delete('offre_stage', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        }

        public function update($data)
        {
            if(!empty($data))
            {
                $this->db->where('id', $data['id']);
                $this->db->update('offre_stage', $data);
            }
        }

        public function add($data)
        {
            if(!empty($data))
            {
                $this->db->insert('offre_stage', $data);
            }
        }

        public function atribution($data)
        {
            if(!empty($data))
            {
                $sql="select * from maitre_stage where email='".$data['email']."'";
                $query = $this->db->query($sql);

                if($query->num_rows() > 0)
                {
                    $sql="update offre_stage set libre=0, email_maitre='".$data['email']."' where id=".$data['id']."";
                    $this->db->query($sql);
                }
                else
                {
                    $sql="insert into maitre_stage VALUES ('".$data['email']."','".$data['nom']."','".$data['prenom']."')";
                    $this->db->query($sql);
                    $sql="update offre_stage set libre=0, email_maitre='".$data['email']."' where id=".$data['id']."";
                    $this->db->query($sql);
                }
            }
        }
        /*ajout*/
        public function fetch_offre($limit, $start) {
            $this->db->limit($limit,$start);
            $this->db->select('*');
            $this->db->from('offre_stage');
            $this->db->join('utilisateur', 'offre_stage.email_utilisateur = utilisateur.ID_email and libre=0');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->result_array();
            }
            return false;
        }
        public function fetch_offre2($limit, $start) {
            $this->db->limit($limit,$start);
            $this->db->select('*');
            $this->db->from('offre_stage');
            $this->db->join('utilisateur', 'offre_stage.email_utilisateur = utilisateur.ID_email and libre=1');
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $query->result_array();
            }
            return false;
        }

        public function ajouter_annonce($offre,$entreprise)
        {
            if(!empty($offre))
            {
                $sql="select * from entreprise where nom_entreprise='".$offre['nom_entreprise']."'";
                $query = $this->db->query($sql);

                if($query->num_rows() > 0)
                {
                    $this->db->insert('offre_stage', $offre);
                }
                else
                {
                    $this->db->insert('entreprise', $entreprise);
                    $this->db->insert('offre_stage', $offre);
                }
            }
        }

    }
