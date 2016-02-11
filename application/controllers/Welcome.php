<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {


	function __construct()
	{
		parent::__construct();
                $this->load->library('session');
	}

	public function index()
	{
                $this->data['logged_in'] = $this->session->userdata('logged_in');
                $this->data['username'] = $this->session->userdata('username');
		$this->data['stocks'] = $this->db->get("stocks")->result_array();
		$this->data['players'] = $this->db->get("players")->result_array();
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		$this->render();
	}
}
