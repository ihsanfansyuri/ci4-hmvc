<?php

namespace App\Modules\Users\Controllers;

use App\Controllers\BaseController;
use App\Modules\Users\Models\PembalapModel;

class Pembalap extends BaseController
{
    public function index()
    {
        $model = new PembalapModel();

        $data = [
            'title' => "Pembalap",
            'pembalap' => $model->getData()
        ];

        echo view("App\Modules\Users\Views\Pembalap\pembalap_view", $data);
    }

    public function detail($slug)
    {
        $model = new PembalapModel();

        $data = [
            'title' => "Detail Pembalap",
            'pembalap' => $model->getData($slug)
        ];

        return view("App\Modules\Users\Views\Pembalap\detail_view", $data);
    }
}
