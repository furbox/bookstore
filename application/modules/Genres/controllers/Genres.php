<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Genres
 *
 * @author furbox
 */
class Genres extends MY_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Genres');
    }
    
    public function generate_select(){        
        $genres = $this->M_Genres->get_active_genres();
        $options = "";
        if (count($genres)) {
            foreach ($genres as $key => $value) {
                $options.= "<option value ='{$value->book_genreid}'>{$value->book_genre}</options>";
            }
        }

        return $options;
    }
}
