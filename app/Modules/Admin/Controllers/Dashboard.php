<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Home"
        ];
        // return view('welcome_message');
        echo view("App\Modules\Auth\Views\home_login", $data);
    }
}
