<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authors
 *
 * @author furbox
 */
class Authors extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Authors');
    }
    
    public function generate_select(){
        $authors = $this->M_Authors->get_active_authors();
        $options = "";
        if (count($authors)) {
            foreach ($authors as $key => $value) {
                $options.= "<option value ='{$value->author_id}'>{$value->author_lastname} {$value->author_firstname}</options>";
            }
        }

        return $options;
    }
}
