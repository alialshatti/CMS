<?php 

class Categories extends Controller{

 public function __construct(){

   $this->postModel = $this->Model('Category');
 }

 public function index(){
   $categories = $this->postModel->GetCategories();
   $data = [
    'title' =>'categories',
      'categories' => $categories
   ];
   $this->view('categories/index',$data);
 }

}