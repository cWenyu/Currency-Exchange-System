<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exchange
 *
 * @author Rob
 */
class exchange {
    //put your code here
    
    public $cache_folder=null;
    protected $cache_file="cached_rates.xml"; //file holds chached rates
    public $exchange_source_url=null;
    public $exchange_rate_time=null;
    private $exchrate=null; //array that holds exchange rates
    public $cache_time= null; //time to hold the rates 12 hours
    
    // Currency names
    public $exchange_names = array (
    'USD' => "US Dollar",
    'JPY' => "Japanese Yen",
    'GBP' => "Pound Sterling",
    'CAD' => "Canadian Dollar",
    'HKD' => "Hong Kong Dollar",
    'CNY' => "Chinese yuan renminbi",
    'INR' => "Indian Rupee",
    'AUD' => "Australian Dollar",
    'SGD' => "Singapore Dollar",
    'EUR' => "European Euro"
    ); //end of array
    
    public function __construct($url = "http://www.ecb.int/stats/eurofxref/eurofxref-daily.xml") {
        $this->exchange_source_url = $url;
        $this->cache_folder = dirname(__FILE__);
        $this->cache_time = (3600*24);
        
        //$this->fetch_exchange_rates();
        $this->exchrate["EUR"] = 1;
        $this->exchrate["GBP"] = 1.3;
        $this->exchrate["USD"] = 0.8;
        $this->exchrate["CAD"] = 20;
        $this->exchrate["CNY"] = 0.01;
        $this->exchrate["HKD"] = 0.05;
        $this->exchrate["AUD"] = 0.1;
        $this->exchrate["SGD"] = 100;
        $this->exchrate["INR"] = 0.01;
        
    }
    
    public function fetch_exchange_rates(){
        //$cache_time;
        $now = time();
        $cache = $this->cache_folder."\\".$this->cache_file;
        var_dump($cache);
        $this->exchrate['EUR'] = 1.00;
        $amount = 1;
        $interval = 0;
        
        if(file_exists($cache)){
            $interval = $now - filemtime($cache);
        }
        
        if ($interval > $this->cache_time || !file_exists($cache)){
            $new_rates = file($this->exchange_source_url);
            $trace = "XML GET FROM SERVER";
            
            if(is_writable($cache)) {
                $file_handler = fopen($cache, "w+");
                
                foreach ($new_rates as $line){
                    fputs($file_handler, $line);
                }
            }
            else {
                die ("File is not WRITEABLE - check folder permissions");
            }
        }
        else {
            $new_rates = file($cache);
            $trace = "CACHED DATA - ".$interval." seconds old.";
        }
        
        foreach ($new_rates as $line){
            if (preg_match("/time='([[:graph:]]+)'/",$line,$gotval)) {
                $this->exchange_rate_time = $gotval;
            }
            
            preg_match("/currency='([[:alpha:]]+)'/",$line,$got_currency);
            
            if(preg_match("/rate='([[:graph:]]+)'/",$line,$got_rate)) {
                $this->exchrate[$got_currency] = $got_rate;
            }
        }
    }
    
    public function exchange_rate_convert($from, $to, $amount){
        if ($to == "EUR"){
            if($this->exchrate[$to] == 0 || $this->exchrate[$from] == 0 ) {
                echo "Error: Unable to retrieve exchange rates";
                $value = 0;
            }
            else {
                $value = $amount * (1 / $this->exchrate[$from]) / $this->exchrate[$to];
            }
        }
        else {
            $value = $amount * $this->exchrate[$to] / $this->exchrate[$from];
        }
        
        return $value;
    }
    
    public function exchange_factor($currency){
        return exchange_rate_convert("USD", $currency, 1);
    }
    
    
    public function show_rates() {
        echo "<pre>";
        print_r($this->exchrate);
        echo "</pre>";
    }
}
