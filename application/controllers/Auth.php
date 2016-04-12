<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller is used for logging in and logging out, sets session info */

class Auth extends Application
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user');
    }

    function index()
    {
        $this->data['pagebody'] = 'login';
        $this->data['title'] = 'Login';
        $this->render();
    }

    function submit()
    {
        $key = $_POST['userid'];
        $user = $this->user->getUserByUserName($key);
        if (password_verify($this->input->post('password'), $user->password)) {
            $this->session->set_userdata('userID', $user->id);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('userRole', $user->role);
            $this->session->set_userdata('logged_in', TRUE);
            redirect('/');
        } else {
            redirect('/auth');
        }
    }

    function logout()
    {
        $array_items = array('userID' => 'username', '' => '', 'userRole' => '', 'logged_in' => FALSE);
        $this->session->unset_userdata($array_items);
        $this->data['user_info'] = $array_items;
        $this->session->sess_destroy();
        redirect('/');
    }

    function register()
    {
        $this->data['pagebody'] = 'register';
        $this->data['title'] = 'Register';
        $this->render();
    }
}