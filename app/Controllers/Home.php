<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Models\DonateModel;
use App\Models\ProdiModel;
use App\Models\TeachingMaterialsModel;
use App\Models\VisitorsModel;
use Pusher\Pusher;

class Home extends BaseController
{

    public function index()
    {
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 1,
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
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 1,
            'id_articles' => 1
        ]);

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
        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 1,
            'id_articles' => 1
        ]);

        $prodi = new ProdiModel();
        $donate = new DonateModel();
        $data = [
            'prodies' => $prodi->findAll(),
            'donates' => $donate->where(['status' => 0, 'donors' => NULL])->findAll(),
        ];
        return view('opac/donate', $data);
    }

    public function donateUpdate()
    {
        $donate  = new DonateModel();
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            'b22a3bdf4cf04b53a0bc',
            '5cdbb233d4b2bfb6f6c3',
            '1540951',
            $options
        );

        $data = [
            'donors' => $this->request->getPost('donors'),
            'npm' => $this->request->getPost('npm'),
            'notification' => 1,
        ];

        $donate->update($this->request->getPost('id-form'), $data);

        $message['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $message);
        return redirect()->to('donate');
    }

    public function donateAdd()
    {
        $donate  = new DonateModel();

        $data = [
            'title' => $this->request->getPost('title-add'),
            'author' => $this->request->getPost('author-add'),
            'id_prodi' => $this->request->getPost('id_prodi'),
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

        $visitor = new VisitorsModel();
        $visitor->save([
            'type' => 1,
            'id_articles' => 1
        ]);

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
            'type' => 1,
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
            'type' => 1,
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
            'type' => 1,
            'id_articles' => 1
        ]);

        $material = new TeachingMaterialsModel();

        $data = [
            'materials' => $material->orderBy('id_materials', 'desc')->find(),
        ];

        return view('opac/materials', $data);
    }
}
