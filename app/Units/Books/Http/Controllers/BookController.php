<?php

namespace App\Units\Books\Http\Controllers;

use App\Domains\Books\Contracts\SubjectRepository;
use App\Support\Http\Controller;
use App\Domains\Books\Contracts\AuthorRepository;
use App\Domains\Books\Contracts\BookRepository;
use App\Domains\Books\Models\Book;
use App\Units\Books\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index(BookRepository $bookRepository)
    {
        return view('books::book.index', [
            'books' => $bookRepository->getAll(take: 10, paginate: true, orderBy: ['Codl', 'desc'])
        ]);
    }

    public function create(AuthorRepository $authorRepository, SubjectRepository $subjectRepository)
    {
        return $this->view('books::book.create', [
            'book' => app(Book::class),
            'authors' => $authorRepository->getAll(),
            'subjects' => $subjectRepository->getAll()
        ]);
    }

    public function store(BookRequest $request, BookRepository $bookRepository)
    {
        $book = $bookRepository->create($request->all());
        $bookRepository->syncAuthors($book, $request->author_ids);
        $bookRepository->syncSubjects($book, $request->subject_ids);
        return redirect()->route('books.index')->with('status', 'Livro cadastrado com sucesso!');
    }

    public function edit(Book $book, AuthorRepository $authorRepository, SubjectRepository $subjectRepository)
    {
        return $this->view('books::book.edit', [
            'book' => $book,
            'authors' => $authorRepository->getAll(),
            'subjects' => $subjectRepository->getAll()
        ]);
    }

    public function update(Book $book, BookRequest $request, BookRepository $bookRepository)
    {
        $bookRepository->update($book->Codl, $request->all());
        $bookRepository->syncAuthors($book, $request->author_ids);
        $bookRepository->syncSubjects($book, $request->subject_ids);
        return redirect()->route('books.index')->with('status', 'Livro alterado com sucesso!');
    }

    public function destroy(Book $book, BookRepository $bookRepository)
    {
        $bookRepository->delete($book->Codl);
        // $bookRepository->detachLabels($book);
        return redirect()->route('books.index')->with('status', 'Livro deletado com sucesso!');
    }
}
