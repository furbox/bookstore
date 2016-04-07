<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_Genres
 *
 * @author furbox
 */
class M_Genres extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function get_active_genres(){
        $this->db->where('book_genreactive',1);
        $query = $this->db->get('Book_Genre');
        
        return $query->result();
    }
}
