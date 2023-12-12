<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/crud/myappupdate/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'komoditas', 'link' => $base . 'komoditas'),
            array('text' => 'TPID', 'link' => $base . 'tpid'),
            array('text' => 'TPI', 'link' => $base . 'tpi')
        ];
        return $data;
    }
}
