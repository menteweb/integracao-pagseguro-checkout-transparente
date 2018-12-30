<?php

namespace System;

use Rota;

class System{
    
    private $url;

    public function __construct(){
        require_once('Rota.php');
        require_once('../app/routes.php');
        
        $this->_get_url();
    }

    public function start(){
        $allRotas = Rota::getAll();
        $urlString = implode('/', $this->url);

        foreach($allRotas as $rota){
            $rotaExplode = explode('/', $rota['url']);
            if(end($rotaExplode) == ''){
                array_pop($rotaExplode);
            }
            
            //Percorrer pela rota configurada, para verificar a existencia de parametros
            for($i=0; $i < count($rotaExplode) ;$i++){
                if(count($this->url) == count($rotaExplode) && strpos($rotaExplode[$i], '{') !== false){
                    //Pega o identificar feito na configuracao da rota, ex: {id} para setar no $_GET
                    preg_match('/^{(.*?)}$/', $rotaExplode[$i], $matches);
                    $_GET[$matches[1]] = $this->url[$i];

                    //Monsta a rota configurada de acorda com a rota da URL
                    $rotaExplode[$i] = $this->url[$i];
                    $params[] = $rotaExplode[$i];
                }

                //Seta a URL igual a URL acessada
                $rota['url'] = implode('/', $rotaExplode);
            }
            
            //Verifica se a URL acessada é a mesma configurada nas rotas
            if($rota['url'] == $urlString){
                $controller = "\\App\\Controllers\\" . $rota['controller'];
                $app = new $controller;
                $method = $rota['method'];
                return call_user_func_array([$app, $method], isset($params) ? $params : []);
            }

        }
        
        trigger_error('A URL: ' . implode('/', $this->url) . ' Não foi encontrada nas configurações de rota');
    }

    private function _get_url(){
        $url = explode('/', substr($_SERVER['REQUEST_URI'], 1));

        if(end($url) == ''){
            array_pop($url);
        }
        $this->url = $url;
    }

}