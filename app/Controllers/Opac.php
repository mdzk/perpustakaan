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

    public function proses() {

        $title = trim(strip_tags(urldecode($_POST['title'])));
        if ($_POST['title'] == '') {
            $title = '-';
        }

        if(isset($_POST["author_name"])) {
            $author_name = trim(strip_tags(urldecode($_POST['author_name'])));
            if ($_POST["author_name"] == "") {
                $author_name = "-";
            }
        } else {
            $author_name = "-";
        }

        if(isset($_POST["topic"])) {
            $topic = trim(strip_tags(urldecode($_POST['topic'])));
            if ($_POST['topic'] == '') {
                $topic = '-';
            }
        } else {
            $topic = '-';
        }

        if (isset($_POST['isbn_issn'])) {
            $isbn_issn = trim(strip_tags(urldecode($_POST['isbn_issn'])));
            if ($_POST['isbn_issn'] == '') {
                $isbn_issn = '-';
            }
        } else {
            $isbn_issn = '-';
        }

        if (isset($_POST['gmd'])) {
            $gmd = trim(strip_tags(urldecode($_POST['gmd'])));
            if ($_POST['gmd'] == '') {
                $gmd = '-';
            }
        } else {
            $gmd = '-';
        }

        if(isset($_POST['coll_type'])) {
            $coll_type = trim(strip_tags(urldecode($_POST['coll_type'])));
            if ($_POST['coll_type'] == '') {
                $coll_type = '-';
            }
        } else {
            $coll_type = '-';
        }

        if(isset($_POST['location'])) {
            $location = trim(strip_tags(urldecode($_POST['location'])));
            if ($_POST['location'] == '') {
                $location = '-';
            }
        } else {
            $location = '-';
        }

        return redirect()->to("opac/search/$title/$author_name/$topic/$isbn_issn/$gmd/$coll_type/$location");
    }

    public function search($get_title, $get_author, $get_subject, $get_isbn_issn, $get_gmd, $get_coll_type, $get_location)
    {
        $biblio = new SearchBiblioModel();
        $mst_author = new MstAuthorModel();
        
        $title = "title LIKE '%$get_title%'";
        if ($get_title == "-") {
            $title = "(title LIKE '%%' OR title IS NULL)";
        }
        
        $author = "author LIKE '%$get_author%'";
        if ($get_author == "-") {
            $author = "(author LIKE '%%' OR author IS NULL)";
        }
        
        $subject = "topic LIKE '$get_subject'";
        if ($get_subject == "-") {
            $subject = "(topic LIKE '%%' OR topic IS NULL)";
        }
        
        $isbn_issn = "isbn_issn LIKE '%$get_isbn_issn%'";
        if ($get_isbn_issn == "-") {
            $isbn_issn = "(isbn_issn LIKE '%%' OR isbn_issn IS NULL)";
        }
        
        $gmd = "gmd LIKE '%$get_gmd%'";
        if ($get_gmd == "-") {
            $gmd = "(gmd LIKE '%%' OR gmd IS NULL)";
        }
        
        $coll_type = "collection_types LIKE '%$get_coll_type%'";
        if ($get_coll_type == "-") {
            $coll_type = "(collection_types LIKE '%%' OR collection_types IS NULL)";
        }
        
        $location = "location LIKE '%$get_location%'";
        if ($get_location == "-") {
            $location = "(location LIKE '%%' OR location IS NULL)";
        }
        
        $data = [
            'keyword' => $get_title,
            'biblios' => $biblio
            ->where($title)
            ->where($author)
            ->where($subject)
            ->where($isbn_issn)
            ->where($gmd)
            ->where($coll_type)
            ->where($location)
            ->orderBy('input_date', 'desc')
            ->findAll()
        ];
        return view('opac/search', $data);
    }
}