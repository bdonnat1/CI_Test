<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('email');
        $this->load->model('pages_model');
        $this->load->model('menus_model');
        $this->load->library('session');
    }

    public function index() {
        $data['menus_haut'] = $this->menus_model->get_menus_by_categorie('1');
        $data['menus_bas_col1'] = $this->menus_model->get_menus_by_categorie('2');
        $data['menus_bas_col2'] = $this->menus_model->get_menus_by_categorie('3');
        $data['menus_bas_col3'] = $this->menus_model->get_menus_by_categorie('4');
        $data['menus_bas_gauche'] = $this->menus_model->get_menus_by_categorie('5');

        $data['meta_email'] = $this->pages_model->get_site_meta("email");
        $data['meta_phone'] = $this->pages_model->get_site_meta("telephone");
        $data['meta_contactleft'] = $this->pages_model->get_site_meta("contactleft");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/banner', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer', $data);
    }

    /*
     * Affichage de la contenu de la page en fonction de son id
     */

    public function pages($idPage = NULL) {
        $data['menus_haut'] = $this->menus_model->get_menus_by_categorie('1');
        $data['menus_bas_col1'] = $this->menus_model->get_menus_by_categorie('2');
        $data['menus_bas_col2'] = $this->menus_model->get_menus_by_categorie('3');
        $data['menus_bas_col3'] = $this->menus_model->get_menus_by_categorie('4');
        $data['menus_bas_gauche'] = $this->menus_model->get_menus_by_categorie('5');

        $data['meta_email'] = $this->pages_model->get_site_meta("email");
        $data['meta_phone'] = $this->pages_model->get_site_meta("telephone");
        $data['meta_contactleft'] = $this->pages_model->get_site_meta("contactleft");

        $data['pages'] = $this->pages_model->get_page($idPage);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/contact_gauche', $data);
        $this->load->view('pages/page_single', $data);
        $this->load->view('templates/footer', $data);
    }

    /*
     * Formulaire de contact
     * 
     */

    public function contact() {
        /*
         * Les données concernant le menu
         * ------------------------------
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
         * ------------------------------
         */
        $this->form_validation->set_rules('nom', 'Nom', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        $this->form_validation->set_rules('email', 'Email', 'required', array('required' => '- Le champ "%s" est obligatoire.'));

        $this->form_validation->set_rules('sujet', 'Sujet', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        $this->form_validation->set_rules('message', 'Message', 'required', array('required' => '- Le champ "%s" est obligatoire.'));

        if ($this->form_validation->run() == FALSE) {
            $data['nom'] = trim($this->input->post('nom'));
            $data['email'] = trim($this->input->post('email'));
            $data['sujet'] = trim($this->input->post('sujet'));
            $data['message'] = trim($this->input->post('message'));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/contact_gauche', $data);
            $this->load->view('pages/contact', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nom = trim($this->input->post('nom'));
            $email = trim($this->input->post('email'));
            $sujet = trim($this->input->post('sujet'));
            $message = trim($this->input->post('message'));
            $emailDestinataire = "divel974@yahoo.fr,bdonnat1@yahoo.fr";
            /*
             * Tester si l'email de l'emetteur est valide
             * Si valide, on envoi l'email, 
             * Sinon, On affiche une message d'erreur
             */
            if (valid_email(trim($this->input->post('email')))) {
                /*$this->email->from($email, $nom);
                $this->email->to($emailDestinataire);
                $this->email->cc($emailDestinataire);
                $this->email->bcc($emailDestinataire);

                $this->email->subject($sujet . ' | Contact auto ecole Nassibou - Site web');
                $this->email->message($message);

                $this->email->send();*/
                
                $this->sendEmail($email, $sujet,$message, $nom);
                        
            } else {
                echo '- Email invalide';
                $data['nom'] = trim($this->input->post('nom'));
                $data['email'] = trim($this->input->post('email'));
                $data['sujet'] = trim($this->input->post('sujet'));
                $data['message'] = trim($this->input->post('message'));
            }
            /*
             * reinitialisation des champs: nom, email, message
             */
            $data['nom'] = "";
            $data['email'] = "";
            $data['message'] = "";
            /*
             * ------------------------------------------------
             */
            $this->load->view('templates/header', $data);
            $this->load->view('templates/contact_gauche', $data);
            $this->load->view('pages/contact', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function preinscription() {
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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/contact_gauche', $data);
        $this->load->view('pages/preinscription', $data);
        $this->load->view('templates/footer', $data);
    }

    public function verifpreinscription() {
        /*
         * Verification des valeurs dans le champs formulaire de préinscription
         * --------------------------------------------------------------------
         */
        $this->form_validation->set_rules('nom', 'Nom', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        $this->form_validation->set_rules('prenom', 'Prénom', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        $this->form_validation->set_rules('email', 'E-mail', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        $this->form_validation->set_rules('telephone', 'Numéro de téléphone', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        $this->form_validation->set_rules('age', 'Age', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        $this->form_validation->set_rules('adresse', 'Addresse', 'required', array('required' => '- Le champ "%s" est obligatoire.'));
        /*
         * Verification des valeurs dans le champs formulaire de préinscription
         * --------------------------------------------------------------------
         */
        /*
         * Recuperation des valeurs envoyer par POST
         * -----------------------------------------
         */
        $nom = trim($this->input->post('nom'));
        $prenom = trim($this->input->post('prenom'));
        $email = trim($this->input->post('email'));
        $telephone = trim($this->input->post('telephone'));
        $age = trim($this->input->post('age'));
        $adresse = trim($this->input->post('adresse'));
        $message = trim($this->input->post('message'));
        // Pour les permis séléctionner
        $permisMotoA = trim($this->input->post('permisMotoA'));
        $permisMotoA2 = trim($this->input->post('permisMotoA2'));
        $permis125 = trim($this->input->post('permis125'));
        $permisVoitureB = trim($this->input->post('permisVoitureB'));
        $permisVoitureAAC = trim($this->input->post('permisVoitureAAC'));
        $permisVoitureCS = trim($this->input->post('permisVoitureCS'));
        // Formation séléctionner
        $formationBSR = trim($this->input->post('formationBSR'));
        $formation125 = trim($this->input->post('formation125'));
        /*
         * On va tester si les données sont bien reçu
         */
        $contenu = "<h2>PRE-INSCRIPTION AUTO ECOLE NASSIBOU</h2>";
        $contenu .= "<h3 style='text-decoration: underline;'>Information sur la personne</h3>";
        $contenu .= "<p>Nom: " . $nom . "</p>";
        $contenu .= "<p>Prénoms: " . $prenom . "</p>";
        $contenu .= "<p>E-mail: " . $email . "</p>";
        $contenu .= "<p>Téléphone: " . $telephone . "</p>";
        $contenu .= "<p>Age: " . $age . "</p>";
        $contenu .= "<p>Adresse: " . $adresse . "</p>";
        $contenu .= "<h3 style='text-decoration: underline;'>Permis</h3>";
        $contenu .= ($permisMotoA != NULL) ? " - " . $permisMotoA : "";
        $contenu .= ($permisMotoA2 != NULL) ? " - " . $permisMotoA2 : "";
        $contenu .= ($permis125 != NULL) ? " - " . $permis125 : "";
        $contenu .= ($permisVoitureB != NULL) ? " - " . $permisVoitureB : "";
        $contenu .= ($permisVoitureAAC != NULL) ? " - " . $permisVoitureAAC : "";
        $contenu .= ($permisVoitureCS != NULL) ? " - " . $permisVoitureCS : "";
        $contenu .= "<h3 style='text-decoration: underline;'>Formations</h3>";
        $contenu .= ($formationBSR != NULL) ? " - " . $formationBSR : "";
        $contenu .= ($formation125 != NULL) ? " - " . $formation125 : "";
        $contenu .= "<h3 style='text-decoration: underline;'>Message</h3>";
        $contenu .= "<p style='padding: 10px; border: solid 1px #EEE;'>" . $message . "</p>";
        //echo $contenu;
        /*
         * Recuperation des valeurs envoyer par POST
         * -----------------------------------------
         */
        if ($this->form_validation->run() == FALSE) {
            //echo 'Test form valider';
        } else {
            /*$emailDestinataire = "divel974@yahoo.fr,bdonnat1@yahoo.fr";
            $this->email->from($email, $nom);
            $this->email->to($emailDestinataire);
            $this->email->cc($emailDestinataire);
            $this->email->bcc($emailDestinataire);

            $this->email->subject('Pré-inscription | Site Auto ecole Nassibou');
            $this->email->message($contenu);

            $this->email->send();
            */
            $sujet = 'Pré-inscription | Site Auto ecole Nassibou';
            $this->sendEmail($email, $sujet,$contenu, $nom . ' ' . $prenom);
        }
        $this->preinscription();
    }

    public function sendEmail($from, $sujet = 0, $message = 0, $nom) {
        
         /*
         * Email destinataire
         * Email enregistrer dans la base de données
         */
        $emailTo = $this->pages_model->get_site_meta("email");
        $CI = & get_instance();
        $to = $emailTo['meta_value'];
        $CI->load->library('email');
        
        //or autoload it from /application/config/autoload.php

        $CI->email->from($from, $nom);
        $CI->email->to($to);
        $CI->email->subject($sujet);
        $CI->email->message($message);
        $CI->email->set_mailtype("html");

        $CI->email->send();
        
    }

    /*
     * Page à afficher pour l'erreur 404
     * Le nom 
     */

    public function erreur404() {

        $this->load->view('pages/erreur404');
    }

}
