<?php

namespace App\Units\Books\Http\Controllers;

use App\Support\Http\Controller;
use App\Domains\Books\Models\Subject;
use App\Domains\Books\Contracts\SubjectRepository;
use App\Units\Books\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function index(SubjectRepository $subjectRepository)
    {
        return view('books::subject.index', [
            'subjects' => $subjectRepository->getAll(take: 10, paginate: true, orderBy: ['CodAs', 'desc'])
        ]);
    }

    public function create()
    {
        return $this->view('books::subject.create', [
            'subject' => app(Subject::class)
        ]);
    }

    public function store(SubjectRequest $request, SubjectRepository $subjectRepository)
    {
        $subjectRepository->create($request->all());
        return redirect()->route('subjects.index')->with('success', 'Assunto cadastrado com sucesso!');
    }

    public function edit(Subject $subject)
    {
        return $this->view('books::subject.edit', [
            'subject' => $subject
        ]);
    }

    public function update(Subject $subject, SubjectRequest $request, SubjectRepository $subjectRepository)
    {
        $subjectRepository->update($subject->CodAs, $request->all());
        return redirect()->route('subjects.index')->with('success', 'Assunto alterado com sucesso!');
    }

    public function destroy(Subject $subject, SubjectRepository $subjectRepository)
    {
        if ($subjectRepository->hasAssociatedBooks($subject)) {
            return redirect()->route('subjects.index')->with('error', 'Esse assunto está vinculado a pelo menos um livro. Exclusão não pode ser realizada!');
        }

        $subjectRepository->delete($subject->CodAs);

        return redirect()->route('subjects.index')->with('success', 'Assunto deletado com sucesso!');
    }
}
