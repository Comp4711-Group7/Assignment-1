<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* this controller is used for logging in and logging out, sets session info */

class Auth extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user');
    }
    
    /* index function of auth controller */
    function index() {
        $this->data['pagebody'] = 'login';
        $this->data['title'] = 'Login';
        $this->render();
    }
    /* logs the user in */
    function submit() {
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
    
    /* loads register page */
    function register() {
        $this->data['pagebody'] = 'register';
        $this->data['title'] = 'Register';
        $this->render();
    }
    
    /* registers user */
    function registration() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]|callback_check_db_user');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');
        $fileType = $this->check_file($this->input->post('username'));

        if ($this->form_validation->run() == FALSE || $fileType == FALSE) {
            $this->data['pagebody'] = 'register';
            $this->data['title'] = 'Register';
            $this->render();
        } else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], IMG_DIRECTORY . $this->input->post('username') . "." . $fileType)) {
                $this->user->register($this->input->post('username'), $fileType);
            } else {
                echo "Sorry, there was an error uploading your file";
                $this->data['pagebody'] = 'register';
                $this->data['title'] = 'Register';
                $this->render();
            }
            redirect("/auth");
        }
    }
    
    /* logs a user out */
    function logout() {
        $array_items = array('userID' => 'username', '' => '', 'userRole' => '', 'logged_in' => FALSE);
        $this->session->unset_userdata($array_items);
        $this->data['user_info'] = $array_items;
        $this->session->sess_destroy();
        redirect('/');
    }
    
    
    /* checks if username is taken */
    function check_db_user($value) {
        $user = $this->user->getUserByUserName($value);
        if ($user) {
            $this->form_validation->set_message('check_db_user', 'Username in use already by another account.');
            return FALSE;
        }
        return True;
    }
    
    /* checks if a file can upload */
    function check_file($name) {
        $target_file = IMG_DIRECTORY . basename($_FILES["avatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_target = IMG_DIRECTORY . $name . $imageFileType;
        // Check if image file is a actual image or fake image
        if (isset($_POST["submitButton"])) {
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($file_target)) {
            $this->form_validation->set_message('check_file', 'Sorry, file already exists.');
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["avatar"]["size"] > 500000) {
            $this->form_validation->set_message('check_file', 'Sorry, your file is too large.');
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $this->form_validation->set_message('check_file', 'Sorry, only JPG, JPEG & PNG files are allowed.');
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return False;
        // if everything is ok, try to upload file
        } else {
            return $imageFileType;
        }
    }
}
