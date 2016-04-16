<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {


	function __construct()
	{
		parent::__construct();
		$this->load->model('stock');
		$this->load->model('game');
		$this->load->model('user');
	}

	public function index()
	{
		$this->data['stocks'] = $this->stock->getStocks(BSX_SERVER.'data/stocks');
		$this->data['users'] = $this->user->getUsers();
		$this->data['gameStatus'] = $this->game->getStatus();
		$this->data['recentStockMovements'] = $this->stock->getMovements(BSX_SERVER.'/data/movement');
		$this->data['recentStockTrans'] = $this->stock->getTransactions(BSX_SERVER.'/data/transactions');
		$this->data['pagebody'] = 'homepage';	// this is the view we want shown
		$this->render();
	}
}
