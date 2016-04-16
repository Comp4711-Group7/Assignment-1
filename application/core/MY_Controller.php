<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();
                
		$this->load->helper('url');
		$this->data = array();
		$this->data['title'] = 'Dashboard';	// our default title
		$this->errors = array();
		$this->data['pageTitle'] = 'stockticker';   // our default page
	}

	/**
	 * Render this page
	 */
	function render()
	{
		$mychoicesLeft = array('menudata' => $this->makemenu('L'));
		$mychoicesRight = array('menudata' => $this->makemenu('R'));
		$this->data['menubarLeft'] = $this->parser->parse('_menubar', $mychoicesLeft, true);
		$this->data['menubarRight'] = $this->parser->parse('_menubar', $mychoicesRight, true);

		// set the session info to data so it can be accessed
		$this->data['logged_in'] = $this->session->userdata('logged_in');
		$this->data['username'] = $this->session->userdata('username');

		//build the browser page!
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

	/**
	 * Make the menu of the navigation bar
	 * @param $wing LEFT and RIGHT MENU
	 * @return array
	 */
	function makemenu($wing)
	{
		$choices = array();
		$userRole = $this->session->userdata('userRole');

		if($wing == 'L'){
			$choices[] = array('name' => "Stock Ticker" , "class" => "", 'link' => '/');
			$choices[] = array('name' => "Stocks" , "class" => "", 'link' => '/stocks');
			$choices[] = array('name' => "User Lists" , "class" => "", 'link' => '/users');

			if($userRole == 'admin'){
				$choices[] = array('name' => "Manage", "class" => "",'link' => '/management');
			}
			if($userRole == 'player'){
				$choices[] = array('name' => "Play Game", "class" => "",'link' => '/games');
			}
		}else{
			if(!$userRole){
				$choices[] = array('name' => "Login", 'class' => "glyphicon glyphicon-log-in",'link' => '/auth');
				$choices[] = array('name' => "Register", 'class' => "glyphicon glyphicon-log-in",'link' => '/auth/register');
			}
			if($userRole == 'admin'){
				$choices[] = array('name' => $this->session->userdata('username'), "class" => "", 'link' => '/gamma');
				$choices[] = array('name' => "Logout", 'class' => "glyphicon glyphicon-log-in" ,'link' => '/auth/logout');
			}
			if($userRole == 'player'){
				$choices[] = array('name' => $this->session->userdata('username'), "class" => "" ,'link' => '/gamma');
				$choices[] = array('name' => "Logout", 'class' => "glyphicon glyphicon-log-in" ,'link' => '/auth/logout');
			}
		}

		return $choices;
	}
        
	function restrict($roleNeeded = null) {
		$userRole = $this->session->userdata('userRole');
		if ($roleNeeded != null) {
			if (is_array($roleNeeded)) {
				if (!in_array($userRole, $roleNeeded)) {
					redirect("/");
					return;
				}
			} else if ($userRole != $roleNeeded) {
				redirect("/");
				return;
			}
		}
	}

        

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */