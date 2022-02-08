<?php

namespace App\Modules\Users\Controllers;

use App\Controllers\BaseController;
use App\Modules\Users\Models\TeamModel;

class Team extends BaseController
{
    public function index()
    {
        $model = new TeamModel();

        $currentPage = $this->request->getVar('page_team') ? $this->request->getVar('page_team') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $team = $model->cari($keyword);
        } else {
            $team = $model->getData();
        }

        $data = [
            'title' => "Team",
            'team' => $team,
            'pager' => $model->pager,
            'currentPage' => $currentPage
        ];

        echo view("App\Modules\Users\Views\Team/team_view", $data);
    }
}
