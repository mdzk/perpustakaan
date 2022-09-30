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

        return view('opac/home', $data);
    }

    public function proses()
    {
        $keyword = $this->request->getVar('q');
        return redirect()->to("opac/search/$keyword");
    }

    public function search($keyword)
    {
        function truncateString($str, $chars, $to_space, $replacement = "...")
        {
            if ($chars > strlen($str)) return $str;

            $str = substr($str, 0, $chars);
            $space_pos = strrpos($str, " ");
            if ($to_space && $space_pos >= 0)
                $str = substr($str, 0, strrpos($str, " "));

            return ($str . $replacement);
        }

        $biblio = new BiblioModel();
        if ($keyword == '') {
            $data = [
                'biblios' => $biblio->orderBy('input_date', 'desc')->findAll(),
            ];
            return view('opac/search', $data);
        } else {
            $data = [
                'biblios' => $biblio->orderBy('input_date', 'desc')->like('title', $keyword)->findAll(),
                'keyword' => $keyword,
            ];
            return view('opac/search', $data);
        }
    }
}