<?php

class Rota{

    public static $listRouters = [];

    public static function get($Url){
        self::$listRouters[]['url'] =  $Url;
        return new self;
    }

    public static function post($Url){
        self::$listRouters[]['url'] =  $Url;
        return new self;
    }

    public static function controller($Controller){
        $chaves = array_keys(self::$listRouters);
        $localIndice = end($chaves);
        
        self::$listRouters[$localIndice]['controller'] = ucfirst($Controller) . 'Controller'; 
        return new self;
    }

    public static function method($Method){
        $chaves = array_keys(self::$listRouters);
        $localIndice = end($chaves);
        
        self::$listRouters[$localIndice]['method'] = $Method;
        return new self;
    }

    public static function getAll(){
        return self::$listRouters;
    }

}