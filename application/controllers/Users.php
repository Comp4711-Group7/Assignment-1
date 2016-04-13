<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Application {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function index()
    {
        if($this->session->userdata('logged_in')){
            $this->getUserInfo($this->session->userdata['username']);
        }
    }

    /**
     * @param $name Takes a name and returns a view with that player's profile
     */
    public function getUserInfo($name) {

        $this->data['userprofile']  = $this->user->getUserInfo($name);
        $this->data['userholdings'] = $this->user->getUserHoldings($name);
        $this->load->helper('form');

        $this->data['pagebody'] = 'userprofile';	// this is the view we want shown
        $js = 'id="shirts" onChange="nameChange(&quot;users&quot;,this.value);"';
        $this->data['userdropdown'] = form_dropdown('username',$this->user->getUserNames(), $name, $js);
        $this->data['userprofile'] = $this->user->getUserTransaction($name);
        $this->data['user'] = $name;
        $this->data['title'] = 'User\'s Profile';
        $this->render();
    }
}