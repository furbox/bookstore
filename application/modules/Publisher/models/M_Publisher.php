<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Publisher
 *
 * @author furbox
 */
class M_Publisher extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function get_active_publishers() {
        $this->db->where('publisher_active', 1);
        $query = $this->db->get('Publishers');

        return $query->result();
    }
}
