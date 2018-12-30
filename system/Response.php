<?php

namespace System;

class Response{

    public static function json(array $Data = [], int $StatusCode = 200){
        ob_end_clean();
        http_response_code($StatusCode);
        echo json_encode($Data);
        exit();
    }

}