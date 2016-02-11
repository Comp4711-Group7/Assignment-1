<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends Application {


	function __construct()
	{
		parent::__construct();
                $this->load->library('session');
                 $this->load->helper('url');
	}

	public function index()
	{
		
	}
        
        public function login(){
            $newdata = array(
                   'username'  => 'johndoe',
                   'email'     => 'johndoe@some-site.com',
                   'logged_in' => TRUE
               );

                $this->session->set_userdata($newdata);
               // $this->data['user_info'] = $newdata;
               //$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		//$this->render(); 
                
               redirect('/', 'refresh');
        }
        
        public function logout(){
            $array_items = array('username' => '', 'email' => '', 'logged_in' => FALSE);
            $this->session->unset_userdata($array_items);
            $this->data['user_info'] = $array_items;
            $this->session->sess_destroy();
            //$this->data['pagebody'] = 'homepage';	// this is the view we want shown
            //$this->render();  
            redirect('/', 'refresh');
        }
}
