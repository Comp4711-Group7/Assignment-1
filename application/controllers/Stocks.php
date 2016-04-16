<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends Application {


    function __construct()
    {
        parent::__construct();
        $this->load->model('stock');
    }

    public function index()
    {
        $this->data["stocks"] = $this->stock->getStocks(BSX_SERVER.'data/stocks');
        $this->data['pagebody'] = 'stocks';	// this is the view we want shown
        $this->data['title'] = 'Stock Lists';
        $this->render();
    }

    /* This grabs stock info based on which stock is clicked */
    public function getStockInfo($name){

       // $this->load->helper('form');
        $this->data['stockprofile']  = $this->stock->getSpecificStock($name);
        $this->data['stocktransactions']  = $this->stock->getStockTrans($name);
        $this->data['stockmovements']  = $this->stock->getStockMovement($name);
        //$js = 'id="shirts" onChange="nameChange(&quot;stocks&quot;,this.value);"';
        //$this->data['stocksdropdown'] = form_dropdown('player',$this->stock->getStocksNames(), $name, $js);
        $this->data['title'] = 'Stock Details';
        $this->data['pagebody'] = 'stockprofile';
        $this->render();
        
    }
}
