<?php

/*
*Base controller
*loads the models and views
*/


class Controller {
//load model
public function Model($model){

    //Require model file
    require_once '../app/Model/' . $model . '.php';
    return new $model;
}

//load view
public function view($view, $data = []){
    
    //check for view file
    if(file_exists('../app/Views/' . $view . '.php')){
        require_once '../app/Views/' . $view . '.php';
    } else{
        die('View does not exist');
    }



}


}