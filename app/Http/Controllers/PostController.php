<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public $postModel;

    public function __construct()
    {
        $this->postModel = new Post();
    }

    public function index()
    {
        $data = [
            'title' => 'Artikel',
            'posts' => $this->postModel->getPostTerbit(),
        ];

        return view('artikel.index', $data);
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);

        $data = [
            'title' => $post->judul,
            'post' => $post,
        ];

        return view('artikel.show', $data);
    }
}
