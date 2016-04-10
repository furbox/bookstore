<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Publisher
 *
 * @author furbox
 */
class Publishers extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_Publishers');
    }
    
    public function generate_select(){
        $publishers = $this->M_Publishers->get_active_publishers();
        $options = "";
        if (count($publishers)) {
            foreach ($publishers as $key => $value) {
                $options.= "<option value ='{$value->publisher_id}'>{$value->publisher_name}</options>";
            }
        }

        return $options;
    }
    
}
