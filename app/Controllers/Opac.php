<?php

namespace App\Controllers;

use App\Models\BiblioModel;
use App\Models\VisitorsModel;

class Opac extends BaseController
{

    public function index()
    {

        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => 1
        ]);

        $biblio = new BiblioModel();
        $data = [
            'biblios' => $biblio->orderBy('input_date', 'asc')->limit(5)->find(),
        ];

        return view('opac', $data);
    }
}