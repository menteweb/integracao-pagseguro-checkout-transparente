<?php

namespace App\Controllers;

use System\Controller;
use App\Models\Produtos;

class CheckoutController extends Controller{

    public function index($SlugProduto){
        
        $this->view('checkout', [
            'produto' => Produtos::get($SlugProduto)
        ]);
    }
}