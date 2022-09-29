<?php

namespace App\Controllers;

use App\Models\VisitorsModel;

class Barcode extends BaseController
{
    public function index()
    {
        return view('barcode');
    }

    public function enter()
    {
        if (!isset($_COOKIE['user'])) {
            $visitor = new VisitorsModel();
            $visitor->save([
                'type' => 1,
                'id_articles' => 1
            ]);
        }
        return redirect()->to('barcode');
    }
}
