<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Books
 *
 * @author furbox
 */
class Books extends MY_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model("M_Books");
        $this->load->module([
            "Authors",
            "Publishers",
            "Genres"
        ]);
    }

    public function index() {
        $data = new stdClass();
        $data->title = "Books";
        $this->template->call_admin_template($data);
    }

    public function display_books(){
        $data = new stdClass();
        $data->title = "Books";
        $data->content_view = "Books/books_diplay_v";
        $data->page_header = "All Books";
        $data->description = "Display all books";
        $data->books_table = $this->create_books_table();
        $this->template->call_admin_template($data);
    }

    public function addBook() {
        $data = new stdClass();
        $data->title = "Books";
        $data->content_view = "Books/add_book_v";
        $data->page_header = "Add a Book";
        $data->description = "Add a book to the system";

        $data->authors = $this->authors->generate_select();
        $data->publishers = $this->publishers->generate_select();
        $data->genres = $this->genres->generate_select();

        $this->template->call_admin_template($data);
    }

    public function post_book() {
        $image_array = $book_authors = [];
        if (count($_FILES) > 0) {
            $authors = $this->input->post('authors');
            unset($_POST['authors']);

            $id = $this->M_Books->post_book();
            
            foreach ($authors as $author) {
                $book_authors[] = [
                    'BookId' => $id,
                    'AuthorId' => $author
                ];
            }
            
            $this->M_Books->add_book_author($book_authors);

            $this->load->library('upload');
            $files = $_FILES;
            
            $images = count($_FILES['book_images']['name']);
            
            for ($i = 0; $i < $images; $i++) {
                $_FILES['book_images']['name'] = $files['book_images']['name'][$i];
                $_FILES['book_images']['type'] = $files['book_images']['type'][$i];
                $_FILES['book_images']['tmp_name'] = $files['book_images']['tmp_name'][$i];
                $_FILES['book_images']['error'] = $files['book_images']['error'][$i];
                $_FILES['book_images']['size'] = $files['book_images']['size'][$i];

                $this->upload->initialize($this->set_upload_options());
                
                if (!$this->upload->do_upload('book_images')) {
                    
                    $error = array('error' => $this->upload->display_errors());
                    echo '<pre>';print_r($error);die;
                } else {
                    $image_array[] = [
                        'imagePath' => base_url() . "uploads/books/" . $_FILES['book_images']['name'],
                        'book_id' => $id
                    ];
                }
            }

            $this->M_Books->add_book_images($image_array);
            redirect(base_url('Admin/books'));
        }
    }

    private function set_upload_options() {
        $config = [];
        $config['upload_path'] = './uploads/books/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;
        return $config;
    }

    public function create_books_table() {
        $books = $this->M_Books->get_all_books();
        $books_table = "";

        if (count($books) > 0) {
            $counter = 1;
            foreach ($books as $key => $value) {
                $books_table .= "<tr>";
                $books_table .= "<td>{$counter}</td>";
                $books_table .= "<td>{$value->book_title}</td>";
                $books_table .= "<td>{$value->book_isbn}</td>";
                $books_table .= "<td>" . date("d-m-Y", strtotime($value->book_yop)) . "</td>";
                if ($value->book_active == 1) {
                    $books_table .= "<td><a href=''>Active</a></td>";
                } else {
                    $books_table .= "<td><a href=''>Inactive</a></td>";
                }
                $books_table .= "<td>"
                        . "<a href='" . base_url() . "Books/edit_book/edit/{$value->book_isbn}'>Edit</a>|"
                        . "<a href='" . base_url() . "Books/edit_book/delete/{$value->book_isbn}'>Delete</a></td>";
                $books_table .= "</tr>";
            }
        }

        return $books_table;
    }

}
