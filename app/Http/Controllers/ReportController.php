<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public $reportModel;

    public function __construct()
    {
        $this->reportModel = new Report();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan',
            'laporan' => $this->reportModel->getLaporan(),
        ];

        return view('laporan.index', $data);
    }
}