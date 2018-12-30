<?php

namespace App\Controllers;

use System\Controller;
use App\Models\Produtos;

class IndexController extends Controller{

    public function index(){
        $this->view('');
    }

    public function produtos(){
        $this->view('produtos', [
            'produtos' => Produtos::getAll()
        ]);
    }
}