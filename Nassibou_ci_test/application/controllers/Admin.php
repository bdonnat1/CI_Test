<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('pages_model');
        $this->load->model('menus_model');
        $this->load->model('admin_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        //profiler
        //$this->output->enable_profiler(true);
    }
    
    public function login() {
        /*
         * Fin verification ----------------------------------
         */
        if ($this->session->userdata('login')) {
            
            $this->pages();
            
        } else {
            /*
             * Recuperation des valeurs envoyer par la formulaire d'authentification
             * $login, login de l'utilisateur
             * $password, mot de passe de l'utilisateur
             */
            $login = $this->input->post('login');
            $password = $this->input->post('motdepasse');
            //echo $login . " / " . $password;
            /*
             * Fin recuperation 
             */
            /*
             * Si envoi par formulaire, on effectue les actions 
             * Tester si le login et le mot de passe correspond
             * Si oui, on redirige l'utilisateur dans la page admin
             * Sinon, on le redirige dans la page d'authentification
             */
            if ($this->form_validation->run() == FALSE)
            {
                /*
                 * $this->admin_model->verif_login($login, $password)
                 * Fonction declarer dans admin_model pour la verification 
                 * des informations de connexion dans la base de données
                 * Ce dernier retourne une valeur TRUE si l'authentification
                 * est acceptable, sinon, FALSE
                 */
                $result = $this->admin_model->verif_login($login, $password);
                //echo "<br/>" . $result . "<br/>";
                if($result > 0)
                {
                    /*$this->load->view('admin/login');*/
                   // echo 'OK';
                    $data = array(
                        'login' => $login
                    );
                    $this->session->set_userdata($data);
                    $this->pages();

                } else {
                    
                    $this->form_validation->set_message('login', 'Login ou Mot de passe incorrect!');
                    echo '<div style="text-align: center; color: red; margin-top: 10%;">Login ou Mot de passe incorrect!</div>';
                    $this->load->view('admin/login');
                    //echo "Not ok";

                }

            } else {

                $this->load->view('admin/login');

            }
        
        }
        
    }
    /*
     * Fonction pour se deconnecter,
     * Supprime tous les variables session existant
     * Et redirige l'utilsateur vers la page d'authentification
     */
    public function logout()
    {
        session_destroy();
        $this->load->view('admin/login');
    }
    
    /*
     * Affichage de la contenu de la page en fonction de son id
     */
    public function pages($idPage = NULL)
    {
        
        $data['menus'] = $this->menus_model->get_menu();
        $data['menus_place'] = $this->admin_model->get_categorie();
        /*
         * Data menu
         */
        $data['menus_haut'] = $this->menus_model->get_menus_by_categorie('1');
        $data['menus_bas_col1'] = $this->menus_model->get_menus_by_categorie('2');
        $data['menus_bas_col2'] = $this->menus_model->get_menus_by_categorie('3');
        $data['menus_bas_col3'] = $this->menus_model->get_menus_by_categorie('4');
        $data['menus_bas_gauche'] = $this->menus_model->get_menus_by_categorie('5');
        
        $data['meta_email'] = $this->pages_model->get_site_meta("email");
        $data['meta_phone'] = $this->pages_model->get_site_meta("telephone");
        $data['meta_contactleft'] = $this->pages_model->get_site_meta("contactleft");
        /*
         * -----------
         */
        /*
         * Verification de formulaire
         */
        $data['pages'] = $this->pages_model->get_page($idPage);
        /*
         * REDIRIGER VERS LA PAGE SE CONNECTER SI ABSENCE DE SESSION
         */
       
        if ($this->session->userdata('login')) {
            
            //echo $this->session->userdata('login');
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar_left', $data);
            if ($idPage == NULL) {
                $this->load->view('admin/default_content', $data);
            } else {
                $this->load->view('admin/page_single', $data);
            }
            $this->load->view('admin/templates/footer', $data);
            
        }else {
            
            $this->load->view('admin/login'); 
            
        }
        /*
         * ---------------------------------------------------------
         */
    }
    /*
     * Modification  de la contenu d'une page
     */
    public function modifiercontenu() {
        $idPage = $this->input->post('idPage');
        $contenu = ($this->input->post('contenu'));
        $this->admin_model->updatePage($contenu, $idPage, "contenu");
    }
    /*
     * Modification du titre d'une page
     */
    public function modifiertitre() {
        $idPage = $this->input->post('idPage');
        $titre = ($this->input->post('titre'));
        $this->admin_model->updatePage($titre, $idPage, "titre");
    }
    /*
     * Update metakey
     */
    public function modifierMeta(){
        $meta_key = $this->input->post('meta_key');
        $meta_value = ($this->input->post('meta_value'));
        $this->admin_model->updateSiteMeta($meta_key, $meta_value);
    }
    
    public function account() {
        
        if ($this->session->userdata('login')) {
            
            $data['menus_haut'] = $this->menus_model->get_menu('1');
            $data['info_user'] = $this->admin_model->get_info_user($this->session->userdata('login'));
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/profil', $data);
            
        }else {
            
            $this->load->view('admin/login', $data); 
            
        }
    }
    /*
     * Modifier le profil de l'utilisateur
     */
    public function modifierProfil(){
        $login = $this->input->post('login');
        $password1 = ($this->input->post('password1'));
        $password2 = ($this->input->post('password2'));
        $this->admin_model->updateUserProfil($login, $password1, $password2);
    }
    /*
     * Administration des pages
     * Ajout suppression et modification
     */
    public function lespages($idPage = NULL) {
       
        /*
         * Chargement des menus du haut
         */
        $data['menus_haut'] = $this->menus_model->get_menu('1');
        /*
         * Recuperer tout les pages de la base de données
         */
        $data['lespages'] = $this->pages_model->get_page();
        /*
         * Verification de formulaire
         */
        $data['pages'] = $this->pages_model->get_page($idPage);
        /*
         * REDIRIGER VERS LA PAGE SE CONNECTER SI ABSENCE DE SESSION
         */
       
        if ($this->session->userdata('login')) {
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/pages/sidebar_left', $data);
            if ($idPage == NULL) {
                $this->load->view('admin/default_content', $data);
            } else {
                $this->load->view('admin/page_single', $data);
            }
            $this->load->view('admin/templates/footer_pages', $data);
            
        }else {
            
            $this->load->view('admin/login'); 
            
        }
        /*
         * ----------------------------------------------
         */
        
    }
    /*
     * Pour administrer les menus
     */
    public function lesmenus($idMenu = NULL) {
       /*
         * Recuperer tout les pages de la base de données
         */
        $data['lesmenus'] = $this->menus_model->get_menus_simple();
        /*
         * Verification de formulaire
         */
        if ($idMenu != NULL) {
            $data['menus'] = $this->menus_model->get_menus_simple($idMenu);
        }
        /*
         * Recuperer toutes les catégories
         */
        $data['categories'] = $this->menus_model->get_categorie();
        /*
         * Recuperer toutes la page
         */
        $data['pages'] = $this->pages_model->get_page();
        /*
         * REDIRIGER VERS LA PAGE SE CONNECTER SI ABSENCE DE SESSION
         */
        if ($this->session->userdata('login')) {
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/menus/sidebar_left', $data);
            if ($idMenu == NULL) {
                $this->load->view('admin/default_content', $data);
            } else {
                $this->load->view('admin/menus/editmenu', $data);
            }
            $this->load->view('admin/templates/footer_pages', $data);
            
        }else {
            
            $this->load->view('admin/login'); 
            
        }
        /*
         * ----------------------------------------------
         */
        
    }
    
    /*
     * Pour aajouter une nouvelle page
     */
    public function nouveaupage() {
       
        /*
         * Chargement des menus du haut
         */
        $data['menus_haut'] = $this->menus_model->get_menu('1');
        /*
         * Recuperer tout les pages de la base de données
         */
        $data['lespages'] = $this->pages_model->get_page();
        /*
         * REDIRIGER VERS LA PAGE SE CONNECTER SI ABSENCE DE SESSION
         */
       
        if ($this->session->userdata('login')) {
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/pages/sidebar_left', $data);
            $this->load->view('admin/pages/nouveaupage', $data);
            $this->load->view('admin/templates/footer_pages', $data);
            
        }else {
            
            $this->load->view('admin/login'); 
            
        }
        /*
         * ----------------------------------------------
         */
        
    }
    
    /*
     * Fonction d'ajout de la nouvelle page dans la base de données
     */
    public function addPage() {
        $titre = trim($this->input->post('titre'));
        $contenu = trim($this->input->post('contenu'));
        if($titre == "") {
            echo '<div style="padding: 10px; background: #ffa7c4; color: #cd0614; ">Veuillez saisir le titre de la page SVP!</div>';
        } else {
            // Lancement de l'ajout dans la base de données
            // Ajout dans la table panier
            $data = array(
                'titre' => $titre,
                'contenu' => $contenu
            );
            if($this->db->insert('pages', $data)) {
                echo '<div style="padding: 10px; background: #bdffa7; color: #0da01e; ">Enregistrement réussi!</div>';
           } else {
                echo '<div style="padding: 10px; background: #ffa7c4; color: #cd0614; ">Erreur lors de l\'enregistrement! Veuillez réessayer SVP.</div>';
            }
        }
    }
    /*
     * Suppression d'une page
     */
    public function supprimerPage(){
        $idpage = $this->input->post('idpage');
        $this->db->delete('pages', array('idPage' => $idpage));
        echo $idpage;
    }
    /*
     * Modifier le menu
     */
    public function updatemenu() {
        $idMenu = $this->input->post('idMenu');
        $menu = trim($this->input->post('nommenu'));
        $idPage = $this->input->post('idPage');
        $idCategorie = $this->input->post('idCategorie');
        
        if($menu != "") {
            
            $data = array(
                   'menu' => $menu,
                   'idPage' => $idPage,
                   'idCategorie' => $idCategorie
                );
            
            $this->db->where('idMenu', $idMenu);
            $this->db->update('menus', $data); 
            
        }
    }
    
    /*
     * Nouveau menu
     */
    public function nouveaumenu() {
       /*
         * Recuperer tout les pages de la base de données
         */
        $data['lesmenus'] = $this->menus_model->get_menus_simple();
        
        /*
         * Recuperer toutes les catégories
         */
        $data['categories'] = $this->menus_model->get_categorie();
        /*
         * Recuperer toutes la page
         */
        $data['pages'] = $this->pages_model->get_page();
        /*
         * REDIRIGER VERS LA PAGE SE CONNECTER SI ABSENCE DE SESSION
         */
        if ($this->session->userdata('login')) {
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/menus/sidebar_left', $data);
            $this->load->view('admin/menus/nouveaumenu', $data);
            $this->load->view('admin/templates/footer_pages', $data);
            
        }else {
            
            $this->load->view('admin/login'); 
            
        }
    }
    /*
     * Ajouter un menu
     */
    public function addMenu() {
        $menu = trim($this->input->post('nommenu'));
        $idPage = $this->input->post('idPage');
        $idCategorie = $this->input->post('idCategorie');
        
        if($menu != "") {
            
            $data = array(
                   'menu' => $menu,
                   'idPage' => $idPage,
                   'idCategorie' => $idCategorie
                );
            
            $this->db->insert('menus', $data); 
            
        }
    }
    /*
     * Supprimer un menu
     */
    public function supprimerMenu(){
        $idMenu = $this->input->post('idMenu');
        $this->db->delete('menus', array('idMenu' => $idMenu));
        //echo $idMenu;
    }
    
    
    /*
     * Page photos
     */
    public function photos() {
        /*
         * Recuperer tout les pages de la base de données
         */
        $data['lesmenus'] = $this->menus_model->get_menus_simple();
        
        /*
         * Recuperer toutes les catégories
         */
        $data['categories'] = $this->menus_model->get_categorie();
        /*
         * Recuperer toutes la page
         */
        $data['pages'] = $this->pages_model->get_page();
        /*
         * REDIRIGER VERS LA PAGE SE CONNECTER SI ABSENCE DE SESSION
         */
        if ($this->session->userdata('login')) {
            
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/menus/sidebar_left', $data);
            $this->load->view('admin/pages/photos', $data);
            $this->load->view('admin/templates/footer_pages', $data);
            
        }else {
            
            $this->load->view('admin/login'); 
            
        }
        /*
         * ----------------------------------------------
         */
    }
}
