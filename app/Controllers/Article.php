<?php

namespace App\Controllers;
use App\Models\ArticlesModel;
use App\Models\CategoriesModel;
use App\Models\UsersModel;

class Article extends BaseController
{
    public function index()
    {
        $article = new ArticlesModel();
        $user       = new UsersModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'articles' => $article->join('categories', 'categories.id_categories = articles.id_categories')->findAll(),
        ];
        echo view('admin/article', $data);
    }

    public function add()
    {
        $category = new CategoriesModel();
        $user       = new UsersModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'categories' => $category->findAll(),
        ];
        return view('admin/article-add', $data);
    }

    public function save()
    {
        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail->getError() == 4) {
            $thumbnailName = 'default.jpg';
        } else {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('img', $thumbnailName);
        }

        $slug = url_title($this->request->getPost('title'), '-', true);
        $article  = new ArticlesModel();
        $article->save([
            'slug' => $slug,
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'thumbnail' => $thumbnailName,
            'date' => date("Y-m-d"),
            'id_users' => session()->get('id_users'),
            'id_categories' => $this->request->getPost('id_categories'),
        ]);

        session()->setFlashdata('pesan', 'Artikel berhasil ditambahkan');
        return redirect()->to('admin/article');
    }

    public function delete()
    {
        $article = new ArticlesModel();
        $id = $this->request->getVar('id_articles');
        $data = $article->find($id);
        if ($data['thumbnail'] != 'default.jpg') {
            unlink('img/'. $data['thumbnail']);
        }

        $article->delete($id);
        session()->setFlashdata('pesan', 'Artikel berhasil dihapus');
        return redirect()->to('admin/article');
    }

    public function edit($id)
    {
        $category = new CategoriesModel();
        $article = new ArticlesModel();
        $user       = new UsersModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'article' => $article->join('categories', 'categories.id_categories = articles.id_categories')->find($id),
            'categories' => $category->findAll(),
        ];
        
        return view('admin/article-edit', $data);
    }

    public function update()
    {
        $article = new ArticlesModel();
        $data = $article->find($this->request->getVar('id_articles'));
        
        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail == '') {
            $thumbnailName = $data['thumbnail'];
        } else {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('img', $thumbnailName);
            unlink('img/'. $data['thumbnail']);
        }

        $slug = url_title($this->request->getPost('title'), '-', true);
        $article->replace([
            'slug' => $slug,
            'id_articles' => $this->request->getVar('id_articles'),
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'thumbnail' => $thumbnailName,
            'date' => $data['date'],
            'id_users' => $data['id_users'],
            'id_categories' => $this->request->getPost('id_categories'),
        ]);
        session()->setFlashdata('pesan', 'Artikel berhasil diedit');
        return redirect()->to('admin/article');
    }
}
