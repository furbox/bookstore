<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author furbox
 */
class Admin extends MY_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->module([
            'Books'
        ]);
    }

    public function index() {
        $data = new stdClass();
        $data->title = "Home";
        $this->template->call_admin_template($data);
    }
    
    public function books(){
        $this->books->display_books();
    }
    public function addBook(){
        $this->books->addBook();
    }

}
