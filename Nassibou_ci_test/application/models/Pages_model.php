<?php

class Pages_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_page($idPage = FALSE)
    {
        if ($idPage === FALSE)
        {
            $query = $this->db->get('pages');
            return $query->result_array();
        }

        $query = $this->db->get_where('pages', array('idPage' => $idPage));
        return $query->row_array();
    }
    
    public function get_site_meta($meta_key = FALSE)
    {
        if ($meta_key === FALSE)
        {
            $query = $this->db->get('site_meta');
            return $query->result_array();
        }

        $query = $this->db->get_where('site_meta', array('meta_key' => $meta_key));
        return $query->row_array();
    }
}