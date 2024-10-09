<?php

namespace App\Units\Books\Http\Controllers;

use App\Support\Http\Controller;
use App\Domains\Books\Contracts\AuthorSummaryRepository;

class BookReportController extends Controller
{
    public function index(AuthorSummaryRepository $authorSummaryRepository)
    {
        return view('books::report.index', [
            'authors' => $authorSummaryRepository->getAll(take: 10, paginate: true)
        ]);
    }
}
