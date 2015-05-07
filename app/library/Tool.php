<?php
class Tool{
 public static function generatePw($pw)
    {
        $key = defined('CRYPT_KEY') ? CRYPT_KEY : '#1dj8$=dp#$%^&df(';
        return md5('d80*73&^%$#'.$pw);
    }
    
    public static function generatePwForAgent($str='') {
        $md5 = md5('d80*73&^%$#' . $str);

        $segments = str_split($md5, 8);

        $new_salt = $segments[2] . $segments[1] . $segments[0] . $segments[3];
        $new_str = $segments[3] . $segments[2] . $segments[1] . $segments[0];

        return hash('whirlpool', $new_str . $new_salt);

    }
}