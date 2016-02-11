<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends Application {


    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('stock');
        $this->data["stocks"] = $this->stock->getStocks();
        $this->data['pagebody'] = 'stocks';	// this is the view we want shown
        $this->data['title'] = 'Stock\'s List';
        $this->render();
    }
//    /* this grabs all the stocks to display on the stocks page */
//    private function getStocks(){
//        $query = $this->db->get("stocks");
//        return $query->result_array();
//    }
    
    /* This grabs stock info based on which stock is clicked */
    public function getStockInfo($name){
//        $this->db->select("*");
//        $this->db->from("stocks");
//        $this->db->where("Name", $name);
//        $query = $this->db->get();

        $this->load->model('stock');


        $this->data['stockprofile']  = $this->stock->getSpecificStock($name);
        $this->data['stocktransactions']  = $this->stock->getTransactions($name);
        $this->data['stockmovements']  = $this->stock->getMovements($name);
        $this->data['title'] = 'Stock History';
        //$this->data['stockprofile'] = $query->result_array();
        $this->data['pagebody'] = 'stockprofile';
        $this->render();
        
    }
}
