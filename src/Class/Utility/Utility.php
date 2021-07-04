<?php

namespace App\Utility;


class Utility
{
    static function varDump($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
    static function redirect($url)
    {
        header("Location:$url");
    }
}