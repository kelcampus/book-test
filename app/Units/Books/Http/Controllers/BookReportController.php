<?php

namespace App\Units\Books\Http\Controllers;

use App\Support\Http\Controller;
use App\Domains\Books\Contracts\AuthorSummaryRepository;

class BookReportController extends Controller
{
    public function index(AuthorSummaryRepository $authorSummaryRepository)
    {
        try {
            return view('books::report.index', [
                'authors' => $authorSummaryRepository->getAll(take: 10, paginate: true)
            ])->with('success', 'Teste!');
        } catch (\Throwable $th) {
            return redirect()->route('books.index')->with('error', 'View não encontrada no banco de dados!');
        }
    }
}
