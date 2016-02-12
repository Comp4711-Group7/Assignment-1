<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* this controller is used for logging in and logging out, sets session info */
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
        /*function  is called when the user clicks login */
        public function login(){
            $newdata = array(
                   'username'  => 'Henry',
                   'email'     => 'henry@gmail.com',
                   'logged_in' => TRUE
               );
               $this->session->set_userdata($newdata);
               redirect('/', 'refresh');
        }
        /*function is called when user clicks logout */
        public function logout(){
            $array_items = array('username' => '', 'email' => '', 'logged_in' => FALSE);
            $this->session->unset_userdata($array_items);
            $this->data['user_info'] = $array_items;
            $this->session->sess_destroy();
            redirect('/', 'refresh');
        }
}
