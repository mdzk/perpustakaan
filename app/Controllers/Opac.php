<?php

namespace App\Controllers;

use App\Models\BiblioModel;
use App\Models\CollTypeModel;
use App\Models\GmdModel;
use App\Models\LocationModel;
use App\Models\MstAuthorModel;
use App\Models\SearchBiblioModel;
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
        $gmd = new GmdModel();
        $coll_type = new CollTypeModel();
        $location = new LocationModel();
        $mst_author = new MstAuthorModel();

        $data = [
            'biblios' => $biblio->orderBy('input_date', 'asc')->limit(5)->find(),
            'gmds' => $gmd->findAll(),
            'coll_types' => $coll_type->findAll(),
            'locations' => $location->findAll(),
            'authors' => $mst_author->join('biblio_author', 'biblio_author.author_id = mst_author.author_id')->join('biblio', 'biblio_author.biblio_id = biblio.biblio_id')->find()
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

        $mst_author = new MstAuthorModel();
        $biblio = new BiblioModel();
        if ($keyword == '-') {
            $data = [
                'biblios' => $biblio->orderBy('input_date', 'desc')->findAll(),
                'authors' => $mst_author->join('biblio_author', 'biblio_author.author_id = mst_author.author_id')->join('biblio', 'biblio_author.biblio_id = biblio.biblio_id')->find()
            ];
            return view('opac/search', $data);
        } else {
            $data = [
                'biblios' => $biblio->orderBy('input_date', 'desc')->like('title', $keyword)->findAll(),
                'keyword' => $keyword,
                'authors' => $mst_author->join('biblio_author', 'biblio_author.author_id = mst_author.author_id')->join('biblio', 'biblio_author.biblio_id = biblio.biblio_id')->find()
            ];
            return view('opac/search', $data);
        }
    }

    public function advancedProses() {

        $title = trim(strip_tags(urldecode($_POST['title'])));
        if ($_POST['title'] == '') {
            $title = '-';
        }
        $author_name = trim(strip_tags(urldecode($_POST['author_name'])));
        if ($_POST["author_name"] == "") {
            $author_name = "-";
        }
        $topic = trim(strip_tags(urldecode($_POST['topic'])));
        if ($_POST['topic'] == '') {
            $topic = '-';
        }
        $isbn_issn = trim(strip_tags(urldecode($_POST['isbn_issn'])));
        if ($_POST['isbn_issn'] == '') {
            $isbn_issn = '-';
        }
        $gmd = trim(strip_tags(urldecode($_POST['gmd'])));
        if ($_POST['gmd'] == '') {
            $gmd = '-';
        }
        $coll_type = trim(strip_tags(urldecode($_POST['coll_type'])));
        if ($_POST['coll_type'] == '') {
            $coll_type = '-';
        }
        $location = trim(strip_tags(urldecode($_POST['location'])));
        if ($_POST['location'] == '') {
            $location = '-';
        }

        return redirect()->to("opac/advanced/$title/$author_name/$topic/$isbn_issn/$gmd/$coll_type/$location");
    }

    public function advanced($title, $author, $subject, $isbn_issn, $gmd, $coll_type, $location)
    {
        $biblio = new SearchBiblioModel();
        $mst_author = new MstAuthorModel();
        
        if ($author == "-") {$author = "";}
        if ($subject == "-") {$subject = "";}
        if ($isbn_issn == "-") {$isbn_issn = "";}
        if ($gmd == "-") {$gmd = "";}
        if ($coll_type == "-") {$coll_type = "";}
        if ($location == "-") {$location = "";}
        if ($title == "-") {$title = "";}

        $data = [
            'keyword' => $title,
            'authors' => $mst_author->join('biblio_author', 'biblio_author.author_id = mst_author.author_id')->join('biblio', 'biblio_author.biblio_id = biblio.biblio_id')->find(),
            'biblios' => $biblio
            ->like('title', $title)
            ->like('author', $author)
            ->like('topic', $subject)
            ->like('isbn_issn', $isbn_issn)
            ->like('gmd', $gmd)
            ->like('collection_types', $coll_type)
            ->like('location', $location)
            ->orderBy('input_date', 'desc')
            ->findAll()
        ];
        return view('opac/search', $data);
    }
}