<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\DonateModel;
use App\Models\TeachingMaterialsModel;
use App\Models\VisitorsModel;

class Home extends BaseController
{

    public function index()
    {
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => 1
        ]);

        $article = new ArticlesModel();
        $data = [
            'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->limit(5)->orderBy('date', 'desc')->find(),
        ];

        return view('home', $data);
    }

    public function article()
    {
        $article = new ArticlesModel();
        $data = [
            'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->orderBy('date', 'desc')->findAll(),
        ];

        return view('article', $data);
    }

    public function detail($slug)
    {
        $article = new ArticlesModel();
        $data = [
            'article' =>  $article->join('categories', 'categories.id_categories = articles.id_categories')->where('slug', $slug)->first(),
        ];

        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => $article->select('id_articles')->where('slug', $slug)->first()
        ]);
        return view('article-detail', $data);
    }

    public function donate()
    {

        $donate = new DonateModel();
        $data = [
            'donates' => $donate->where(['status'=> 0, 'donors' => NULL])->findAll(),
        ];
        return view('opac/donate', $data);
    }

    public function donateUpdate()
    {
        $donate  = new DonateModel();

        $data = [
            'donors' => $this->request->getPost('donors'),
            'npm' => $this->request->getPost('npm'),
        ];

        $donate->update($this->request->getPost('id-form') ,$data);
        return redirect()->to('donate');
    }

    public function donateAdd()
    {
        $donate  = new DonateModel();

        $data = [
            'title' => $this->request->getPost('title-add'),
            'author' => $this->request->getPost('author-add'),
            'status' => 2,
        ];

        $donate->save($data);
        return redirect()->to('donate');
    }

    public function proses()
    {
        $keyword = $this->request->getVar('q');
        return redirect()->to("search/$keyword");
    }

    public function search($keyword)
    {

        $article = new ArticlesModel();
        if ($keyword == '') {
            $data = [
                'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->orderBy('date', 'desc')->findAll(),
            ];
            return view('article', $data);
        } else {
            $data = [
                'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->orderBy('date', 'desc')->like('title', $keyword)->findAll(),
                'keyword' => $keyword,
            ];
            return view('search', $data);
        }
    }

    public function materialsVideos()
    {
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => 1
        ]);

        $material = new TeachingMaterialsModel();

        $data = [
            'materials' => $material->where('status', 1)->orderBy('id_materials', 'desc')->find(),
        ];

        return view('opac/materials', $data);
    }
    public function materialsDocuments()
    {
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => 1
        ]);

        $material = new TeachingMaterialsModel();

        $data = [
            'materials' => $material->where('status', 2)->orderBy('id_materials', 'desc')->find(),
        ];

        return view('opac/materials', $data);
    }
    public function materials()
    {
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 2,
            'id_articles' => 1
        ]);

        $material = new TeachingMaterialsModel();

        $data = [
            'materials' => $material->orderBy('id_materials', 'desc')->find(),
        ];

        return view('opac/materials', $data);
    }
}
