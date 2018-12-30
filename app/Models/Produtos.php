<?php

namespace App\Models;

class Produtos{

    public static function get($Slug){

        $result = array_filter(self::getAll(), function($Produto) use ($Slug){
            return $Produto['slug'] == $Slug;
        });
        sort($result);

        return !empty($result) ? $result[0] : false;
    }

    public static function getAll(){
        return [
            [
                'produto' => 'Curso de PHP',
                'slug' => 'curso-de-php',
                'imagem' => '/storage/php.png',
                'valor' => number_format(99.90, 2, ',', '.')
            ],
            [
                'produto' => 'Curso de HTML5',
                'slug' => 'curso-de-html5',
                'imagem' => '/storage/html.png',
                'valor' => number_format(49.90, 2, ',', '.')
            ],
            [
                'produto' => 'Marketing digital - Conceitos e Praticas',
                'slug' => 'marketing-digital-conceitos-e-praticas',
                'imagem' => '/storage/marketing.png',
                'valor' => number_format(179.00, 2, ',', '.')
            ]
        ];
    }

}