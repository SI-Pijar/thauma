<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->categoryModel->getKategori(),
        ];

        return view('kategori.index', $data);
    }
}