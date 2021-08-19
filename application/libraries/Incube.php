<?php defined('BASEPATH') or exit('No direct script access allowed');

class Incube
{

    public function __construct()
    {

        $this->CI = &get_instance();
    }

    public function generateID($length)
    {
        $randomSalt = md5(uniqid(rand(), true));
        $salt = substr($randomSalt, 0, $length);

        return $salt;
    }
}
