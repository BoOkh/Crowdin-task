<?php
namespace App\Core;

class Helper
{
    public static function convertDate($date = '')
    {
        return date('F j, Y', strtotime($date));
    }
}