<?php
/**
 * Created by PhpStorm.
 * User: jox-MAC
 * Date: 2016-02-07
 * Time: 9:33 PM
 */
class Stock extends CI_Model {

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    /* this grabs all the stocks to display on the stocks page */
    public function getStocks(){
        $query = $this->db->get("stocks");
        return $query->result_array();
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getTransactions($code){
        $this->db->select("*");
        $this->db->from("transactions");
        $this->db->where("Stock", $code);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getMovements($code){
        $this->db->select("*");
        $this->db->from("movements");
        $this->db->where("Code", $code);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSpecificStock($code){
        $this->db->select("*");
        $this->db->from("stocks");
        $this->db->where("Code", $code);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getStocksNames(){
        $this->db->select('Name')->from('stocks');
        $query = $this->db->get();
        $init_result = $query->result_array();
        $result = array();
        foreach($init_result as $value){
            foreach($value as $name)
                $result[$name] = $name;
        }
        return $result;
    }

}