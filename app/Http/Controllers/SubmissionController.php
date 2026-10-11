<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class SubmissionController extends Controller
{
    public $submissionModel;

    public function __construct()
    {
        $this->submissionModel = new Submission();
    }

    public function index()
    {
        $data = [
            'title' => 'Galeri',
            'galeri' => $this->submissionModel->getGaleri(),
        ];

        return view('galeri.index', $data);
    }

    public function show($id)
    {
        $gambar = $this->submissionModel->getGaleriById($id);

        $data = [
            'title' => $gambar->judul,
            'gambar' => $gambar,
        ];

        return view('galeri.show', $data);
    }
}