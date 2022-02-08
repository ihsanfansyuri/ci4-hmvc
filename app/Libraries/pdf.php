<?php

namespace App\Libraries;

class pdf
{
    function __construct()
    {
        include_once APPPATH . '/ThirdParty/fpdf/fpdf.php';
    }
}
