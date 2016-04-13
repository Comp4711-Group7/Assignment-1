<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {


	function __construct()
	{
		parent::__construct();
		$this->load->model('stock');
		$this->load->model('game');
	}

	public function index()
	{
		$this->data['stocks'] = $this->stock->getStocks('http://bsx.jlparry.com/data/stocks');
		//$this->data['players'] = $this->db->get("players")->result_array();
		$this->data['users'] = $this->db->get("users")->result_array();
		$this->data['gameStatus'] = $this->game->getStatus();
		$this->data['recentStockMovements'] = $this->stock->getMovements('http://bsx.jlparry.com/data/movement');
		$this->data['recentStockTrans'] = $this->stock->getTransactions('http://bsx.jlparry.com/data/transactions');
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		$this->render();
	}
}
