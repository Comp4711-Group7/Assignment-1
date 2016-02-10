<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {


	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		$this->render();
	}
}
