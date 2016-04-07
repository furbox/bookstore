<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author furbox
 */
class Template extends MY_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function call_admin_template($data = NULL) {
        $this->load->view('admin_template_v', $data);
    }

}
