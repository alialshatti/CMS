<?php
class Pages extends Controller {
    public function __construct()
    {
        
    }
    public function index(){
        //$this->view('hello');
        
        $data = [
            'title' => 'welcome'
            
        ];
        $this->view('pages/index',$data);

    }
    public function about(){
        $this->view('pages/about');

    }
    public function contact(){
        $this->view('pages/contact');
    }
    
    
}