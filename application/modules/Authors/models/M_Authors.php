<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Authors
 *
 * @author furbox
 */
class M_Authors extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function get_active_authors() {
        $this->db->where('author_isactive', 1);
        $query = $this->db->get('Authors');

        return $query->result();
    }

}
