<?php
/*
* App Core Class
* Creates URL & Loads core controller
*URL FORMAT - /controler/method/params
*/


class Core{
    protected $currenControler ='pages';
    protected $currentMethod ='index';
    protected $params =[];


    public function __construct(){
       
       // print_r($this->GetUrl());
        $url=$this->GetUrl();
       // look in controlers for first value
        if(!($url==null))
        if(file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')){
            $this->currenControler=ucwords($url[0]);
            unset($url[0]);
        }
        require_once ('../app/Controllers/' . $this->currenControler . '.php');

        $this->currenControler= new $this->currenControler;
        //checl for second part of url

        if(isset($url[1])){
            if(method_exists($this->currenControler,$url[1]))
            $this->currentMethod=$url[1];
            unset($url[1]);
        }

        $this->params=$url ? array_values($url):[];
        //call a callback with array of params
        call_user_func_array([$this->currenControler,$this->currentMethod],$this->params);
        




    }


    public function GetUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url=explode('/',$url);
            return $url;
        }
        return null;
    }

}