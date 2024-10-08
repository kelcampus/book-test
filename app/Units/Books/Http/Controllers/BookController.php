<?php

namespace App\Units\Books\Http\Controllers;

use App\Domains\Books\Contracts\SubjectRepository;
use App\Support\Http\Controller;
use App\Domains\Books\Contracts\AuthorRepository;
use App\Domains\Books\Contracts\BookRepository;

use App\Domains\Books\Models\Book;
use App\Domains\Users\Contracts\UserRepository;
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
        return redirect()->route('books.index')->with('status', 'Despesa criada com sucesso!');
    }

    public function edit(Book $book, UserRepository $userRepository, AuthorRepository $authorRepository)
    {
        return $this->view('books::book.edit', [
            'expense' => $book,
            'users' => $userRepository->getAll(),
            'labels' => $authorRepository->getAll()
        ]);
    }

    public function update(Book $book, BookRequest $request, BookRepository $bookRepository)
    {
        $bookRepository->update($book->id, $request->all());
        $bookRepository->syncAuthors($book, $request->author_ids);
        return redirect()->route('books.index')->with('status', 'Despesa alterada com sucesso!');
    }

    public function destroy(Book $book, BookRepository $bookRepository)
    {
        $bookRepository->delete($book->id);
        // $bookRepository->detachLabels($book);
        return redirect()->route('books.index')->with('status', 'Despesa deletada com sucesso!');
    }

}
