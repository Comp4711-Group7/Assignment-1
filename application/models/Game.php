<?php

class Game extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('stock');
        $this->load->model('user');
    }

    public function getStatus() {
        $xml = simplexml_load_file(BSX_SERVER.'status');

        $round = $xml->round;
        $state = $xml->state;
        $countdown = $xml->countdown;

        if($state == 0) {
            $message =  "Game is not running";
        } elseif($state == 1) {
            $message =  "Game is in setup mode";
        } elseif($state == 2) {
            $message = "Game is ready!";
        } elseif($state == 3) {
            $message = "Game is active";
        } else {
            $message = "The current round is over";
        }

        $status = array("round"=>$round,"state"=>$state,"countdown"=>$countdown,"message"=>$message);

        return array($status);
    }

    public function getStocks(){
        return $this->stock->getStocks(BSX_SERVER.'data/stocks');
    }

    public function getTrend(){
        return $this->stock->getTrend(BSX_SERVER.'data/movement');
    }

    public function getCurrentPlayer(){
        $this->db->select('*')->from('users');
        $this->db->where('username', $this->session->userdata('username'));
        $query = $this->db->get();
        $result = $query->result_array();
        $result[0]['avatar'] =  "assets/images/" . $result[0]['avatar'];
        return $result;
    }

    public function register($url, $password){
        $this->load->library('session');
        $fields = array(
            'team' => 'S07',
            'name' => 'Panama Stock Haven',
            'password' => $password
        );
        $response = $this->sendPost($url, $fields);
        $xml = simplexml_load_string($response);
        $this->session->token = (string)$xml->token;
    }

    public function buy($code, $quantity){
        $this->load->library('session');
        $fields = array(
            'team' => 'S07',
            'token' => $this->session->token,
            'player' => $this->session->userdata('username'),
            'stock' => $code,
            'quantity' => $quantity
        );
        $response = $this->sendPost(BSX_SERVER.'buy', $fields);
        $xml = simplexml_load_string($response);
        $this->user->addToHoldings($xml);
    }

    public function sell($code, $quantity, $token){
        $this->load->library('session');
        $fields = array(
            'team' => 'S07',
            'token' => $this->session->token,
            'player' => $this->session->userdata('username'),
            'stock' => $code,
            'quantity' => $quantity,
            'certificate' => $token
        );
        $response = $this->sendPost(BSX_SERVER.'sell', $fields);
        $xml = simplexml_load_string($response);

        return $xml;
    }

    public function getPlayerHoldings(){
        return $this->user->getUserHoldings($this->session->userdata('username'));
    }

    private function sendPost($url, $fields){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);
        curl_close ($ch);
        return $response;
    }

}