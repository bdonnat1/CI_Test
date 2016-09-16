<?php

class Admin_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_categorie()
    {
        
        $sql = "SELECT * FROM categories";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    /*
     * Update page
     */
    public function updatePage($contenu, $idPage, $champs) {
        $data = array($champs => $contenu);
        if($this->db->update('pages', $data, array('idPage' => $idPage)))
            echo '<div style="padding: 10px; background: #bdffa7; color: #0da01e; ">Enregistrement réussi!</div>';
        else
            echo '<div style="padding: 10px; background: #ffa7c4; color: #cd0614; ">Erreur lors de l\'enregistrement! Veuillez réessayer SVP.</div>';
    }
    /*
     * update site meta
     */
    public function updateSiteMeta($meta_key, $meta_value) {
        $data = array("meta_value" => $meta_value);
        if($this->db->update('site_meta', $data, array('meta_key' => $meta_key)))
            echo '<div style="padding: 10px; background: #bdffa7; color: #0da01e; ">Enregistrement réussi!</div>';
        else
            echo '<div style="padding: 10px; background: #ffa7c4; color: #cd0614; ">Erreur lors de l\'enregistrement! Veuillez réessayer SVP.</div>';
    }
    /*
     * Authentification
     * Return la valeur 1 si le login et password est correcte
     */
    public function verif_login($login, $password)
    {
        $condition = " login='" . $login . "' AND password='" . $password . "' ";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
    }
    /*
     * Modification de profil
     * Recuperer les informations sur l'utilistateur connecté
     */
    public function get_info_user($login)
    {
        
        $sql = "SELECT * FROM users WHERE login='" . $login . "' ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    /*
     * Modifier les informations sur un utilisateur
     */
    public function updateUserProfil($login, $password1, $password2) {
        /*
         * Si les deux mot de passe saisi ne correspond pas
         */
        if ($password1 != $password2) {
            echo '<div style="padding: 10px; background: #ffa7c4; color: #cd0614; ">Les mots de passe de vous avez saisi ne correspond pas!</div>';
        } else if ($password1 =="" && $password2 =="") {
            echo '<div style="padding: 10px; background: #ffa7c4; color: #cd0614; ">Mot de passe ne doit pas être vide!</div>';
        }
        else {
            $data = array("password" => $password1);
            if($this->db->update('users', $data, array('login' => $login)))
                echo '<div style="padding: 5px; background: #bdffa7; color: #0da01e; ">Enregistrement réussi!</div>';
            else
                echo '<div style="padding: 5px; background: #ffa7c4; color: #cd0614; ">Erreur lors de l\'enregistrement! Veuillez réessayer SVP.</div>';
        }
        
    }
}