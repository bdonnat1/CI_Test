<?php

class Menus_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_menu($idCategorie = FALSE)
    {
        if ($idCategorie === FALSE)
        {
            $sql = "SELECT DISTINCT
                    `menus_has_categories`.`idMenu`, 
                    `menus_has_categories`.`idCategorie`, 
                    `menus`.`menu`, `menus`.`idPage`, 
                    `menus`.`hyperlien` 
                    FROM menus_has_categories, menus, categories 
                    WHERE `menus_has_categories`.`idMenu`= `menus`.`idMenu`";
        } else {
            $sql = "SELECT DISTINCT
                    `menus_has_categories`.`idMenu`, 
                    `menus_has_categories`.`idCategorie`, 
                    `menus`.`menu`, `menus`.`idPage`, 
                    `menus`.`hyperlien` 
                    FROM menus_has_categories, menus, categories 
                    WHERE `menus_has_categories`.`idMenu`= `menus`.`idMenu`
                    AND `menus_has_categories`.`idCategorie`=" . $idCategorie;
        }

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    /*
     * Recuperer toutes les catégories
     */
    public function get_categorie($idCategorie = FALSE)
    {
        if ($idCategorie === FALSE)
        {
            $sql = "SELECT * FROM categories";
        } else {
            $sql = "SELECT * FROM categories 
                    WHERE `idCategorie`=" . $idCategorie;
        }

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    /*
     * Recuperer toutes les menu
     */
    public function get_menus_simple($idMenu = FALSE)
    {
        if ($idMenu === FALSE)
        {
            $sql = "SELECT * FROM menus";
        } else {
            $sql = "SELECT * FROM menus 
                    WHERE `idMenu`=" . $idMenu;
        }

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    /*
     * recuperer les menu par catégorie
     */
    public function get_menus_by_categorie($idCategorie = FALSE)
    {
        if ($idCategorie === FALSE)
        {
            $sql = "SELECT * FROM menus";
        } else {
            $sql = "SELECT * FROM menus 
                    WHERE `idCategorie`=" . $idCategorie;
        }

        $query = $this->db->query($sql);
        return $query->result_array();
    }
}