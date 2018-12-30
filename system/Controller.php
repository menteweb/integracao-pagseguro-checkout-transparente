<?php

namespace System;

use stdClass;

abstract class Controller{

    protected $system;
    protected $view = [];

    public function __construct(){
        $this->system = new stdClass();
    }

    protected function view(string $ViewFile, array $Data = []){
        $this->system->file = '../app/Views/' . $ViewFile . '.phtml';

        $newDataView = array_merge($this->view, $Data);
        
        $this->view = new stdClass();
        if(!empty($Data)){
            $this->view = json_decode(json_encode($newDataView));
        }

        if(!file_exists('../app/Views/layout.phtml')){
            return trigger_error('Não foi encontrado o layout.phtml em app\Views');
        }
        
        require_once('../app/Views/layout.phtml');
    }

}