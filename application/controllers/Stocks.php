<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends Application {


    function __construct()
    {
        parent::__construct();
        $this->restrict(array(ROLE_USER,ROLE_ADMIN));
    }

    public function index()
    {
        $this->load->model('stock');
        $this->data["stocks"] = $this->stock->getStocks();
        $this->data['pagebody'] = 'stocks';	// this is the view we want shown
        $this->data['title'] = 'Stock\'s List';
        $this->render();
    }

    /* This grabs stock info based on which stock is clicked */
    public function getStockInfo($name){

        $this->load->model('stock');
        $this->load->helper('form');
        $this->data['stockprofile']  = $this->stock->getSpecificStock($name);
        $this->data['stocktransactions']  = $this->stock->getTransactions($name);
        $this->data['stockmovements']  = $this->stock->getMovements($name);
        $js = 'id="shirts" onChange="nameChange(&quot;stocks&quot;,this.value);"';
        $this->data['stocksdropdown'] = form_dropdown('player',$this->stock->getStocksNames(), $name, $js);
        $this->data['title'] = 'Stock History';
        $this->data['pagebody'] = 'stockprofile';
        $this->render();
        
    }
}
