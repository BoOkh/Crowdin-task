<?php
namespace App\Core;
/**
 * Class Helper
 * @package App\Core
 */
class Helper
{
    /**
     * Date converting
     * @param string $date
     * @return false|string
     */
    public static function convertDate($date = '')
    {
        return date('F j, Y', strtotime($date));
    }

    /**
     * Redirect to the received URI
     * @param string $path <p>Path to redirect</p>
     */
    public static function redirect($path = '')
    {
        header('Location: /' . $path);
    }
}