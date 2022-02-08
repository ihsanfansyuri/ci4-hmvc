<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Home"
        ];

        // return view('welcome_message');
        echo view("App\Modules\Auth\Views\home", $data);
    }
}
