<?php

namespace App\Units\Books\Http\Controllers;

use App\Support\Http\Controller;
use App\Domains\Books\Models\Author;
use App\Domains\Books\Contracts\AuthorRepository;
use App\Units\Books\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index(AuthorRepository $authorRepository)
    {
        return view('books::author.index', [
            'authors' => $authorRepository->getAll(take: 10, paginate: true, orderBy: ['CodAu', 'desc'])
        ]);
    }

    public function create()
    {
        return $this->view('books::author.create', [
            'author' => app(Author::class)
        ]);
    }

    public function store(AuthorRequest $request, AuthorRepository $authorRepository)
    {
        $authorRepository->create($request->all());
        return redirect()->route('authors.index')->with('success', 'Autor cadastrado com sucesso!');
    }

    public function edit(Author $author)
    {
        return $this->view('books::author.edit', [
            'author' => $author
        ]);
    }

    public function update(Author $author, AuthorRequest $request, AuthorRepository $authorRepository)
    {
        $authorRepository->update($author->CodAu, $request->all());
        return redirect()->route('authors.index')->with('success', 'Autor alterado com sucesso!');
    }

    public function destroy(Author $author, AuthorRepository $authorRepository)
    {
        if ($authorRepository->hasAssociatedBooks($author)) {
            return redirect()->route('authors.index')->with('error', 'Esse autor está vinculado a pelo menos um livro. Exclusão não pode ser realizada!');
        }
        $authorRepository->delete($author->CodAu);
        return redirect()->route('authors.index')->with('success', 'Autor deletado com sucesso!');
    }
}
