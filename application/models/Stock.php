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
    public function getStocks($url){
        $this->load->library('session');
        $stocks = array();
        ini_set('auto_detect_line_endings', TRUE);
        if (($handle = fopen($url, 'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1024, ',', '"')) !== FALSE)
            {
                $stocks[] = array("code"=>$data[0], "name"=>$data[1], "category"=>$data[2], "value"=>$data[3]);
            }
            fclose($handle);
        }
        array_shift($stocks);
        $this->session->currentStock = $stocks;
        return $stocks;
    }

    /**
     * get the Transactions of all stocks
     * @param $code
     * @return mixed
     */
    public function getTransactions($url){
        $stocks = array();
        ini_set('auto_detect_line_endings', TRUE);
        if (($handle = fopen($url, 'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1024, ',', '"')) !== FALSE)
            {
                $stocks[] = array("seq"=>$data[0], "datetime"=>$data[1], "agent"=>$data[2], "player"=>$data[3], "stock"=>$data[4], "trans"=>$data[5], "quantity"=>$data[6]);
            }
            fclose($handle);
        }
        array_shift($stocks);

        return $stocks;
    }

    /**
     * get movements of all stocks
     * @param $code
     * @return mixed
     */
    public function getMovements($url){

        $stocks = array();
        ini_set('auto_detect_line_endings', TRUE);
        if (($handle = fopen($url, 'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1024, ',', '"')) !== FALSE)
            {
                $stocks[] = array("seq"=>$data[0], "datetime"=>$data[1], "code"=>$data[2], "action"=>$data[3], "amount"=>$data[4]);
            }
            fclose($handle);
        }
        array_shift($stocks);

        return $stocks;
    }


    /**
     * @param $name code of the stock
     * @return array|null
     */
    public function getSpecificStock($name){
        $this->load->library('session');
        foreach($this->session->currentStock as $data){
            if($data["code"] == $name){
                return array($data);
            }
        }
        return null;
    }

    /**
     * Search the specific stock
     * @param $name
     * @return array
     */
    public function getStockMovement($name){
        $url = "http://bsx.jlparry.com/data/movement";
        $stockMovement = array();
        if (($handle = fopen($url, 'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1024, ',', '"')) !== FALSE)
            {
                if($data[2] == $name){
                    $stock = array();
                    $stock["seq"]  = $data[0];
                    $stock["datetime"]  = $data[1];
                    $stock["code"] = $data[2];
                    $stock["action"]  = $data[3];
                    $stock["amount"]  = $data[4];
                    $stockMovement[] = $stock;
                }
            }
            fclose($handle);
        }

        return $stockMovement;
    }

    /**
     * @param $name
     * @return array
     */
    public function getStockTrans($name){

        //TODO : $name that is pass might not be in CODE ie. BP
        //TODO : if stock is in the proper name , change the condition in if statement

        $url = "http://bsx.jlparry.com/data/transactions";
        $stockTrans = array();
        if (($handle = fopen($url, 'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1024, ',', '"')) !== FALSE)
            {
                if($data[4] == $name){
                    $stock = array();
                    $stock["seq"]  = $data[0];
                    $stock["datetime"]  = $data[1];
                    $stock["agent"]  = $data[2];
                    $stock["player"]  = $data[3];
                    $stock["stock"]  = $data[4];
                    $stock["trans"]  = $data[5];
                    $stock["quantity"]  = $data[6];
                    $stockTrans[] = $stock;
                }
            }
            fclose($handle);
        }

        return $stockTrans;
    }

}