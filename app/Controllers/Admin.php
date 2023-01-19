<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\ArticlesModel;
use App\Models\VisitorsModel;

class Admin extends BaseController
{
    public function index()
    {
        $user       = new UsersModel();
        $article    = new ArticlesModel();
        $visitor    = new VisitorsModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'visitor_web' => $visitor->where('DAY(created_at)', date('d'))->countAllResults(),
            'article' => $article->countAllResults(),
        ];
        return view('admin/home', $data);
    }

    public function statistic()
    {
        function bulan($a)
        {
            $visitor = new VisitorsModel();
            $bulan = $visitor->where('MONTH(created_at)', $a)->where('YEAR(created_at)', date('Y'))->countAllResults();
            return $bulan;
        };
        $month = array(bulan(1), bulan(2), bulan(3), bulan(4), bulan(5), bulan(6), bulan(7), bulan(8), bulan(9), bulan(10), bulan(11), bulan(12));
        return print_r(json_encode(array_values($month)));
    }
}
