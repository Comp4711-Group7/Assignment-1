
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* this controller is used for logging in and logging out, sets session info */
    class Auth extends Application {
        function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('users');
            $this->load->helper('form');
        }
        function index() {
              $this->data['pagebody'] = 'login';
              $this->render();
        }
        function submit() {
            $key = $_POST['userid'];
            $user = $this->users->getUserByUserName($key);           
            if (password_verify($this->input->post('password'),$user->password)) {
                $this->session->set_userdata('userID',$user->id);
                $this->session->set_userdata('username',$user->username);
                $this->session->set_userdata('userRole',$user->role);
                $this->session->set_userdata('logged_in', TRUE);
                      redirect('/');
            }
            else{                
                redirect('/auth');
            }
        }
        function logout() {  
            $array_items = array('userID' => 'username', '' => '', 'userRole'=> '', 'logged_in' => FALSE);
            $this->session->unset_userdata($array_items);
            $this->data['user_info'] = $array_items;
            $this->session->sess_destroy();
            redirect('/');
        }
        
        function register() {
              $this->data['pagebody'] = 'register';
              $this->render();
        }
        
        function registration(){
                $this->load->library('form_validation');
		$this->form_validation->set_rules('userid', 'Username', 'trim|required|max_length[100]|callback_check_db_user');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('passwordconfirmation', 'Password Confirmation', 'trim|required|matches[password]');
		
        }
    }