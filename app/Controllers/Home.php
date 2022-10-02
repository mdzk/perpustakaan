<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
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

    public function hosting()
    {
        return view('hosting');
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
}
